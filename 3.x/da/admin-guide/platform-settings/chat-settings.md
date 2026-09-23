# Chat-indstillinger

Adfærd for kursusværktøjet **Chat**.

Adgang til disse indstillinger under **Administration > Konfigurationsindstillinger > Chat**. Denne kategori indeholder **5 indstillinger**, som er anført nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_global_chat`

**Tillad global chat**

Brugere kan chatte med hinanden

*Standard: `false`*

### `course_chat_restrict_to_coach`

**Begræns kursuschat til tutorer**

Tillad kun, at studerende taler med tutorerne på kurset (ikke med andre studerende).

*Standard: `false`*

### `hide_chat_video`

**Skjul videochat-indstillingen i global chat**

Når den er aktiveret, deaktiveres videochat-funktionaliteten og er utilgængelig i det globale chatværktøj.

*Standard: `true`*

### `save_private_conversations_in_documents`

**Gem private samtaler i dokumenter**

Hvis den er aktiveret, spejles 1:1-private chatbeskeder i kursusets chat-historikdokumenter. Det anbefales at holde den deaktiveret af hensyn til privatlivet.

*Standard: `false`*

### `show_chat_folder`

**Vis historikmappen for chatsamtaler**

Dette viser læreren mappen, der indeholder alle sessioner, der er blevet gennemført i chatten; læreren kan gøre dem synlige eller usynlige for de studerende og bruge dem som en ressource

*Standard: `true`*