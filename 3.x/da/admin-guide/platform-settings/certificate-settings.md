# Certifikatindstillinger

Standarder, der anvendes, når en kursist optjener et certifikat fra karakterbogen.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Certifikater**. Denne kategori indeholder **11 indstillinger**, som er oplistet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `add_certificate_pdf_footer`

**Tilføj sidefod til PDF-eksport af certifikater**

Når indstillingen er aktiveret, tilføjes en sidefod til PDF-eksport af certifikater.

*Standard: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Automatisk generering af certifikater ved WS-kald**

Når indstillingen er aktiveret, og når webservice’en WSCertificatesList anvendes, sørger denne indstilling for, at alle certifikater er blevet genereret af brugerne, hvis de har nået den tilstrækkelige score i alle elementer defineret i karakterbøger for alle kurser og sessioner (dette kan forbruge betydelige processeringsressourcer på din server).

*Standard: `false`*

### `allow_certificates_search` **v3**

**Tillad søgning i certifikater**

Tillad brugere og besøgende at søge i genererede certifikater fra menulinjen øverst.

*Standard: `false`*

### `allow_general_certificate`

**Aktivér generelt certifikat**

Et generelt certifikat er et certifikat, der samler alle brugerens præstationer i de kurser, vedkommende har fulgt.

*Standard: `false`*

### `allow_public_certificates`

**Tillad offentlige certifikater**

Brugercertifikater kan vises af uregistrerede brugere.

*Standard: `false`*

### `certificate_filter_by_official_code`

**Filtrér certifikater efter officielt kode**

Tilføj et filter på de studerendes officielle kode til listen over certifikater.

*Standard: `false`*

### `certificate_pdf_orientation`

**PDF-orientering for certifikater**

Angiv ‘portrait’ eller ‘landscape’ (tekniske termer) for PDF-certifikater.

*Standard: `landscape`*

### `hide_certificate_export_link`

**Certifikater: skjul PDF-eksportlink for alle**

Aktivér for helt at fjerne muligheden for at eksportere certifikater til PDF (for alle brugere). Hvis indstillingen er aktiveret, omfatter det også, at den skjules for studerende.

*Standard: `false`*

### `hide_certificate_export_link_students`

**Certifikater: skjul eksportlink for studerende**

Hvis indstillingen er aktiveret, kan studerende ikke eksportere deres certifikater til PDF. Denne indstilling findes, fordi PDF-eksporten, afhængigt af den præcise HTML-struktur i certifikatskabelonen, kan være af lav kvalitet. I så fald er det bedst kun at vise HTML-certifikatet for de studerende.

*Standard: `false`*

### `hide_my_certificate_link`

**Skjul linket ‘mit certifikat’**

Skjul certifikatsiden for brugere, der ikke er administratorer.

*Standard: `false`*

### `session_admin_can_download_all_certificates`

**Tillad sessionsadministratorer at downloade private certifikater**

Hvis indstillingen er aktiveret, kan sessionsadministratorer downloade certifikater, selvom de ikke er offentliggjort.

*Standard: `false`*

## Se også

Certifikater kan nu tildeles en gyldighedsperiode og en udløbsdato med automatiske eller manuelle påmindelser om udløb. Dette konfigureres ikke her — gyldighedsperioden er en lærerrettet indstilling i karakterbogen, og tænd/sluk-kontakten til påmindelses-cron’en findes i kategorien **Cron-jobs**. Se [Certifikater og færdigheder](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) og [Indstillinger for cron-jobs](crons-settings.md#certificate-expiry-reminders).