# Globaal beleid voor cursusinstellingen

Platformbeheerders kunnen gecentraliseerde standaardwaarden voor cursusinstellingen definiëren en bepalen of docenten deze mogen overschrijven. Het beleid is van toepassing op bestaande cursusfunctionaliteit, waarbij compatibele cursusspecifieke configuraties behouden blijven.

## De beleidspagina openen

Open op de **hoofd-toegangs-URL** **Beheer > Instellingen > Cursusinstellingen**, of navigeer naar `/admin/settings/course-settings` op uw installatie. Deze beheerpagina is voorbehouden aan geautoriseerde platformbeheerders op de hoofd-toegangs-URL. Gebruik geen secundair portaal om globaal beleid te bewerken.

## Een beleid configureren

1. Gebruik het veld **Zoeken** als u een specifieke sleutel voor een cursusinstelling nodig hebt.
2. Controleer voor elke instelling de exacte variabelenaam die onder de kop wordt weergegeven.
3. Schakel **Bewerkbaar in cursus** in of uit om te bepalen of cursusredacteuren die instelling kunnen wijzigen.
4. Kies of voer een **Standaard platformwaarde** in. Sommige instellingen bieden een vervolgkeuzelijst met toegestane waarden; andere accepteren tekst.
5. Sla de wijzigingen op en controleer het effectieve gedrag in een testcursus.

Instellingen die dezelfde variabelenaam in verschillende categorieën hergebruiken, worden waar nodig afzonderlijk weergegeven. Ga er niet van uit dat twee visueel vergelijkbare namen dezelfde cursusfunctie aansturen.

## Verifiëren met twee rollen

Controleer als beheerder de opgeslagen standaardwaarde en of deze bewerkbaar is. Open als cursusdocent de bijbehorende cursusinstelling en controleer of de effectieve waarde en de bewerkingsbeperking overeenkomen met het beleid. Test waar mogelijk zowel een bestaande cursus als een nieuwe cursus.

Het wijzigen van een globale standaardwaarde kan veel cursussen beïnvloeden. Beoordeel de impact voordat u de overschrijvingen door docenten uitschakelt, en noteer de vorige beleidswaarden zodat deze indien nodig kunnen worden hersteld.

Zie [Cursussen beheren](managing-courses.md) en [Cursusinstellingen](../../teacher-guide/creating-your-course/course-settings.md). Implementatie: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).