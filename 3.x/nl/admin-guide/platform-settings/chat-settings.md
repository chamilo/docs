# Chatinstellingen

Gedrag van de **Chat**-tool in de cursus.

Open deze instellingen via **Beheer > Configuratie-instellingen > Chat**. Deze categorie bevat **5 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_global_chat`

**Globale chat toestaan**

Gebruikers kunnen met elkaar chatten

*Standaard: `false`*

### `course_chat_restrict_to_coach`

**Cursuschat beperken tot tutoren**

Sta studenten alleen toe om met de tutoren in de cursus te praten (niet met andere studenten).

*Standaard: `false`*

### `hide_chat_video`

**Videochatoptie in globale chat verbergen**

Indien ingeschakeld, is de videofunctie uitgeschakeld en niet beschikbaar in de globale chattool.

*Standaard: `true`*

### `save_private_conversations_in_documents`

**Privégesprekken opslaan in documenten**

Indien ingeschakeld, worden 1:1-privéchatsberichten gespiegeld in de documenten van de chatgeschiedenis van de cursus. Aanbevolen om uitgeschakeld te laten omwille van privacy.

*Standaard: `false`*

### `show_chat_folder`

**De geschiedenismap van chatgesprekken tonen**

Dit toont de docent de map die alle sessies bevat die in de chat zijn gemaakt; de docent kan ze zichtbaar maken of niet voor cursisten en ze als bron gebruiken

*Standaard: `true`*