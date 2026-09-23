# Beskedindstillinger

Adfærd for **Beskeder / Indbakke**-systemet.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Beskeder**. Denne kategori indeholder **7 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det ved scripting via API'et, eller når du skal ændre indstillingerne globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_message_tool`

**Internt beskedværktøj**

Aktivering af det interne beskedværktøj giver brugere mulighed for at sende beskeder til andre brugere på platformen og at have en beskedindbakke.

*Standard: `true`*

### `allow_send_message_to_all_platform_users`

**Tillad afsendelse af beskeder til enhver platformbruger**

Giver dig mulighed for at sende beskeder til enhver bruger på platformen, ikke kun dine venner eller de personer, der aktuelt er online.

*Standard: `false`*

### `allow_user_message_tracking`

**Administratorer kan se personlige beskeder**

Tillad administratorer at se personlige beskeder mellem en underviser og en kursist. Sørg for at medtage en bemærkning i dine vilkår og betingelser, da dette kan påvirke privatlivsbeskyttelsen.

*Standard: `false`*


### `filter_interactivity_messages`

**Undervisere kan kun tilgå kursisters beskeder inden for sessionsperioden**

Filtrer beskeder mellem en underviser og en kursist mellem sessionens start- og slutdatoer

*Standard: `false`*


### `message_max_upload_filesize`

**Maks. uploadfilstørrelse i beskeder**

Maksimal størrelse for filuploads i beskedværktøjet (i bytes)

*Standard: `20971520`*

### `private_messages_about_user`

**Tillad private beskeder mellem undervisere om en kursist**

Tillad udveksling af beskeder fra undervisere/chefer om en bruger fra tracking-siden for den pågældende bruger.

*Standard: `false`*


### `private_messages_about_user_visible_to_user`

**Tillad kursister at se beskeder om dem mellem undervisere**

Hvis udveksling af beskeder om en bruger er aktiveret, giver denne indstilling den pågældende bruger mulighed for at se beskederne. Dette er for at overholde gennemsigtighedsregler, som organisationen eventuelt skal overholde.

*Standard: `false`*