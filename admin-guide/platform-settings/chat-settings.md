# Chat-instellingen

Gedrag van de cursus **Chat**-tool.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Chat**. Deze categorie bevat **5 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_global_chat`

**Globale chat toestaan**

Gebruikers kunnen met elkaar chatten

*Standaard: `false`*

### `course_chat_restrict_to_coach`

**Cursuschat beperken tot coaches**

Alleen studenten toestaan om met de tutors in de cursus te praten (niet met andere studenten).

*Standaard: `false`*

### `hide_chat_video`

**Videochatoptie in globale chat verbergen**

Wanneer ingeschakeld, wordt de videochatfunctionaliteit uitgeschakeld en is deze niet beschikbaar in de globale chat-tool.

*Standaard: `true`*

### `save_private_conversations_in_documents`

**Privégesprekken opslaan in documenten**

Indien ingeschakeld, worden 1:1 privégesprekken gespiegeld in de cursuschatgeschiedenisdocumenten. Aanbevolen om uitgeschakeld te laten voor privacy.

*Standaard: `false`*

### `show_chat_folder`

**Map met chatgesprekgeschiedenis weergeven**

Hiermee wordt aan de docent de map getoond die alle sessies bevat die in de chat zijn gemaakt. De docent kan deze zichtbaar maken of niet voor leerlingen en ze als bron gebruiken.

*Standaard: `true`*