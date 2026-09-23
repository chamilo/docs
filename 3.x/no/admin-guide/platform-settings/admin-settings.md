# Administratoridentitetsinnstillinger

Identitet og kontaktopplysninger for plattformadministratoren. Disse verdiene vises i plattformens bunntekst og i enkelte systemgenererte e-poster.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Administratoridentitet**. Denne kategorien inneholder **12 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `administrator_email`

**Portaladministrator: e-post**

E-postadressen til plattformadministratoren (vises i bunnteksten til venstre)

### `administrator_name`

**Portaladministrator: fornavn**

Fornavnet til plattformadministratoren (vises i bunnteksten til venstre)

### `administrator_phone`

**Portaladministrator: telefonnummer**

Telefonnummeret til plattformadministratoren (vises i bunnteksten til venstre)

### `administrator_surname`

**Portaladministrator: etternavn**

Etternavnet til plattformadministratoren (vises i bunnteksten til venstre)

### `chamilo_latest_news`

**Siste nytt**

Få siste nytt fra Chamilo, inkludert sikkerhetssårbarheter og arrangementer, direkte i administrasjonspanelet. Disse nyhetene sjekkes mot Chamilo-nyhetsserveren hver gang du laster administrasjonssiden, og er bare synlige for administratorer.

*Standard: `true`*

### `chamilo_support`

**Chamilo-støtteblokk**

Få profftips og en enkel måte å kontakte offisielle tjenesteleverandører for profesjonell støtte, direkte fra skaperne av Chamilo. Denne blokken vises på administrasjonssiden, er bare synlig for administratorer, og oppdateres hver gang du laster administrasjonssiden.

*Standard: `true`*

### `max_anonymous_users`

**Flere anonyme brukere**

Aktiver dette alternativet for å tillate flere systembrukere for anonyme brukere. Dette er nyttig når plattformen brukes som et offentlig utstillingsvindu for enkelte kurs. Flere anonyme brukere gjør at sporing kan fungere gjennom hele opplevelsen for flere brukere uten at dataene blandes (noe som ellers kunne forvirre dem).

*Standard: `0`*

### `redirect_admin_to_courses_list`

**Omdiriger administrator til kurslisten**

Standardoppførselen er å sende administratorer direkte til administrasjonspanelet (mens lærere og studenter sendes til kurslisten eller plattformens startside). Aktiver for å omdirigere administratoren også til vedkommendes kursliste.

*Standard: `false`*

### `send_inscription_notification_to_general_admin_only`

**Varsle kun global administrator om nye brukere**

Når dette er aktivert, mottar kun den globale administratoren e-postvarsler om nye brukerregistreringer i stedet for alle administratorer.

*Standard: `false`*

### `show_link_request_hrm_user`

**Vis lenke for å be om tilknytning mellom bruker og HRM**

Vis en lenke på profilsiden som lar HR-direktører be om å bli knyttet til en brukerkonto.

*Standard: `false`*

### `user_status_option_only_for_admin_enabled`

**Skjul rolle for vanlige brukere**

Lar deg skjule brukernes rolle når dette alternativet er satt til true og følgende tabell setter den tilsvarende rollen til 'true'.

*Standard: `false`*

### `user_status_option_show_only_for_admin`

**Definer hvilke roller som er skjult for vanlige brukere**

Rollene som er satt til 'true' vises bare for administratorer. Andre brukere vil ikke kunne se dem.