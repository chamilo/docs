# Paramètres de l'éditeur

Configuration de l'éditeur de texte enrichi (TinyMCE) utilisé sur l'ensemble de la plateforme — barres d'outils, plugins, assistants IA dans l'éditeur.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Éditeur**. Cette catégorie contient **26 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_email_editor`

**Éditeur de courriel en ligne activé**

Si cette option est activée, cliquer sur une adresse e-mail ouvrira un éditeur en ligne.

### `allow_spellcheck`

**Vérification orthographique**

Activer la vérification orthographique

### `block_copy_paste_for_students`

**Bloquer le copier-coller pour les apprenants**

Empêcher les apprenants de copier et coller dans l'éditeur WYSIWYG

### `editor_block_image_copy_paste`

**Empêcher le copier-coller d'images dans l'éditeur WYSIWYG**

Empêcher l'utilisation du copier-coller d'images sous forme de base64 dans l'éditeur pour éviter de remplir la base de données avec des images.

*Par défaut : `false`*

### `editor_driver_list`

**Liste des pilotes de fichiers WYSIWYG**

Tableau contenant les noms des pilotes pour l'accès aux fichiers depuis l'éditeur WYSIWYG.

### `editor_settings`

**Paramètres de l'éditeur WYSIWYG**

Tableau de configuration générique pour reconfigurer globalement l'éditeur WYSIWYG.

### `enable_iframe_inclusion`

**Autoriser les iframes dans l'éditeur HTML**

Autoriser des iframes arbitraires dans l'éditeur HTML améliorera les capacités d'édition des utilisateurs, mais cela peut représenter un risque de sécurité. Assurez-vous de pouvoir faire confiance à vos utilisateurs (c'est-à-dire que vous savez qui ils sont) avant d'activer cette fonctionnalité.

### `enable_uploadimage_editor`

**Autoriser le glisser-déposer d'images dans l'éditeur WYSIWYG**

Activer le téléversement d'images en tant que fichier lors d'une copie dans le contenu ou d'un glisser-déposer.

*Par défaut : `false`*

### `enabled_asciisvg`

**Activer AsciiSVG**

Activer le plugin AsciiSVG dans l'éditeur WYSIWYG pour dessiner des graphiques à partir de fonctions mathématiques.

### `enabled_googlemaps`

**Activer Google Maps**

Activer le bouton pour insérer des cartes Google Maps. L'activation n'est pas pleinement réalisée si le fichier main/inc/lib/fckeditor/myconfig.php n'a pas été préalablement modifié et qu'une clé API Google Maps n'a pas été ajoutée.

### `enabled_imgmap`

**Activer les cartes d'image**

Activer le bouton pour insérer des cartes d'image. Cela permet d'associer des URL à des zones d'une image, créant des points d'accès.

### `enabled_insertHtml`

**Autoriser l'insertion de widgets**

Cela vous permet d'intégrer sur vos pages web vos vidéos et applications préférées telles que Vimeo ou Slideshare, ainsi que toutes sortes de widgets et gadgets.

### `enabled_mathjax`

**Activer MathJax**

Activer la bibliothèque MathJax pour visualiser des formules mathématiques. Cela n'est utile que si les paramètres ASCIIMathML ou ASCIISVG sont activés.

### `enabled_support_svg`

**Créer et modifier des fichiers SVG**

Cette option vous permet de créer et de modifier des fichiers SVG (Scalable Vector Graphics) multicouches en ligne, ainsi que de les exporter sous forme d'images au format PNG.

### `enabled_wiris`

**Éditeur mathématique WIRIS**

Activer l'éditeur mathématique WIRIS. En installant ce plugin, vous obtenez l'éditeur WIRIS et WIRIS CAS.<br/>Cette activation n'est pas pleinement réalisée tant que le <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP pour CKeditor WIRIS</a> n'a pas été préalablement téléchargé et décompressé dans le répertoire de Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Cela est nécessaire car Wiris est un logiciel propriétaire et ses services sont <a href='http://www.wiris.com/store/who-pays' target='_blank'>commerciaux</a>. Pour apporter des ajustements au plugin, modifiez le fichier configuration.ini ou remplacez son contenu par le fichier configuration.ini.default fourni avec Chamilo.

### `force_wiki_paste_as_plain_text`

**Forcer le collage en texte brut dans le wiki**

Cela empêchera de nombreux tags cachés, incorrects ou non standard, copiés depuis d'autres textes, de corrompre le texte du Wiki après de nombreux problèmes ; mais cela entraînera la perte de certaines fonctionnalités lors de l'édition.

### `full_editor_toolbar_set`

**Barre d'outils complète de l'éditeur WYSIWYG**

Afficher la barre d'outils complète dans toutes les zones d'édition WYSIWYG de la plateforme.

*Par défaut : `false`*

### `htmlpurifier_wiki`

**HTMLPurifier dans le Wiki**

Activer HTML Purifier dans l'outil wiki (cela augmentera la sécurité mais réduira les fonctionnalités de style)

### `include_asciimathml_script`

**Charger la bibliothèque MathJax sur toutes les pages du système**

Activez ce paramètre si vous souhaitez afficher des formules mathématiques basées sur MathML et des graphiques mathématiques basés sur ASCIIsvg non seulement dans l'outil 'Documents', mais également ailleurs dans le système.

### `math_asciimathML`

**Éditeur mathématique ASCIIMathML**

Activer l'éditeur mathématique ASCIIMathML

### `more_buttons_maximized_mode`

**Barre de boutons étendue**

Activer les barres de boutons étendues lorsque l'éditeur WYSIWYG est maximisé

*Par défaut : `true`*

### `save_titles_as_html`

**Enregistrer les titres en HTML**

Permettre aux utilisateurs d'inclure du HTML dans les champs de titre à plusieurs endroits. Cela permet un certain style des titres, notamment dans les questions de test.

*Par défaut : `false`*

### `translate_html`

**Supporter le contenu HTML multilingue**

Si activée, cette option permet aux utilisateurs d'utiliser un attribut 'lang' dans les éléments HTML pour définir la langue dans laquelle le contenu de cet élément est écrit. Activez plusieurs éléments avec différents attributs 'lang' et Chamilo affichera le contenu uniquement dans la langue de l'utilisateur.

*Par défaut : `false`*

### `video_context_menu_hidden`

**Masquer le menu contextuel sur le lecteur vidéo**

Lorsque activé, le menu contextuel accessible par clic droit sur les lecteurs vidéo HTML5 est désactivé.

*Par défaut : `false`*

### `video_player_renderers`

**Rendu des lecteurs vidéo**

Activer les rendus de lecteurs pour les médias YouTube, Vimeo, Facebook, DailyMotion, Twitch

### `youtube_for_students`

**Autoriser les apprenants à insérer des vidéos YouTube**

Activer la possibilité pour les apprenants d'insérer des vidéos YouTube