# Sertifikatinnstillinger

Standardverdier som brukes når en student oppnår et sertifikat fra karakterboken.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Sertifikater**. Denne kategorien inneholder **11 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `add_certificate_pdf_footer`

**Legg til bunntekst i PDF-eksport av sertifikater**

Når dette er aktivert, legges det til en bunntekst i PDF-eksport av sertifikater.

*Standard: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Automatisk generering av sertifikater ved WS-kall**

Når dette er aktivert, og når webtjenesten WSCertificatesList brukes, sørger dette valget for at alle sertifikater er generert av brukere dersom de har oppnådd tilstrekkelig poengsum i alle elementer definert i karakterbøker for alle kurs og økter (dette kan forbruke betydelige prosesseringsressurser på serveren din).

*Standard: `false`*

### `allow_certificates_search` **v3**

**Tillat søk i sertifikater**

Tillat brukere og besøkende å søke i genererte sertifikater fra menyen i topplinjen.

*Standard: `false`*

### `allow_general_certificate`

**Aktiver generelt sertifikat**

Et generelt sertifikat er et sertifikat som samler alle prestasjonene til brukeren i kursene vedkommende har fulgt.

*Standard: `false`*

### `allow_public_certificates`

**Tillat offentlige sertifikater**

Brukersertifikater kan vises av uregistrerte brukere.

*Standard: `false`*

### `certificate_filter_by_official_code`

**Filtrer sertifikater etter offisiell kode**

Legg til et filter på studentenes offisielle kode i sertifikatlisten.

*Standard: `false`*

### `certificate_pdf_orientation`

**PDF-orientering for sertifikater**

Angi «portrait» eller «landscape» (tekniske termer) for PDF-sertifikater.

*Standard: `landscape`*

### `hide_certificate_export_link`

**Sertifikater: skjul PDF-eksportlenke for alle**

Aktiver for å fjerne muligheten til å eksportere sertifikater til PDF helt (for alle brukere). Hvis aktivert, inkluderer dette at den skjules for studenter.

*Standard: `false`*

### `hide_certificate_export_link_students`

**Sertifikater: skjul eksportlenke for studenter**

Hvis aktivert, vil ikke studenter kunne eksportere sertifikatene sine til PDF. Dette valget er tilgjengelig fordi PDF-eksporten, avhengig av den nøyaktige HTML-strukturen i sertifikatmalen, kan ha lav kvalitet. I slike tilfeller er det best å bare vise HTML-sertifikatet til studentene.

*Standard: `false`*

### `hide_my_certificate_link`

**Skjul lenken «mitt sertifikat»**

Skjul sertifikatsiden for brukere som ikke er administratorer.

*Standard: `false`*

### `session_admin_can_download_all_certificates`

**Tillat øktadministratorer å laste ned private sertifikater**

Hvis aktivert, kan øktadministratorer laste ned sertifikater selv om de ikke er offentlig publisert.

*Standard: `false`*

## Se også

Sertifikater kan nå gis en gyldighetsperiode og en utløpsdato, med automatiske eller manuelle påminnelser om utløp. Dette konfigureres ikke her — gyldighetsperioden er en lærerrettet innstilling i karakterboken, og av/på-bryteren for påminnelses-cron ligger i kategorien **Cron-jobber**. Se [Sertifikater og ferdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) og [Innstillinger for cron-jobber](crons-settings.md#certificate-expiry-reminders).