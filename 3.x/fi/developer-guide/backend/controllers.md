# Kontrollerit

Chamilo 3.0 käyttää suurta määrää kontrollereita (kymmeniä) jaoteltuna bundleihin. Tarkka lukumäärä vaihtelee versiosta toiseen — pidä alla olevia nimiä havainnollistavina, ei tyhjentävinä.

## Kontrollerityypit

### Ylläpitokontrollerit

Sijainti: `src/CoreBundle/Controller/Admin/`. Käsittelevät alustan hallintaa:

* `AdminController` — Koontinäyttö, tiedostotiedot, sähköpostin testaus
* `UserListController` — Käyttäjien CRUD
* `CourseListController` — Kurssien hallinta
* `SessionAdminController` — Istuntojen hallinta
* `SettingsController` — Alustan asetukset
* `SecurityController` — Kirjautumisyritykset, IDS-tapahtumat
* `PluginsController` — Liitännäisten hallinta
* `RoomController` — Huoneiden hallinta

### API-toimintokontrollerit

Mukautetut API Platform -toiminnot sijainnissa `src/CoreBundle/Controller/Api/`:

Nämä laajentavat API Platformin sisäänrakennettua CRUD-toiminnallisuutta mukautetulla liiketoimintalogiikalla. Esimerkkejä:

* `CreateDocumentFileAction` — Tiedoston lataus dokumenteille
* `CreateStudentPublicationFileAction` — Tehtävänpalautuksen lataus
* `UpdateVisibilityDocument` — Dokumentin näkyvyyden vaihto
* `ExportCGlossaryAction` — Sanaston vienti
* `MoveDocumentAction` — Dokumentin siirto toiseen kansioon

Luku- ja kirjoitusoperaatioihin, jotka eivät tarvitse erillistä HTTP-kontrolleria — eli kun haluat muuttaa vain *sitä, miten* kohde tai kokoelma haetaan tai tallennetaan — suosi **State Provideria** tai **State Processoria** (ks. alla). API-toimintokontrollerit kannattaa varata päätepisteille, jotka aidosti tarvitsevat pyyntötason logiikkaa (tiedostolataukset, mukautetut vastausmuodot, monivaiheiset kulut).

### AI-kontrolleri

`src/CoreBundle/Controller/AiController.php` on tekoälyyn liittyvien päätepisteiden sisäänkäynti (Aiken-kysymysten generointi, oppimispolun generointi, kuva-/videogenerointi, avointen vastausten arviointi, dokumenttianalyysi…). Reittien tarkka joukko kehittyy nopeasti — lue nykyinen lista kontrollerin `#[Route]`-attribuuteista sen sijaan, että luottaisit tähän kopioon.

### Chat-kontrolleri

`src/CoreBundle/Controller/ChatController.php` käsittelee reaaliaikaista chattia ja tekoälytutoria:

* Käyttäjältä käyttäjälle -viestintä
* Tekoälytutorin chat (telakoitu chat-paneeli)
* Viestihistoria ja kysely (polling)

## API Platform State Providerit ja Processorit

Jokainen API-päätepiste ei perustu kontrolleriin. API Platform 4 jakaa työn kahden rajapinnan kesken:

* **State Providerit** (`ApiPlatform\State\ProviderInterface`) — palauttavat datan `GET`-operaatioille (yksittäinen kohde tai kokoelma).
* **State Processorit** (`ApiPlatform\State\ProcessorInterface`) — käsittelevät kirjoitukset `POST`-, `PUT`-, `PATCH`- ja `DELETE`-operaatioille.

Chamilon toteutukset sijaitsevat kansiossa `src/CoreBundle/State/` (noin 35+ luokkaa). Ne kytketään entiteetteihin `#[ApiResource]`-operaatioiden `provider:`- ja `processor:`-argumenteilla, ei reittien kautta.

### Milloin niitä käytetään

Valitse provider/processor — API-toimintokontrollerin sijaan — kun:

* Päätepiste noudattaa tavanomaista REST-muotoa (listaus / luku / luonti / päivitys / poisto) mutta tarvitsee mukautettua datan kokoamista tai pysyvyyslogiikkaa.
* Sinun täytyy suodattaa, denormalisoida tai rikastaa kokoelman tai kohteen lukutulosta (esim. nykyisen Access URL:n, kurssikontekstin tai näkyvyyssääntöjen mukaisesti).
* Sinun täytyy suorittaa sivuvaikutuksia kirjoitettaessa (audit-lokit, tiedostojen generointi, liittyvien entiteettien päivitykset) säilyttäen API Platformin normalisointi-, validointi- ja sivutusputken.
* Haluat pitää operaation löydettävänä OpenAPI- / Hydra-skeemassa ilman mukautetun reitin rekisteröintiä.

Jos päätepiste sen sijaan tarvitsee raakaa `Request`-käyttöä, palauttaa ei-resurssisisällön (tiedoston lataus, CSV, uudelleenohjaus) tai orkestroi monivaiheisen kulun, API-toimintokontrolleri kansiossa `src/CoreBundle/Controller/Api/` sopii paremmin.

### Kytkentä entiteettiin

Viittaa luokkaan operaatiossa:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider-esimerkki

`src/CoreBundle/State/DocumentProvider.php` ratkaisee `CDocument`-entiteetin URI-muuttujasta ja heittää `NotFoundHttpException`-poikkeuksen, jos sitä ei löydy:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

### Prosessorin esimerkki

`src/CoreBundle/State/ColorThemeStateProcessor.php` delegatoi oletusarvoiseen Doctrinen `persistProcessor`-prosessoriin ja suorittaa sen jälkeen sivuvaikutuksia (luo CSS-tiedoston teemojen Flysystem-tiedostojärjestelmään, kytkee teeman nykyiseen Access URL -osoitteeseen):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Tunnettavia kaavoja

* **Koosta oletusprosessorin kanssa.** Koristele `ProcessorInterface $persistProcessor` (Doctrinen sisäänrakennettu), jotta Chamilo-kohtainen logiikka suoritetaan *standardin persist-toiminnon ympärillä*, ei sen sijaan.
* **Kokoelmaproviderit hoitavat sivutuksen itse.** Kun kokoelmaprovider rakentaa mukautetun kyselyn, sen on noudatettava parametreja `?page`, `?itemsPerPage` ja hakusuodattimia — API Platformin automaattinen sivuttaja aktivoituu vain oletusarvoiselle Doctrinen kokoelmaproviderille.
* **Yksi luokka resurssia ja operaatiotyyppiä kohden on yleistä**, mutta yksi provider voi palvella useita operaatioita (ks. `UsergroupStateProvider`, jota käytetään uudelleen neljässä `Usergroup`-operaatiossa).
* **Nimeämiskäytäntö**: `<Entity>StateProvider` / `<Entity>StateProcessor` resurssinlaajuisille käsittelijöille; `<Entity><Action>Processor` (esim. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) kapeammille operaatioille.

## Reititys

Kontrollerit käyttävät **PHP 8 -attribuutteja** reittimäärittelyihin:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform -resurssit käyttävät `#[ApiResource]`-attribuutteja entiteeteissä, ja mukautetut operaatiot osoittavat kontrollerin toimiin.

## Traitit

Kontrollerit käyttävät jaettuja traiteja yhteiseen toiminnallisuuteen:

* `ControllerTrait` — Pääsy asetuksiin, serialisoijaan ja yhteisiin palveluihin
* `CourseControllerTrait` — Kurssikontekstin apurit
* `ResourceControllerTrait` — Resurssisolmun operaatiot