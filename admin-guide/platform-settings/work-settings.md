# Instellingen voor Opdrachten (Werk)

Standaardinstellingen en gedrag van de tool **Opdrachten (Studentenpublicaties)**.

Deze instellingen zijn toegankelijk via **Beheer > Configuratie-instellingen > Opdrachten (Werk)**. Deze categorie bevat **12 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_compilatio_tool`

**Compilatio inschakelen**

Compilatio is een anti-spiekdienst die tekst tussen twee inzendingen vergelijkt en rapporteert of er een hoge kans is dat de inhoud (meestal opdrachten) niet authentiek is.

*Standaard: `false`*

### `allow_my_student_publication_page`

**Pagina Mijn opdrachten inschakelen**

[afgeleid] Schakel een speciale pagina in voor leerlingen om hun eigen ingediende opdrachten te bekijken en te beheren.

*Standaard: `false`*

### `allow_only_one_student_publication_per_user`

**Studenten kunnen slechts één opdracht uploaden**

[afgeleid] Beperk leerlingen tot het indienen van slechts één opdracht per activiteit, waardoor meerdere inzendingen worden voorkomen.

*Standaard: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Doorverwijzen naar startpagina van opdrachtentool na upload of opmerking**

Doorverwijzen naar de opdrachtenlijst na het uploaden van een opdracht of het toevoegen van een opmerking.

*Standaard: `false`*

### `assignment_prevent_duplicate_upload`

**Dubbele uploads in opdrachten voorkomen**

[afgeleid] Voorkom dat leerlingen identieke bestanden uploaden voor dezelfde opdrachtinzending.

*Standaard: `false`*

### `block_student_publication_add_documents`

**Toevoegen van documenten aan opdrachten blokkeren**

[afgeleid] Voorkom dat leerlingen documenten toevoegen of bijvoegen bij het indienen van opdrachten.

*Standaard: `false`*

### `block_student_publication_edition`

**Bewerken van opdrachten blokkeren**

[afgeleid] Voorkom dat leerlingen hun ingediende opdrachten wijzigen of bijwerken na de initiële inzending.

*Standaard: `false`*

### `block_student_publication_score_edition`

**Voorkomen dat docenten opdrachtscores wijzigen**

[afgeleid] Voorkom dat docenten opdrachtscores wijzigen nadat deze zijn vastgelegd.

*Standaard: `false`*

### `compilatio_tool`

**Compilatio-instellingen**

Configureer hier de verbindingsdetails voor Compilatio.

### `considered_working_time`

**Tijdsinspanning voor opdrachten inschakelen**

Hiermee kunnen docenten een geschatte tijdsinspanning (in hh:mm:ss-formaat) opgeven om de opdracht te voltooien. Bij het indienen van de opdracht en goedkeuring door de docent (de opdracht krijgt een score), wordt de leerling automatisch de overeenkomstige tijd toegewezen.

*Standaard: `work_time`*

### `force_download_doc_before_upload_work`

**Downloaden van document afdwingen vóór uploaden van opdracht**

Dwing gebruikers om het verstrekte document in de opdrachtdefinitie te downloaden voordat ze hun opdracht kunnen uploaden.

*Standaard: `true`*

### `my_courses_show_pending_work`

**Link naar 'openstaande' opdrachten weergeven op Mijn cursussen-pagina**

[afgeleid] Toon een link of telling van openstaande opdrachten op de Mijn cursussen-pagina van de leerling voor snelle toegang.

*Standaard: `false`*