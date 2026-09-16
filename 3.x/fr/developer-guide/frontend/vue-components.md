# Composants Vue

Chamilo dispose d’un large ensemble de composants Vue organisés par domaine fonctionnel dans `assets/vue/components/`.

## Composants de base

La famille `Base*` dans `assets/vue/components/basecomponents/` encapsule les primitives PrimeVue avec des valeurs par défaut propres à Chamilo (mise en page FloatLabel, icônes MDI via `chamiloIconToClass`, messages de validation cohérents, dimensionnement Tailwind). Utilisez toujours un composant `Base*` avant d’importer le composant PrimeVue sous-jacent — c’est ainsi que l’interface reste cohérente dans toute la SPA et que les évolutions de design peuvent être déployées depuis un seul endroit.

Les composants **ne sont pas** enregistrés globalement (la seule primitive PrimeVue enregistrée globalement est `Column`, utilisée dans `BaseTable`). Importez chacun d’eux explicitement :

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Champs de formulaire

La plupart acceptent la valeur via `v-model`, exposent les props `id` + `label` pour l’accessibilité et la liaison de l’étiquette flottante, et font remonter la validation par une paire `isInvalid` / `errorText` (ou `messageText`).

| Composant                        | Encapsule                                            | Usage                                                                                                                                                                                              |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Saisie de texte sur une seule ligne. Passe à une étiquette statique pour les champs `date`/`time`/`datetime-local` (où l’étiquette flottante se superposerait au placeholder natif).               |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adaptateur Vuelidate léger : transmet `$error` à `isInvalid` et affiche `$errors[].$message` dans le slot `errors`. À associer à un objet de champ Vuelidate.                                      |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Saisie de texte multiligne.                                                                                                                                                                        |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Même schéma d’adaptateur Vuelidate que `BaseInputTextWithVuelidate`.                                                                                                                               |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Saisie numérique avec `min` / `max` / `step` et boutons incrémentaux.                                                                                                                              |
| `BaseInputTags.vue`              | (custom)                                             | Puces de tags en saisie libre ; les tags sont ajoutés à l’entrée/virgule et retirés avec la touche retour arrière.                                                                                 |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Champ texte associé à un bouton d’action (style recherche).                                                                                                                                        |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Case à cocher binaire ou liée à une valeur, avec étiquette.                                                                                                                                        |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Groupe de boutons radio piloté par un tableau `options: [{label, value}]`.                                                                                                                         |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Bouton à deux états (étiquettes et icônes on / off) lié via `v-model`.                                                                                                                             |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Sélecteur de date / date-heure. Respecte `platform.timepicker_increment` et la locale de l’utilisateur via `calendarLocales`.                                                                      |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Sélecteur de couleur avec repli hexadécimal ; utilise `colorjs.io` pour valider la saisie hexadécimale manuelle.                                                                                   |
| `BaseRating.vue`                 | `Rating`                                             | Saisie de note par étoiles.                                                                                                                                                                        |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Sélecteur de fichier unique qui déclenche un bouton de type pièce jointe.                                                                                                                          |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Variante multi-fichiers de `BaseFileUpload`.                                                                                                                                                       |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Uploader Uppy complet (webcam, audio, éditeur d’image, envoi XHR) avec locales reliées à `appLocale` courant. À utiliser pour les envois riches avec progression ; utiliser `BaseFileUpload*` pour les pièces jointes simples. |

### Sélection et autocomplétion

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Liste déroulante à choix unique avec bouton d’effacement optionnel.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Liste déroulante à choix multiples affichant les éléments sélectionnés sous forme de puces.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Liste déroulante à choix unique avec champ de recherche intégré, défilement virtuel optionnel et modèle d’option sur deux lignes (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Autocomplétion asynchrone (minimum 3 caractères). Prend en charge la sélection unique ou multiple et un slot `chip` pour personnaliser les puces.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Tableau paginé de recherche d’utilisateurs avec sélection de lignes. À utiliser lorsqu’une fonctionnalité nécessite un sélecteur d’utilisateurs de type administrateur.                           |

### Boutons et actions

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Bouton Chamilo standard. Résout les icônes via `chamiloIconToClass`, normalise `type` vers `severity`/`variant` de PrimeVue, affiche un `BaseAppLink` interne lorsqu’une `route` ou `toUrl` est fournie (ainsi le même composant gère les cas router-link, ancre et bouton simple). Les valeurs de `type` acceptées sont listées dans `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Bouton de révélation qui bascule un panneau « paramètres avancés » inséré par slot via `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Barre d’actions avec les slots `start` / `end` (ou un seul slot par défaut). `showTopBorder` optionnel pour le style de séparateur.                                                                                                                                                                                                                                       |

### Affichage et données

| Composant            | Encapsule                   | Objectif                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Tableau de données standard de Chamilo. Prend en charge le mode côté serveur (`lazy`), le tri multi-colonnes, le filtre global, la sélection de lignes et la pagination. Passez les colonnes en enfants `<Column>` (enregistrés globalement). |
| `BaseCard.vue`       | `Card`                      | Enveloppe de carte qui transmet les slots `header`, `title`, `subtitle`, `footer` et le slot par défaut (contenu).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Préréglage de diagramme circulaire. Passez un objet `data` compatible Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Puce rendue à partir d’un objet `{value, labelField, imageField}`, avec bouton de suppression optionnel.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Étiquette colorée. Fait correspondre le `warning` de Chamilo au `warn` de PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Rangée d’avatars avec compteur de dépassement (p. ex. « +3 ») ; pilotée par `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar utilisateur avec image de repli, état de chargement et libellé accessible.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Rendu d’icône Chamilo. Ajoute un badge optionnel (texte ou icône), une infobulle et un modificateur de taille. Passez toujours un nom sémantique Chamilo (p. ex. `"edit"`), et non une classe MDI brute.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Champ de recherche avec une icône de loupe en tête.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Séparateur horizontal ou vertical, avec titre et alignement optionnels.                                                                                                                              |

### Navigation et menus

| Composant                  | Encapsule               | Objectif                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu contextuel (popup) qui interprète les routes du routeur dans les éléments `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Déclencheur de menu déroulant léger avec coordination d’ouverture unique (ouvrir l’un ferme les autres).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Menu contextuel au clic droit / positionné, contrôlé par `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu de navigation en accordéon utilisé dans les barres latérales ; suit automatiquement les clés développées à partir du modèle.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Barre d’onglets où chaque onglet est un lien de routeur. L’onglet actif est mis en surbrillance automatiquement selon la route courante.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Lien intelligent : rend un `<a>` lorsque `url` est défini (externe/héritage), sinon un `<RouterLink>` Vue Router. Utilisez-le à la place de l’un ou l’autre primitive afin que les liens internes/externes restent uniformes. |

### Dialogs

`BaseDialog` est la fondation ; les autres s’y composent pour les flux courants de confirmation/annulation et de suppression.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Boîte de dialogue modale avec un en-tête titré (`headerIcon` optionnel) et un corps/pied de page en slots. L’état d’ouverture est un `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modale de confirmation/annulation avec deux boutons. `type` de confirmation (sévérité) et `icon` configurables ; émet `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modale prédéfinie « Êtes-vous sûr de vouloir supprimer cet élément ? » avec un bouton de confirmation au style danger.                                   |

### Editor & rich content

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Éditeur de texte enrichi avec `FloatLabel`, suivi des états focus/vide, et intégration au contexte de cours courant (`cidReq`). À utiliser pour tout champ HTML rédigé par l’utilisateur. |

### Helpers

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Associe des noms d’icônes sémantiques (`edit`, `delete`, `eye-on`, `courses`, …) à des classes CSS MDI. ~127 entrées. Parcourez-les sur `/admin/list-icons` d’une instance en cours d’exécution.                                                                                                  |
| `validators.js`   | Validateurs de props partagés : `iconValidator` (doit être un nom d’icône Chamilo connu), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (types `BaseButton` autorisés). Importez-les lors de la définition de nouveaux composants `Base*` qui reprennent ces conventions. |

### Conventions across Base components

* **v-model via `defineModel()`** — la valeur (et souvent `isVisible`, `filters`, `selectedItems`) est exposée comme modèle ; passez-les avec `v-model[:name]` plutôt que `:prop` + `@update:prop`.
* **Floating labels** — la plupart des champs de formulaire encapsulent leur saisie dans PrimeVue `FloatLabel variant="on"`. Fournissez `label` (le texte affiché) et `id` (utilisé pour lier le `<label for>`).
* **Validation messages** — les champs exposent `isInvalid` et un petit message sous la saisie (`errorText`, `messageText` ou `smallText` selon le composant). Des variantes conscientes de Vuelidate existent pour les plus courantes.
* **Icons** — passez des noms sémantiques Chamilo, pas des classes MDI brutes. Les composants les résolvent via `chamiloIconToClass`.
* **Sizing** — `size="normal" | "small" | "large"` est la prop de dimensionnement conventionnelle (voir `sizeValidator`).
* **Composition over duplication** — `BaseDialogDelete` encapsule `BaseDialogConfirmCancel`, qui encapsule `BaseDialog` ; `BaseToggleButton` et `BaseAdvancedSettingsButton` encapsulent `BaseButton`. Lorsque vous avez besoin d’une variante récurrente d’un composant existant, préférez composer un nouveau `Base*` par-dessus plutôt que de le réimplémenter dans un dossier de fonctionnalité.

## Layout Components

Situés dans `components/layout/` :

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Disposition principale : barre supérieure + barre latérale + zone de contenu |
| `Sidebar.vue` | Panneau de navigation gauche (repliable) |
| `TopbarLoggedIn.vue` | Barre supérieure avec logo, boîte de réception, avatar |

## Composants par domaine fonctionnel

| Répertoire | Composants | Objectif |
|-----------|-----------|---------|
| `course/` | Cartes de cours, filtres de catalogue, formulaires de cours | Liste et gestion des cours |
| `session/` | Cartes de session, catalogue | Liste des sessions |
| `assignments/` | Listes de rendus, fenêtres modales de notation, formulaires | Flux de travail des devoirs |
| `chat/` | DockedChat, messages de chat | Chat en temps réel et tuteur IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Explorateur et gestion de fichiers |
| `installer/` | Step1-Step7, EmailSettings | Assistant d’installation |
| `social/` | GroupInfoCard, publications sociales | Fonctionnalités de réseau social |
| `attendance/` | AttendanceTable | Suivi des présences |
| `usergroup/` | GroupMembers | Gestion des groupes d’utilisateurs |

## Système d’icônes

Les icônes utilisent **Material Design Icons (MDI)** comme seule bibliothèque d’icônes : `<i class="mdi mdi-pencil"></i>`

Le fichier `ChamiloIcons.js` fournit une correspondance sémantique :

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Les composants utilisent `BaseIcon` ou se réfèrent à `chamiloIconToClass` pour afficher les icônes de manière cohérente.

Une référence consultable de toutes les icônes disponibles sur la plateforme se trouve à `/admin/list-icons` dans toute instance Chamilo en cours d’exécution.

## Modèles de composants

* **Composition API** — Les composants utilisent la syntaxe `<script setup>` de Vue 3
* **Intégration PrimeVue** — Utilisation intensive des composants PrimeVue (Button, DataTable, Dialog, Menu, etc.)
* **Axios pour les appels API** — Requêtes HTTP vers l’API du backend
* **Vue I18n** — Tous les textes destinés à l’utilisateur utilisent des clés de traduction