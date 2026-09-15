# Thèmes de couleurs

Chamilo 3.0 utilise un système de thèmes de couleurs piloté par la base de données. Les thèmes sont gérés via l’interface d’administration, stockés en base de données et écrits sur disque sous forme de fichiers CSS. Ils peuvent être personnalisés par URL d’accès, ce qui permet aux installations multi-URL d’avoir des identités visuelles distinctes.

## Modèle de données

Deux entités pilotent le système de thèmes :

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Clé primaire |
| `title` | string | Nom lisible par un humain |
| `slug` | string | Généré automatiquement à partir de `title` (par ex. `"My Theme"` → `my-theme`) ; utilisé comme nom de répertoire dans `var/themes/` |
| `variables` | array (JSON) | Correspondance nom de propriété CSS personnalisée → valeur (par ex. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Associe un `ColorTheme` à une `AccessUrl`. Le booléen `active` indique quel thème est actuellement actif pour cette URL. Un seul thème peut être actif à la fois par URL d’accès.

## Stockage des thèmes

Lorsqu’un thème est créé ou mis à jour via l’API, `ColorThemeStateProcessor` génère le fichier CSS et l’écrit dans le Flysystem `themes_filesystem` (adossé à `var/themes/`) :

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Le fichier `colors.css` généré enveloppe toutes les variables dans un bloc `:root` :

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Les valeurs sont des triplets de canaux RGB séparés par des espaces (et non `rgb()`), ce qui permet à Tailwind de composer des variantes d’opacité telles que `bg-primary/50` sans configuration supplémentaire.

## Ordre de résolution des thèmes

`ThemeHelper::getVisualTheme()` détermine le slug de thème à appliquer sur une page donnée, dans cet ordre :

1. **Thème actif pour l’AccessUrl courante** — l’enregistrement `AccessUrlRelColorTheme` avec `active = true`
2. **Thème choisi par l’utilisateur** — le thème stocké sur l’entité `User`, si le paramètre de plateforme `profile.user_selected_theme` est activé
3. **Thème de cours** — le paramètre de cours `course_theme`, si le paramètre de plateforme `course.allow_course_theme` est activé
4. **Thème de parcours d’apprentissage** — la valeur `$lp_theme_css` du LP, si le paramètre de cours `allow_learning_path_theme` est activé
5. **Variable d’environnement `THEME_FALLBACK`** — définie dans `.env` comme `THEME_FALLBACK='chamilo'`
6. **Valeur par défaut** — `chamilo` (codé en dur comme `ThemeHelper::DEFAULT_THEME`)

## Diffusion des ressources

Les ressources des thèmes sont servies par `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) sous le préfixe `/themes`.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Servir n’importe quelle ressource de thème (CSS, JS, images) ; repli sur le thème `chamilo` si le fichier est introuvable dans le thème demandé |
| `GET /themes/{slug}/logo/{type}` | Servir le logo préféré (`header` ou `email`), avec repli SVG → PNG |
| `POST /themes/{slug}/logos` | Téléverser les logos d’en-tête/e-mail (SVG et/ou PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Supprimer un logo spécifique |

La route générale des ressources (`/{name}/{path}`) se rabat automatiquement sur le thème par défaut `chamilo` lorsqu’un fichier est absent du thème demandé, de sorte que les thèmes n’ont à inclure que les fichiers qu’ils surchargent réellement.

## Chargement des thèmes dans les modèles

Le modèle de mise en page `head.html.twig` charge les ressources du thème actif via des fonctions d’aide Twig :

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Les trois fonctions Twig (enregistrées dans `ChamiloExtension`) résolvent le chemin de la ressource via `ThemeHelper`, en appliquant la même chaîne de repli que ci-dessus :

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL de la ressource dans le thème résolu |
| `theme_asset_link_tag('path')` | Balise complète `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Balise complète `<script src="...">` |
| `theme_asset_base64('path')` | URI de données encodée en Base64 de la ressource |
| `theme_logo('header'\|'email')` | URL du meilleur logo disponible |

## Points de terminaison API

La gestion des thèmes est exposée via l’API REST API Platform (réservée aux administrateurs) :

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Créer un nouveau thème |
| `PUT` | `/api/color_themes/{id}` | Mettre à jour un thème existant |
| `POST` | `/api/access_url_rel_color_themes` | Associer/activer un thème pour une URL d’accès |
| `GET` | `/api/access_url_rel_color_themes` | Lister les associations de thèmes pour l’URL d’accès courante |

## Création d’un thème personnalisé

Le flux de travail standard passe par l’interface d’administration (**Admin → Color Themes**), qui appelle les points de terminaison d’API ci-dessus. Pour créer un thème de manière programmatique :

1. `POST /api/color_themes` avec un corps JSON :

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Cela persiste l’entité et écrit `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` pour l’associer et l’activer pour l’URL d’accès courante :

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Pour ajouter des images personnalisées (logo, favicon, arrière-plans), téléversez-les via `POST /themes/{slug}/logos` ou placez-les directement dans `var/themes/{slug}/images/`.

## Référence des variables de couleur

Toutes les variables attendues par la configuration Tailwind par défaut :

| Variable | Rôle |
|----------|---------|
| `--color-primary-base` | Couleur de marque principale |
| `--color-primary-gradient` | Arrêt de dégradé plus sombre pour le primaire |
| `--color-primary-button-text` | Couleur du texte sur les boutons primaires |
| `--color-primary-button-alternative-text` | Couleur de texte alternative sur les boutons primaires |
| `--color-secondary-base` | Couleur d’accent secondaire |
| `--color-secondary-gradient` | Arrêt de dégradé pour le secondaire |
| `--color-secondary-button-text` | Couleur du texte sur les boutons secondaires |
| `--color-tertiary-base` | Couleur tertiaire |
| `--color-tertiary-gradient` | Arrêt de dégradé pour le tertiaire |
| `--color-tertiary-button-text` | Couleur du texte sur les boutons tertiaires |
| `--color-success-base` | Couleur d’état de succès |
| `--color-success-gradient` | Arrêt de dégradé pour le succès |
| `--color-success-button-text` | Couleur du texte sur les boutons de succès |
| `--color-info-base` | Couleur d’état d’information |
| `--color-info-gradient` | Arrêt de dégradé pour l’information |
| `--color-info-button-text` | Couleur du texte sur les boutons d’information |
| `--color-warning-base` | Couleur d’état d’avertissement |
| `--color-warning-gradient` | Arrêt de dégradé pour l’avertissement |
| `--color-warning-button-text` | Couleur du texte sur les boutons d’avertissement |
| `--color-danger-base` | Couleur d’état de danger/erreur |
| `--color-danger-gradient` | Arrêt de dégradé pour le danger |
| `--color-danger-button-text` | Couleur du texte sur les boutons de danger |
| `--color-form-base` | Couleur d’accent des éléments de formulaire |