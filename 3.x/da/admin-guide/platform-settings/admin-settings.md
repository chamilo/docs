# Administratoridentitetsindstillinger

Identitets- og kontaktoplysninger for platformens administrator. Disse værdier vises i platformens sidefod og i nogle systemgenererede e-mails.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Administratoridentitet**. Denne kategori indeholder **12 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `administrator_email`

**Portaladministrator: e-mail**

E-mailadressen på platformens administrator (vises i sidefoden til venstre)

### `administrator_name`

**Portaladministrator: Fornavn**

Fornavnet på platformens administrator (vises i sidefoden til venstre)

### `administrator_phone`

**Portaladministrator: Telefonnummer**

Telefonnummeret på platformens administrator (vises i sidefoden til venstre)

### `administrator_surname`

**Portaladministrator: Efternavn**

Efternavnet på platformens administrator (vises i sidefoden til venstre)

### `chamilo_latest_news`

**Seneste nyheder**

Modtag de seneste nyheder fra Chamilo, herunder sikkerhedssårbarheder og begivenheder, direkte i administrationspanelet. Disse nyheder tjekkes på Chamilo-nyhedsserveren, hver gang du indlæser administrationssiden, og er kun synlige for administratorer.

*Standard: `true`*

### `chamilo_support`

**Chamilo-supportblok**

Få professionelle tips og en nem måde at kontakte officielle serviceudbydere for professionel support, direkte fra skaberne af Chamilo. Denne blok vises på din administrationsside, er kun synlig for administratorer og opdateres, hver gang du indlæser administrationssiden.

*Standard: `true`*

### `max_anonymous_users`

**Flere anonyme brugere**

Aktivér denne indstilling for at tillade flere systembrugere til anonyme brugere. Dette er nyttigt, når platformen bruges som et offentligt udstillingsvindue for visse kurser. Flere anonyme brugere gør det muligt for tracking at fungere i hele oplevelsens varighed for flere brugere uden at blande deres data (hvilket ellers kunne forvirre dem).

*Standard: `0`*

### `redirect_admin_to_courses_list`

**Omdiriger administrator til kursuslisten**

Standardadfærden er at sende administratorer direkte til administrationspanelet (mens undervisere og studerende sendes til kursuslisten eller platformens startside). Aktivér for også at omdirigere administratoren til vedkommendes kursusliste.

*Standard: `false`*

### `send_inscription_notification_to_general_admin_only`

**Giv kun den globale administrator besked om nye brugere**

Når indstillingen er aktiveret, modtager kun den globale administrator e-mailnotifikationer om nye brugerregistreringer i stedet for alle administratorer.

*Standard: `false`*

### `show_link_request_hrm_user`

**Vis link til at anmode om tilknytning mellem bruger og HRM**

Vis et link på profilsiden, der giver HR-direktører mulighed for at anmode om at blive knyttet til en brugerkonto.

*Standard: `false`*

### `user_status_option_only_for_admin_enabled`

**Skjul rolle for almindelige brugere**

Gør det muligt at skjule brugeres rolle, når denne indstilling er sat til true, og det følgende array sætter den tilsvarende rolle til 'true'.

*Standard: `false`*

### `user_status_option_show_only_for_admin`

**Angiv, hvilke roller der er skjult for almindelige brugere**

De roller, der er sat til 'true', vises kun for administratorer. Andre brugere vil ikke kunne se dem.