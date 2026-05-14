# Certificaat instellingen

Standaardinstellingen die worden toegepast wanneer een leerling een certificaat behaalt via het cijferboek.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Certificaten**. Deze categorie bevat **9 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_certificate_pdf_footer`

**Voettekst toevoegen aan PDF-certificaatexport**

Indien ingeschakeld, wordt een voettekst toegevoegd aan PDF-export van certificaten.

*Standaard: `false`*

### `allow_general_certificate`

**Algemeen certificaat inschakelen**

Een algemeen certificaat is een certificaat dat alle prestaties van de gebruiker in de gevolgde cursussen groepeert.

*Standaard: `false`*

### `allow_public_certificates`

**Publieke certificaten toestaan**

Certificaten van gebruikers kunnen worden bekeken door niet-geregistreerde gebruikers.

*Standaard: `false`*

### `certificate_filter_by_official_code`

**Certificaten filteren op officiële code**

Voeg een filter toe op de officiële code van studenten aan de certificatenlijst.

*Standaard: `false`*

### `certificate_pdf_orientation`

**PDF-oriëntatie voor certificaten**

Stel ‘portrait’ of ‘landscape’ (technische termen) in voor PDF-certificaten.

*Standaard: `landscape`*

### `hide_certificate_export_link`

**Certificaten: PDF-exportlink voor iedereen verbergen**

Schakel in om de mogelijkheid om certificaten naar PDF te exporteren volledig te verwijderen (voor alle gebruikers). Indien ingeschakeld, wordt deze ook voor studenten verborgen.

*Standaard: `false`*

### `hide_certificate_export_link_students`

**Certificaten: exportlink verbergen voor studenten**

Indien ingeschakeld, kunnen studenten hun certificaten niet naar PDF exporteren. Deze optie is beschikbaar omdat, afhankelijk van de exacte HTML-structuur van het certificaatsjabloon, de PDF-export van lage kwaliteit kan zijn. In dat geval is het beter om studenten alleen het HTML-certificaat te tonen.

*Standaard: `false`*

### `hide_my_certificate_link`

**‘Mijn certificaat’-link verbergen**

Verberg de certificatenpagina voor niet-beheerder gebruikers.

*Standaard: `false`*

### `session_admin_can_download_all_certificates`

**Sessiebeheerders toestaan om privé-certificaten te downloaden**

Indien ingeschakeld, kunnen sessiebeheerders certificaten downloaden, zelfs als deze niet openbaar zijn gepubliceerd.

*Standaard: `false`*