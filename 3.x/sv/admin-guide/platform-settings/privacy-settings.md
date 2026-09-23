# Integritetsinställningar

Integritets- och dataskyddskontroller (GDPR-liknande) — samtycke, dataexport, begäranden om kontoborttagning och liknande.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Integritet**. Denna kategori innehåller **6 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `data_protection_officer_email`

**Dataskyddsombudets e-postadress**

E-postadress till det utsedda dataskyddsombudet, visad i GDPR-/integritetsavsnitt.

### `data_protection_officer_name`

**Dataskyddsombudets namn**

Fullständigt namn på det utsedda dataskyddsombudet, visat på sidor för personuppgifter och integritet.

### `data_protection_officer_role`

**Dataskyddsombudets roll**

Befattning eller roll för det utsedda dataskyddsombudet, visad tillsammans med namnet i integritetsinformationen.

### `disable_change_user_visibility_for_public_courses`

**Inaktivera visning av verktyget Användare i publika kurser**

Förhindra att någon gör verktyget "användare" synligt i en publik kurs.

*Standard: `true`*

### `disable_gdpr`

**Inaktivera GDPR-funktioner**

Om du redan hanterar din dataskyddsdeklaration mot användare på annat håll kan du tryggt inaktivera den här funktionen.

*Standard: `true`*

### `hide_user_field_from_list`

**Dölj fält i användarlistan i kursen**

Som standard visar vi all data från användare i verktyget Användare i kursen. Denna array gör det möjligt att ange vilka fält du inte vill visa. Påverkar endast huvudfält (inte extrafält).