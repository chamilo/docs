# Chatinstellingen

Gedrag van de cursustool **Chat**.

Open deze instellingen via **Beheer > Configuratie-instellingen > Chat**. Deze categorie bevat **5 instellingen**, hieronder vermeld met de titel en de toelichting zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_global_chat`

**Globaal chatten toestaan**

Gebruikers kunnen met elkaar chatten

*Standaard: `false`*

### `course_chat_restrict_to_coach`

**Cursuschat beperken tot begeleiders**

Sta cursisten alleen toe om met de begeleiders in de cursus te praten (niet met andere cursisten).

*Standaard: `false`*

### `hide_chat_video`

**Videochatoptie in de globale chat verbergen**

Indien ingeschakeld, is de videochatfunctionaliteit uitgeschakeld en niet beschikbaar in de globale chattool.

*Standaard: `true`*

De standaardwaarde `true` verbergt de actie **Videogesprek starten** in de **zwevende platformchat**. Stel deze in op `false` om één-op-één-WebRTC-gesprekken in te schakelen voor ondersteunde browsers; gebruikers moeten ook toegang hebben tot de platformchat, aangemeld zijn en werkende camera- en microfoonmachtigingen hebben. Dit is **niet** de BigBlueButton- of Zoom-integratie voor cursusvideoconferenties. Zie [Eén-op-één-videogesprekken](../../student-guide/video-calls.md) voor de workflow van de cursist (issue [#3777](https://github.com/chamilo/chamilo-lms/issues/3777)).


### `save_private_conversations_in_documents`

**Privégesprekken opslaan in documenten**

Indien ingeschakeld, worden 1:1-privéchatberichten gespiegeld in de documenten met de cursuschatgeschiedenis. Het wordt aanbevolen dit uit privacyoverwegingen uitgeschakeld te laten.

*Standaard: `false`*

### `show_chat_folder`

**De geschiedenismap van chatgesprekken tonen**

Hiermee wordt aan de docent de map getoond die alle sessies bevat die in de chat zijn gemaakt. De docent kan deze al dan niet zichtbaar maken voor cursisten en ze als leermiddel gebruiken

*Standaard: `true`*