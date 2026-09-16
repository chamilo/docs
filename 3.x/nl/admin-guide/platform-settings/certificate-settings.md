# Certificaatinstellingen

Standaardwaarden die worden toegepast wanneer een cursist een certificaat verdient vanuit het cijferboek.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Certificaten**. Deze categorie bevat **11 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_certificate_pdf_footer`

**Voettekst toevoegen aan PDF-exporte van certificaten**

Indien ingeschakeld wordt een voettekst toegevoegd aan PDF-exporte van certificaten.

*Standaard: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Automatische generatie van certificaten bij WS-aanroep**

Indien ingeschakeld, en bij gebruik van de webservice WSCertificatesList, zorgt deze optie ervoor dat alle certificaten zijn gegenereerd door gebruikers als zij de voldoende score hebben behaald in alle items die in cijferboeken zijn gedefinieerd voor alle cursussen en sessies (dit kan aanzienlijke verwerkingscapaciteit op uw server verbruiken).

*Standaard: `false`*

### `allow_certificates_search` **v3**

**Zoeken naar certificaten toestaan**

Gebruikers en bezoekers toestaan om gegenereerde certificaten te zoeken via het menu in de bovenbalk.

*Standaard: `false`*

### `allow_general_certificate`

**Algemeen certificaat inschakelen**

Een algemeen certificaat is een certificaat dat alle prestaties van de gebruiker groepeert in de cursussen die hij of zij heeft gevolgd.

*Standaard: `false`*

### `allow_public_certificates`

**Openbare certificaten toestaan**

Gebruikerscertificaten kunnen worden bekeken door niet-geregistreerde gebruikers.

*Standaard: `false`*

### `certificate_filter_by_official_code`

**Certificaten filteren op officiële code**

Voeg een filter op de officiële code van studenten toe aan de certificatenlijst.

*Standaard: `false`*

### `certificate_pdf_orientation`

**PDF-oriëntatie voor certificaten**

Stel ‘portrait’ of ‘landscape’ in (technische termen) voor PDF-certificaten.

*Standaard: `landscape`*

### `hide_certificate_export_link`

**Certificaten: PDF-exportkoppeling voor iedereen verbergen**

Inschakelen om de mogelijkheid om certificaten naar PDF te exporteren volledig te verwijderen (voor alle gebruikers). Indien ingeschakeld, omvat dit ook het verbergen ervan voor studenten.

*Standaard: `false`*

### `hide_certificate_export_link_students`

**Certificaten: exportkoppeling voor studenten verbergen**

Indien ingeschakeld kunnen studenten hun certificaten niet naar PDF exporteren. Deze optie is beschikbaar omdat, afhankelijk van de precieze HTML-structuur van het certificaatsjabloon, de PDF-export van lage kwaliteit kan zijn. In dat geval is het beter om studenten alleen het HTML-certificaat te tonen.

*Standaard: `false`*

### `hide_my_certificate_link`

**Koppeling ‘mijn certificaat’ verbergen**

De certificatenpagina verbergen voor niet-beheerders.

*Standaard: `false`*

### `session_admin_can_download_all_certificates`

**Sessiebeheerders toestaan privécertificaten te downloaden**

Indien ingeschakeld kunnen sessiebeheerders certificaten downloaden, ook als deze niet openbaar zijn gepubliceerd.

*Standaard: `false`*

## Zie ook

Aan certificaten kan nu een geldigheidsperiode en een vervaldatum worden toegekend, met geautomatiseerde of handmatige herinneringen bij verval. Dit wordt hier niet geconfigureerd — de geldigheidsperiode is een cijferboekinstelling voor docenten, en de aan/uit-schakelaar van de herinnerings-cron bevindt zich in de categorie **Cronjobs**. Zie [Certificaten en vaardigheden](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) en [Cronjob-instellingen](crons-settings.md#certificate-expiry-reminders).