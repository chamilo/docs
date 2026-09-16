# Opdrachten (Work) Instellingen

Standaardwaarden en gedrag van de tool **Opdrachten (Student Publications)**.

Open deze instellingen onder **Beheer > Configuratie-instellingen > Opdrachten (Work)**. Deze categorie bevat **12 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_compilatio_tool`

**Compilatio inschakelen**

Compilatio is een anti-fraude-dienst die tekst tussen twee inzendingen vergelijkt en rapporteert of er een hoge waarschijnlijkheid is dat de inhoud (meestal opdrachten) niet authentiek is.

*Standaard: `false`*

### `allow_my_student_publication_page`

**Pagina Mijn opdrachten inschakelen**

[inferred] Schakel een speciale pagina in waarop cursisten hun eigen ingediende opdrachten kunnen bekijken en beheren.

*Standaard: `false`*

### `allow_only_one_student_publication_per_user`

**Cursisten kunnen slechts één opdracht uploaden**

[inferred] Beperk cursisten tot het indienen van slechts één opdracht per activiteit, zodat meerdere inzendingen worden voorkomen.

*Standaard: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Doorverwijzen naar de startpagina van de opdrachtentool na upload of commentaar**

Doorverwijzen naar de opdrachtenlijst na het uploaden van een opdracht of het toevoegen van een commentaar

*Standaard: `false`*

### `assignment_prevent_duplicate_upload`

**Dubbele uploads in opdrachten voorkomen**

[inferred] Blokkeer cursisten om identieke bestanden te uploaden voor dezelfde opdrachtinzending.

*Standaard: `false`*

### `block_student_publication_add_documents`

**Toevoegen van documenten aan opdrachten voorkomen**

[inferred] Voorkom dat cursisten documenten toevoegen of bijvoegen bij het indienen van opdrachten.

*Standaard: `false`*

### `block_student_publication_edition`

**Bewerken van opdrachten voorkomen**

[inferred] Voorkom dat cursisten hun ingediende opdrachten wijzigen of bijwerken na de eerste inzending.

*Standaard: `false`*

### `block_student_publication_score_edition`

**Voorkomen dat de docent scores van opdrachten wijzigt**

[inferred] Voorkom dat docenten scores van opdrachten wijzigen nadat deze zijn vastgelegd.

*Standaard: `false`*

### `compilatio_tool`

**Compilatio-instellingen**

Configureer hier de verbindingsgegevens van Compilatio.

### `considered_working_time`

**Tijdsinspanning voor opdrachten inschakelen**

Hiermee kunnen docenten een geschatte tijdsinspanning (in hh:mm:ss-formaat) opgeven om de opdracht te voltooien. Na inzending van de opdracht en goedkeuring door de docent (de opdracht krijgt een score) wordt de bijbehorende tijd automatisch aan de cursist toegekend.

*Standaard: `work_time`*

### `force_download_doc_before_upload_work`

**Download van document forceren vóór upload van opdracht**

Dwing gebruikers om het bij de opdrachtdefinitie verstrekte document te downloaden voordat ze hun opdracht kunnen uploaden.

*Standaard: `true`*

### `my_courses_show_pending_work`

**Koppeling naar 'openstaande' opdrachten weergeven vanaf de pagina Mijn cursussen**

[inferred] Toon een koppeling of telling van openstaande opdrachten op de pagina Mijn cursussen van de cursist voor snelle toegang.

*Standaard: `false`*