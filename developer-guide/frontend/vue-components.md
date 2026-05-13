# Composants Vue

Chamilo dispose d'un large ensemble de composants Vue organisés par domaine de fonctionnalité dans `assets/vue/components/`.

## Composants de base

La famille `Base*` dans `assets/vue/components/basecomponents/` encapsule les primitives PrimeVue avec des paramètres par défaut spécifiques à Chamilo (mise en page FloatLabel, icônes MDI via `chamiloIconToClass`, messages de validation cohérents, dimensionnement Tailwind). Privilégiez toujours un composant `Base*` avant d'importer directement le composant PrimeVue sous-jacent — c'est ainsi que l'interface utilisateur reste cohérente à travers l'application SPA et que les modifications de design peuvent être déployées depuis un seul endroit.

Les composants **ne sont pas** enregistrés globalement (la seule primitive PrimeVue enregistrée globalement est `Column`, utilisée dans `BaseTable`). Importez chacun explicitement :

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Champs de formulaire

La plupart acceptent la valeur via `v-model`, exposent les props `id` et `label` pour l'accessibilité et la liaison avec les étiquettes flottantes, et gèrent la validation via une paire `isInvalid` / `errorText` (ou `messageText`).

| Composant                        | Encapsule                                            | Objectif                                                                                                                                                                                            |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Champ de texte sur une seule ligne. Passe à une étiquette statique pour les entrées de type `date`/`time`/`datetime-local` (où l'étiquette flottante chevaucherait le placeholder natif).          |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adaptateur léger pour Vuelidate : transmet `$error` à `isInvalid` et affiche `$errors[].$message` dans le slot `errors`. À associer avec un objet de champ Vuelidate.                            |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Champ de texte multiligne.                                                                                                                                                                         |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Même modèle d'adaptateur Vuelidate que `BaseInputTextWithVuelidate`.                                                                                                                               |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Champ numérique avec `min` / `max` / `step` et boutons de défilement.                                                                                                                              |
| `BaseInputTags.vue`              | (personnalisé)                                       | Étiquettes de texte libre ; les étiquettes sont ajoutées sur entrée/virgule et supprimées avec la touche retour.                                                                                   |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Champ de texte associé à un bouton d'action (style recherche).                                                                                                                                     |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Case à cocher binaire ou liée à une valeur avec étiquette.                                                                                                                                         |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Groupe de boutons radio piloté par un tableau `options: [{label, value}]`.                                                                                                                         |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Bouton à deux états (étiquettes et icônes activé/désactivé) lié via `v-model`.                                                                                                                     |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Sélecteur de date ou date-heure. Respecte `platform.timepicker_increment` et la locale de l'utilisateur via `calendarLocales`.                                                                     |
| `BaseColorPicker.vue`            | natif `<input type="color">` + `InputText`           | Sélecteur de couleur avec repli sur texte hexadécimal ; utilise `colorjs.io` pour valider l'entrée hexadécimale manuelle.                                                                          |
| `BaseRating.vue`                 | `Rating`                                             | Champ d'évaluation par étoiles.                                                                                                                                                                    |
| `BaseFileUpload.vue`             | natif `<input type="file">` + `BaseButton`           | Sélecteur de fichier unique qui déclenche un bouton de style pièce jointe.                                                                                                                         |
| `BaseFileUploadMultiple.vue`     | natif `<input type="file" multiple>` + `BaseButton`  | Variante multi-fichiers de `BaseFileUpload`.                                                                                                                                                       |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Téléverseur Uppy complet (webcam, audio, éditeur d'image, téléversement XHR) avec locales liées à la `appLocale` actuelle. Utilisez-le pour des téléversements riches avec progression ; utilisez `BaseFileUpload*` pour des pièces jointes simples. |

### Sélection et autocomplétion

| Composant              | Encapsule                        | Objectif                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Menu déroulant à choix unique avec bouton de réinitialisation optionnel.                                                          |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Menu déroulant à choix multiple affichant les éléments sélectionnés sous forme d'étiquettes.                                      |
| `BaseSearchSelect.vue` | `Dropdown` avec `filter`     | Menu déroulant à choix unique avec boîte de recherche intégrée, défilement virtuel optionnel et modèle d'option sur deux lignes (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Autocomplétion asynchrone (minimum 3 caractères). Prend en charge la sélection unique ou multiple et un slot `chip` pour personnaliser les étiquettes. |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Tableau de recherche d'utilisateurs paginé avec sélection de lignes. Utilisez-le lorsqu'une fonctionnalité nécessite un sélecteur d'utilisateurs de style administrateur. |

### Boutons et actions

| Composant                        | Encapsule               | Objectif                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Bouton standard de Chamilo. Résout les icônes via `chamiloIconToClass`, normalise `type` en `severity`/`variant` de PrimeVue, rend un `BaseAppLink` interne lorsqu'un `route` ou `toUrl` est fourni (ainsi, le même composant gère les cas de router-link, d'ancre et de bouton simple). Les valeurs acceptées pour `type` sont listées dans `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Bouton de divulgation qui bascule un panneau de "paramètres avancés" inséré via `v-model`.                                                                                                                                                                                                                                                                  |
| `BaseToolbar.vue`                | `Toolbar`           | Barre d'outils d'action avec des slots `start` / `end` (ou un slot par défaut unique). `showTopBorder` optionnel pour le style de séparateur.                                                                                                                                                                                                               |

### Affichage et données

| Composant            | Encapsule                       | Objectif                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Tableau de données standard de Chamilo. Prend en charge le mode côté serveur (`lazy`), le tri multi-colonnes, le filtre global, la sélection de lignes et la pagination. Passez les colonnes comme enfants `<Column>` (enregistrées globalement). |
| `BaseCard.vue`       | `Card`                      | Enveloppe de carte qui transmet les slots `header`, `title`, `subtitle`, `footer` et par défaut (contenu).                                                                                      |
| `BaseChart.vue`      | `Chart`                     | Préréglage de graphique circulaire. Passez un objet `data` compatible avec Chart.js.                                                                                                           |
| `BaseChip.vue`       | `Chip`                      | Étiquette rendue à partir d'un objet `{value, labelField, imageField}`, avec un bouton de suppression optionnel.                                                                                |
| `BaseTag.vue`        | `Tag`                       | Étiquette colorée. Mappe le `warning` de Chamilo au `warn` de PrimeVue.                                                                                                                        |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Ligne d'avatars avec compteur de dépassement (par exemple "+3") ; pilotée par `useAvatarList`.                                                                                                 |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar d'utilisateur avec image de secours, état de chargement et étiquette accessible.                                                                                                        |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Rendu d'icône Chamilo. Ajoute un badge optionnel (texte ou icône), une info-bulle et un modificateur de taille. Passez toujours un nom sémantique Chamilo (par exemple `"edit"`), pas une classe MDI brute. |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Champ de recherche avec une icône de loupe en tête.                                                                                                                                             |
| `BaseDivider.vue`    | `Divider`                   | Séparateur horizontal ou vertical, avec titre et alignement optionnels.                                                                                                                         |

### Navigation et menus

| Composant                  | Encapsule                   | Objectif                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu contextuel qui comprend les routes du routeur dans les éléments `model[]`.                                                                                                         |
| `BaseDropdownMenu.vue`     | (personnalisé)          | Déclencheur de menu déroulant léger avec coordination d'ouverture unique (l'ouverture d'un ferme les autres).                                                                            |
| `BaseContextMenu.vue`      | (personnalisé)          | Menu contextuel de clic droit / positionné, contrôlé par `visible` + `position`.                                                                                                       |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu de navigation de style accordéon utilisé dans les barres latérales ; suit automatiquement les clés développées à partir du modèle.                                                |
| `BaseRouteTabs.vue`        | Ligne `BaseAppLink`     | Barre d'onglets où chaque onglet est un lien de routeur. L'onglet actif est mis en surbrillance automatiquement en fonction de la route actuelle.                                     |
| `BaseAppLink.vue`          | `RouterLink` *ou* `<a>` | Lien intelligent : rend un `<a>` lorsque `url` est défini (externe/ancien), sinon un `<RouterLink>` de Vue Router. Utilisez-le à la place de l'une ou l'autre primitive pour uniformiser les liens internes/externes. |

### Dialogues

`BaseDialog` est la base ; les autres s'appuient dessus pour les flux courants de confirmation/annulation et de suppression.

| Composant                     | Encapsule                     | Objectif                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Dialogue modal avec un en-tête titré (icône d'en-tête optionnelle `headerIcon`) et un corps/pied de page inséré. L'état d'ouverture est un `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal de confirmation/annulation avec deux boutons. `type` (gravité) et `icon` de confirmation configurables ; émet `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal pré-construit "Êtes-vous sûr de vouloir supprimer cet élément ?" avec un bouton de confirmation stylisé en danger.          |

### Éditeur et contenu riche

| Composant            | Encapsule                                           | Objectif                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via le `components/Editor` du projet) | Éditeur de texte riche avec `FloatLabel`, suivi de l'état de focus/vide et intégration avec le contexte du cours actuel (`cidReq`). Utilisez-le pour tout champ HTML rédigé par l'utilisateur. |

### Aides

| Fichier              | Objectif                                                                                                                                                                                                                                                          |
|----------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js`    | Mappe les noms d'icônes sémantiques (`edit`, `delete`, `eye-on`, `courses`, …) aux classes CSS MDI. Environ 127 entrées. Parcourez-les à `/admin/list-icons` sur une instance en cours d'exécution.                                                              |
| `validators.js`      | Validateurs de props partagés : `iconValidator` (doit être un nom d'icône Chamilo connu), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (types autorisés pour `BaseButton`). Importez-les lors de la définition de nouveaux composants `Base*` qui suivent ces conventions. |

### Conventions à travers les composants de base

* **v-model via `defineModel()`** — la valeur (et souvent `isVisible`, `filters`, `selectedItems`) sont exposées comme modèles ; passez-les avec `v-model[:name]` plutôt que `:prop` + `@update:prop`.
* **Étiquettes flottantes** — la plupart des champs de formulaire enveloppent leur entrée dans `FloatLabel variant="on"` de PrimeVue. Fournissez `label` (le texte affiché) et `id` (utilisé pour lier le `<label for>`).
* **Messages de validation** — les champs exposent `isInvalid` et un petit message sous l'entrée (`errorText`, `messageText` ou `smallText` selon le composant). Des variantes compatibles avec Vuelidate existent pour les plus courantes.
* **Icônes** — passez des noms sémantiques Chamilo, pas des classes MDI brutes. Les composants les résolvent via `chamiloIconToClass`.
* **Dimensionnement** — `size="normal" | "small" | "large"` est la propriété de dimensionnement conventionnelle (voir `sizeValidator`).
* **Composition plutôt que duplication** — `BaseDialogDelete` encapsule `BaseDialogConfirmCancel`, qui encapsule `BaseDialog` ; `BaseToggleButton` et `BaseAdvancedSettingsButton` encapsulent `BaseButton`. Lorsque vous avez besoin d'une variante récurrente d'un composant existant, préférez composer un nouveau `Base*` par-dessus plutôt que de le réimplémenter dans un dossier de fonctionnalité.

## Composants de mise en page

Situés dans `components/layout/` :

| Composant | Objectif |
|-----------|----------|
| `DashboardLayout.vue` | Mise en page principale : barre supérieure + barre latérale + zone de contenu |
| `Sidebar.vue` | Panneau de navigation gauche (rétractable) |
| `TopbarLoggedIn.vue` | Barre supérieure avec logo, boîte de réception, avatar |

---
## Composants par domaine de fonctionnalité

| Répertoire | Composants | Objectif |
|------------|------------|----------|
| `course/` | Cartes de cours, filtres de catalogue, formulaires de cours | Liste et gestion des cours |
| `session/` | Cartes de session, catalogue | Liste des sessions |
| `assignments/` | Listes de soumissions, modales de notation, formulaires | Flux de travail des devoirs |
| `chat/` | DockedChat, messages de chat | Chat en temps réel et tuteur IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Navigateur et gestion de fichiers |
| `installer/` | Step1-Step7, EmailSettings | Assistant d'installation |
| `social/` | GroupInfoCard, publications sociales | Fonctionnalités de réseau social |
| `attendance/` | AttendanceTable | Suivi de la présence |
| `usergroup/` | GroupMembers | Gestion des groupes d'utilisateurs |

---
## Système d'icônes

Les icônes utilisent **Material Design Icons (MDI)** comme seule bibliothèque d'icônes : `<i class="mdi mdi-pencil"></i>`

Le fichier `ChamiloIcons.js` fournit un mappage sémantique :

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Les composants utilisent `BaseIcon` ou font référence à `chamiloIconToClass` pour afficher les icônes de manière cohérente.

Une référence consultable de toutes les icônes disponibles sur la plateforme peut être trouvée à l'adresse `/admin/list-icons` dans toute instance de Chamilo en cours d'exécution.

## Modèles de composants

* **Composition API** — Les composants utilisent la syntaxe `<script setup>` de Vue 3
* **Intégration de PrimeVue** — Utilisation intensive des composants PrimeVue (Button, DataTable, Dialog, Menu, etc.)
* **Axios pour les appels API** — Requêtes HTTP vers l'API backend
* **Vue I18n** — Tout le texte visible par l'utilisateur utilise des clés de traduction