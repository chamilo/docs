# Opgaver (Work) – indstillinger

Standarder og adfærd for værktøjet **Opgaver (studenterpublikationer)**.

Disse indstillinger findes under **Administration > Konfigurationsindstillinger > Opgaver (Work)**. Kategorien indeholder **12 indstillinger**, som er oplistet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre indstillingerne globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_compilatio_tool`

**Aktivér Compilatio**

Compilatio er en anti-snyd-tjeneste, der sammenligner tekst mellem to afleveringer og rapporterer, hvis der er høj sandsynlighed for, at indholdet (typisk opgaver) ikke er originalt.

*Standard: `false`*

### `allow_my_student_publication_page`

**Aktivér siden Mine opgaver**

[inferred] Aktivér en dedikeret side, hvor kursister kan se og administrere deres egne afleverede opgaver.

*Standard: `false`*

### `allow_only_one_student_publication_per_user`

**Kursister kan kun uploade én opgave**

[inferred] Begræns kursister til kun at aflevere én opgave pr. aktivitet, så flere afleveringer forhindres.

*Standard: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Omdirigér til opgaveværktøjets startside efter upload eller kommentar**

Omdirigér til opgavelisten efter upload af en opgave eller tilføjelse af en kommentar

*Standard: `false`*

### `assignment_prevent_duplicate_upload`

**Forhindr dublerede uploads i opgaver**

[inferred] Bloker kursister fra at uploade identiske filer til den samme opgaveaflevering.

*Standard: `false`*

### `block_student_publication_add_documents`

**Forhindr tilføjelse af dokumenter til opgaver**

[inferred] Forhindr kursister i at tilføje eller vedhæfte dokumenter, når de afleverer opgaver.

*Standard: `false`*

### `block_student_publication_edition`

**Forhindr redigering af opgaver**

[inferred] Forhindr kursister i at ændre eller opdatere deres afleverede opgaver efter den første aflevering.

*Standard: `false`*

### `block_student_publication_score_edition`

**Forhindr underviser i at ændre opgavekarakterer**

[inferred] Forhindr undervisere i at ændre opgavekarakterer, efter de er registreret.

*Standard: `false`*

### `compilatio_tool`

**Compilatio-indstillinger**

Konfigurér Compilatio-forbindelsesoplysningerne her.

### `considered_working_time`

**Aktivér tidsindsats for opgaver**

Dette giver undervisere mulighed for at angive en estimeret tidsindsats (i formatet tt:mm:ss) til at fuldføre opgaven. Når opgaven er afleveret og godkendt af underviseren (opgaven tildeles en karakter), tildeles kursisten automatisk den tilsvarende tid.

*Standard: `work_time`*

### `force_download_doc_before_upload_work`

**Gennemtving download af dokument før opgaveupload**

Tving brugere til at downloade det angivne dokument i opgavedefinitionen, før de kan uploade deres opgave.

*Standard: `true`*

### `my_courses_show_pending_work`

**Vis link til 'afventende' opgaver fra siden Mine kurser**

[inferred] Vis et link eller et antal afventende opgaver på kursistens side Mine kurser for hurtig adgang.

*Standard: `false`*