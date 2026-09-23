# Inställningar för certifikat

Standardvärden som tillämpas när en deltagare erhåller ett certifikat från betygsboken.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Certifikat**. Denna kategori innehåller **11 inställningar**, listade nedan med den titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `add_certificate_pdf_footer`

**Lägg till sidfot i PDF-export av certifikat**

När funktionen är aktiverad läggs en sidfot till i PDF-exporter av certifikat.

*Standard: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Automatisk generering av certifikat vid WS-anrop**

När funktionen är aktiverad, och när webbtjänsten WSCertificatesList används, säkerställer detta alternativ att alla certifikat har genererats av användare om de har uppnått tillräcklig poäng i alla objekt som definierats i betygsböcker för alla kurser och sessioner (detta kan förbruka avsevärda processresurser på servern).

*Standard: `false`*

### `allow_certificates_search` **v3**

**Tillåt sökning av certifikat**

Tillåt användare och besökare att söka genererade certifikat från menyn i den övre listen.

*Standard: `false`*

### `allow_general_certificate`

**Aktivera allmänt certifikat**

Ett allmänt certifikat är ett certifikat som samlar alla prestationer som användaren har uppnått i de kurser som hen har följt.

*Standard: `false`*

### `allow_public_certificates`

**Tillåt publika certifikat**

Användarcertifikat kan visas av oregistrerade användare.

*Standard: `false`*

### `certificate_filter_by_official_code`

**Filtrera certifikat efter officiell kod**

Lägg till ett filter på studenternas officiella kod i certifikatlistan.

*Standard: `false`*

### `certificate_pdf_orientation`

**PDF-orientering för certifikat**

Ange ‘portrait’ eller ‘landscape’ (tekniska termer) för PDF-certifikat.

*Standard: `landscape`*

### `hide_certificate_export_link`

**Certifikat: dölj PDF-exportlänk för alla**

Aktivera för att helt ta bort möjligheten att exportera certifikat till PDF (för alla användare). Om funktionen är aktiverad döljs den även för studenter.

*Standard: `false`*

### `hide_certificate_export_link_students`

**Certifikat: dölj exportlänk för studenter**

Om funktionen är aktiverad kan studenter inte exportera sina certifikat till PDF. Detta alternativ finns eftersom PDF-exporten, beroende på den exakta HTML-strukturen i certifikatmallen, kan bli av låg kvalitet. I så fall är det bäst att endast visa HTML-certifikatet för studenterna.

*Standard: `false`*

### `hide_my_certificate_link`

**Dölj länken ’mitt certifikat’**

Dölj certifikatsidan för användare som inte är administratörer.

*Standard: `false`*

### `session_admin_can_download_all_certificates`

**Tillåt sessionsadministratörer att ladda ner privata certifikat**

Om funktionen är aktiverad kan sessionsadministratörer ladda ner certifikat även om de inte är publikt publicerade.

*Standard: `false`*

## Se även

Certifikat kan nu ges en giltighetsperiod och ett utgångsdatum, med automatiska eller manuella påminnelser om utgång. Detta konfigureras inte här — giltighetsperioden är en lärarvänd inställning i betygsboken, och cron-jobbets på/av-brytare för påminnelser finns i kategorin **Cron-jobb**. Se [Certifikat och färdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) och [Inställningar för cron-jobb](crons-settings.md#certificate-expiry-reminders).