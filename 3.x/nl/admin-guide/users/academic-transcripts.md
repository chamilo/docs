# Academische transcripten

Chamilo kan een **onofficieel academisch transcript** genereren op basis van de voltooide, gecertificeerde cursussen van een cursist en geautoriseerd personeel in staat stellen een **officieel ondertekend transcript** uit te geven. Deze functie verschilt van een individueel cursuscertificaat of de optionele verificatie via het Sepolia-testnet.

## De functie inschakelen

Schakel in **Beheer > Configuratie-instellingen > Certificaten** **Academische transcripten** (`certificate.transcript_enabled`) in. Deze optie is standaard uitgeschakeld. Bekijk de aanvullende instellingen voor programma, beoordelingsschaal, cursusuren, studentnummer, adres en ondertekenaar in [Certificaatinstellingen](../platform-settings/certificate-settings.md#transcript_enabled).

Het transcript gebruikt certificaten die zijn gegenereerd door de **hoofdcijferboekcategorie** van in aanmerking komende cursussen en sessies. Het bevat alleen cursussen binnen de huidige toegangs-URL waarop de cursist nog is ingeschreven. Een cursus zonder een in aanmerking komend certificaat levert geen rij op.

Het weergegeven eindcijfer is een gemiddelde van de vermelde cursuspercentagescores; de GPA is het ongewogen gemiddelde van de toegewezen grade points. Beide zijn afhankelijk van de cursussen die zijn opgenomen op het moment van bekijken of uitgifte.

## Transcriptkolommen

| Kolom | Inhoud |
|--------|---------|
| **Cursus** | De cursuscode, of de afdelingsnaam van de cursus (`transcript_course_code_source`) |
| **Beschrijving** | De cursustitel, en de sessietitel voor een cursus die in een sessie is gevolgd |
| **Inschrijving** | Wanneer de cursist zich heeft ingeschreven voor de cursus of de sessie |
| **Vereiste uren** | De waarde van het extra cursusveld dat is ingesteld in `transcript_hours_extra_field`, of de cursusduur |
| **Voltooiingsdatum** | De datum van het certificaat |
| **Voltooide uren** | De tijd die de cursist in de cursus heeft doorgebracht, of de vereiste uren wanneer `transcript_completed_hours_are_required_hours` is ingeschakeld |
| **Eindcijfer** | De score van het certificaat |
| **Cijfer** | De letter van `transcript_grading_scale` die bij die score hoort |

## Het transcript van een cursist openen

1. Ga naar **Beheer > Gebruikers > Gebruikerslijst** en zoek de cursist. Een actie **Transcript** is beschikbaar voor geautoriseerde beheerders en sessiebeheerders wanneer de functie is ingeschakeld.
2. U kunt ook de actie **Transcript** gebruiken op de pagina met globale rapportagedetails van een in aanmerking komende cursist.
3. Controleer de cursuslijst, cijfers, datums, uren, het eindcijfer en de GPA van de cursist.
4. Selecteer **Onofficieel transcript downloaden** voor een PDF die is opgebouwd uit de huidige gegevens van de cursist.

De transcriptpagina is ook rechtstreeks beschikbaar op `/transcript?userId=<user-id>` voor iemand die geautoriseerd is om de gegevens van die cursist te raadplegen. Beschouw het kennen van de URL of gebruikers-ID niet als toestemming: de toegang wordt serverzijdig gecontroleerd.

Een cursist kan het **eigen** transcript bekijken, maar kan geen officieel transcript uitgeven of intrekken. Geautoriseerde uitgevers zijn:

* Platform-/portaalbeheerders die handelen binnen het bereik van de door hen beheerde gebruikers/toegangs-URL.
* HR-managers voor cursisten die zij volgen.
* Sessiebeheerders voor cursisten die zijn ingeschreven in een sessie die zij beheren.

Deze machtigingen worden per cursist beoordeeld; een personeelsrol op zich verleent geen toegang tot elk transcript.

![Het transcript van een cursist zoals gezien door een beheerder, met de cursussen, het eindcijfer, de GPA en de beoordelingsschaal, de lijst met officiële transcripten en het blok met de handtekeningafbeelding](../../.gitbook/assets/admin-transcript-user.png)

## Een officieel transcript uitgeven en verifiëren

1. Controleer op de transcriptpagina van een geautoriseerde cursist de momenteel weergegeven cursussen, cijfers en persoonlijke gegevens.
2. Selecteer **Officieel transcript uitgeven** en bevestig. Chamilo slaat een ondertekende momentopname van de informatie op dat moment op.
3. De nieuwe vermelding verschijnt onder **Officiële transcripten** met de uitgiftedatum en de uitgever.
4. Gebruik **Downloaden** voor de officiële PDF of **Verifiëren** om de openbare verificatiepagina te openen.
5. Indien nodig kan een geautoriseerde uitgever dat officiële transcript **Intrekken**. De verificatiepagina meldt dan dat het is ingetrokken.

Elk uitgegeven transcript wordt afzonderlijk opgeslagen: het uitgeven van een nieuwere versie herschrijft een eerder ondertekend record niet stilzwijgend. Verificatielinks volgen `/transcripts/verify/<token>` en bieden ook een `.json`-respons. Iemand met de verificatielink kan de geldigheid controleren zonder zich aan te melden; houd deze links passend onder controle, omdat een geldige verificatie ondertekende transcriptdetails blootlegt. Ongeldige of ingetrokken records worden niet als geldige documenten gepresenteerd.

![De openbare verificatiepagina van een geldig officieel transcript, met de details en cursussen](../../.gitbook/assets/admin-transcript-verification.png)

Een officieel transcript wordt digitaal ondertekend door Chamilo met de ondertekeningssleutel van de instelling. **Het is geen blockchaintransactie**; de Sepolia-functie documenteert een afzonderlijk proces voor certificaatreferenties van het cijferboek.

## Handtekeningafbeelding en gegevens van de ondertekenaar

Een platformbeheerder kan een handtekeningafbeelding in **PNG of JPEG** uploaden in de sectie **Handtekening van officiële transcripties** op de transcriptiepagina van een cursist. De afbeelding hoort bij de huidige toegangs-URL en wordt gebruikt in officiële PDF's. De naam en de functie van de ondertekenaar komen uit `certificate.transcript_signatory_name` en `certificate.transcript_signatory_title`.

Alleen platformbeheerders beheren de handtekeningafbeelding; andere geautoriseerde uitgevers van transcripties krijgen deze machtiging niet automatisch. Bescherm de ondertekeningssleutels van de instelling en de privéopslag van de handtekeningafbeelding als onderdeel van de back-up- en toegangscontroleprocedures van het portaal. Beide worden buiten de openbare webmap bewaard, in `var/certificate-issuer/`, samen met de sleutel die ook de certificaatreferenties van het cijferboek ondertekent: neem deze map op in uw [back-ups](../maintenance/backups.md), anders kunnen alle reeds uitgegeven transcripties en referenties niet meer worden geverifieerd.

## Probleemoplossing

* **Transcriptielink ontbreekt:** controleer `certificate.transcript_enabled` en het bereik van de huidige gebruiker.
* **Geen voltooide cursussen:** de cursist heeft een kwalificerend certificaat van het hoofdcijferboek en een overeenkomende huidige inschrijving voor cursus/sessie op deze toegangs-URL nodig.
* **Onjuist studentnummer, uren, lettercijfers of programmatitel:** controleer de specifieke instellingen `certificate.transcript_*` voordat u een officiële transcriptie uitgeeft.
* **Verificatie meldt een ingetrokken of ongeldig resultaat:** gebruik het record niet opnieuw als bewijs van een huidige officiële transcriptie; geautoriseerd personeel kan indien passend een nieuwe uitgeven.

Zie ook [Certificaten en vaardigheden](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) en [Mijn transcriptie](../../student-guide/account-and-security/my-transcript.md).