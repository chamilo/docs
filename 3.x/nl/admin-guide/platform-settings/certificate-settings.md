# Certificaatinstellingen

Standaardwaarden die worden toegepast wanneer een cursist een certificaat behaalt via het cijferboek.

Open deze instellingen via **Beheer > Configuratie-instellingen > Certificaten**. Deze categorie bevat **23 instellingen**, hieronder vermeld met de titel en de toelichting zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_certificate_pdf_footer`

**Voettekst toevoegen aan PDF-export van certificaten**

Indien ingeschakeld, wordt een voettekst toegevoegd aan PDF-exports van certificaten.

*Standaard: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Automatische certificaatgeneratie bij WS-aanroep**

Indien ingeschakeld, en bij gebruik van de webservice WSCertificatesList, zorgt deze optie ervoor dat alle certificaten door gebruikers zijn gegenereerd wanneer zij de vereiste score hebben behaald voor alle items die in cijferboeken voor alle cursussen en sessies zijn gedefinieerd (dit kan aanzienlijke verwerkingscapaciteit op uw server vergen).

*Standaard: `false`*

### `allow_certificates_search` **v3**

**Zoeken naar certificaten toestaan**

Gebruikers en bezoekers toestaan gegenereerde certificaten te zoeken via het menu in de bovenbalk.

*Standaard: `false`*

### `allow_general_certificate`

**Algemeen certificaat inschakelen**

Een algemeen certificaat is een certificaat dat alle prestaties van de gebruiker in de gevolgde cursussen bundelt.

*Standaard: `false`*

### `allow_public_certificates`

**Openbare certificaten toestaan**

Certificaten van gebruikers kunnen worden bekeken door niet-geregistreerde gebruikers.

*Standaard: `false`*

### `blockchain_verification_enabled`

**Ondertekende certificaten en optionele verankering op het Sepolia-testnet inschakelen**

Indien ingeschakeld, kan een cursist de publicatie van een digitaal ondertekende certificaatreferentie uit het cijferboek goedkeuren; een beheerder kan deze uitgeven of intrekken en optioneel de vingerafdruk van de referentie verankeren op het Sepolia-testnet. Zie [Verificatie van ondertekende certificaten](../maintenance/signed-certificate-verification.md).

*Standaard: `false`*

### `certificate_filter_by_official_code`

**Certificaten filteren op officiële code**

Voeg een filter op de officiële code van studenten toe aan de certificatenlijst.

*Standaard: `false`*

### `certificate_pdf_orientation`

**PDF-oriëntatie voor certificaten**

Stel ‘portrait’ of ‘landscape’ (technische termen) in voor PDF-certificaten.

*Standaard: `landscape`*

### `hide_certificate_export_link`

**Certificaten: PDF-exportkoppeling voor iedereen verbergen**

Schakel in om de mogelijkheid om certificaten naar PDF te exporteren volledig te verwijderen (voor alle gebruikers). Indien ingeschakeld, geldt dit ook voor het verbergen ervan voor studenten.

*Standaard: `false`*

### `hide_certificate_export_link_students`

**Certificaten: exportkoppeling voor studenten verbergen**

Indien ingeschakeld, kunnen studenten hun certificaten niet naar PDF exporteren. Deze optie is beschikbaar omdat, afhankelijk van de precieze HTML-structuur van het certificaatsjabloon, de PDF-export van lage kwaliteit kan zijn. In dat geval is het beter om studenten alleen het HTML-certificaat te tonen.

*Standaard: `false`*

### `hide_my_certificate_link`

**Koppeling ‘mijn certificaat’ verbergen**

Verberg de certificatenpagina voor niet-beheerders.

*Standaard: `false`*

### `session_admin_can_download_all_certificates`

**Sessiebeheerders toestaan privécertificaten te downloaden**

Indien ingeschakeld, kunnen sessiebeheerders certificaten downloaden, ook als deze niet openbaar zijn gepubliceerd.

*Standaard: `false`*

### `transcript_enabled`

**Academische transcripties**

Schakel onofficiële academische transcripties voor cursisten in en sta geautoriseerd personeel toe digitaal ondertekende, intrekbare officiële transcripties uit te geven. De eigen transcriptie van een gebruiker verschijnt op `/transcript`. Zie [Academische transcripties](../users/academic-transcripts.md).

*Standaard: `false`*

### `transcript_program_title`

**Programmatitel op transcriptie**

Naam van het programma of de kwalificatie die op transcriptie-PDF’s wordt afgedrukt.

*Standaard: leeg*

### `transcript_course_code_source`

**Cursuscode op transcriptie**

Selecteer welk cursusveld de code levert die op transcripties wordt weergegeven: cursuscode (`visual_code`) of afdelingsnaam (`department_name`).

*Standaard: `visual_code`*

### `transcript_hours_extra_field`

**Veld voor cursusuren op transcriptie**

Variabele van het extra cursusveld met de vereiste uren. Laat dit leeg om de cursusduur te gebruiken.

*Standaard: leeg*

### `transcript_completed_hours_are_required_hours`

**Voltooide uren op transcriptie zijn de vereiste uren**

Indien ingeschakeld, worden de vereiste cursusuren weergegeven als voltooide uren. Anders weerspiegelen de voltooide uren de door de cursist geregistreerde tijd in de cursus.

*Standaard: `false`*

### `transcript_student_number_extra_field`

**Veld voor studentnummer op transcriptie**

Variabele van het extra gebruikersveld met het studentnummer van de cursist. Laat leeg om dat nummer weg te laten.

*Standaard: leeg*

### `transcript_address_extra_fields`

**Adresvelden van het transcript**

Door komma's gescheiden variabelen van extra gebruikersvelden die aan het adres van de cursist worden toegevoegd, zoals plaats of postcode.

*Standaard: leeg*

### `transcript_grading_scale`

**Beoordelingsschaal van het transcript**

Een JSON-array van minimumpercentage, lettercijfer en grade points, geordend van hoogste naar laagste minimum. Bijvoorbeeld `{ "min": 90, "letter": "A", "points": 4.0 }`. Deze toewijzing wordt gebruikt voor de letters en de GPA van het transcript.

*Standaard: A (90% / 4), B (80% / 3), C (70% / 2), D (60% / 1), F (0% / 0)*

### `transcript_gpa_note`

**GPA-toelichting van het transcript**

Tekst die onder de GPA wordt afgedrukt en de berekening toelicht. Standaard is de GPA het **ongewogen gemiddelde** van de grade points van de cursussen op het transcript.

*Standaard: `The GPA is the unweighted average of the grade points of the courses listed in this transcript.`*

### `transcript_signatory_name`

**Naam van de ondertekenaar van het transcript**

Naam van de institutionele ondertekenaar die op officiële transcripten wordt afgedrukt. Een platformbeheerder kan een afzonderlijke handtekeningafbeelding uploaden op de transcriptpagina van een gebruiker.

*Standaard: leeg*

### `transcript_signatory_title`

**Functietitel van de ondertekenaar van het transcript**

Functietitel van de institutionele ondertekenaar op officiële transcripten.

*Standaard: leeg*

## Zie ook

Certificaten kunnen nu een geldigheidsperiode en een vervaldatum krijgen, met automatische of handmatige vervalherinneringen. Dit wordt hier niet geconfigureerd — de geldigheidsperiode is een gradebook-instelling voor docenten, en de aan/uit-schakelaar van de herinneringscron staat in de categorie **Cron-taken**. Zie [Certificaten en vaardigheden](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) en [Instellingen voor cron-taken](crons-settings.md#certificate-expiry-reminders).