# Chat-innstillinger

Oppførsel for **Chat**-verktøyet i kurset.

Åpne disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Chat**. Denne kategorien inneholder **5 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_global_chat`

**Tillat global chat**

Brukere kan chatte med hverandre

*Standard: `false`*

### `course_chat_restrict_to_coach`

**Begrens kurschat til veiledere**

Tillat kun at studenter snakker med veilederne i kurset (ikke med andre studenter).

*Standard: `false`*

### `hide_chat_video`

**Skjul videochat-valg i global chat**

Når dette er aktivert, er videochat-funksjonalitet deaktivert og utilgjengelig i det globale chat-verktøyet.

*Standard: `true`*

### `save_private_conversations_in_documents`

**Lagre private samtaler i dokumenter**

Hvis dette er aktivert, speiles 1:1 private chat-meldinger i dokumentene for kurschattens historikk. Anbefales å holde deaktivert av personvernhensyn.

*Standard: `false`*

### `show_chat_folder`

**Vis historikkmappen for chatsamtaler**

Dette viser læreren mappen som inneholder alle økter som er gjennomført i chatten. Læreren kan gjøre dem synlige eller usynlige for lærende og bruke dem som en ressurs

*Standard: `true`*