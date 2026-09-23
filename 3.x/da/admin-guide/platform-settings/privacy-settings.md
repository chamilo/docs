# Privatlivsindstillinger

Kontroller til privatliv og databeskyttelse (GDPR-lignende) — samtykke, dataeksport, anmodninger om sletning af konto og lignende.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Privatliv**. Denne kategori indeholder **6 indstillinger**, som er listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre indstillingerne på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `data_protection_officer_email`

**E-mailadresse på databeskyttelsesansvarlig**

E-mailadresse på den udpegede databeskyttelsesansvarlige, vist i GDPR-/privatlivssektioner.

### `data_protection_officer_name`

**Navn på databeskyttelsesansvarlig**

Fulde navn på den udpegede databeskyttelsesansvarlige, vist på sider om persondata og privatliv.

### `data_protection_officer_role`

**Rolle for databeskyttelsesansvarlig**

Stilling eller rolle for den udpegede databeskyttelsesansvarlige, vist sammen med vedkommendes navn i privatlivsoplysninger.

### `disable_change_user_visibility_for_public_courses`

**Deaktiver visning af værktøjet Brugere i offentlige kurser**

Undgå at nogen gør værktøjet 'users' synligt i et offentligt kursus.

*Standard: `true`*

### `disable_gdpr`

**Deaktiver GDPR-funktioner**

Hvis du allerede håndterer din erklæring om beskyttelse af persondata over for brugerne andetsteds, kan du trygt deaktivere denne funktion.

*Standard: `true`*

### `hide_user_field_from_list`

**Skjul felter fra brugerlisten i kurset**

Som standard viser vi alle data om brugere i værktøjet Brugere i kurset. Dette array lader dig angive, hvilke felter du ikke ønsker at vise. Påvirker kun hovedfelter (ikke ekstra felter).