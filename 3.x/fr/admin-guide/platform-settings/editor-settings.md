# Paramètres de l'éditeur

Configuration de l'éditeur de texte enrichi (TinyMCE) utilisé sur l'ensemble de la plateforme — barres d'outils, plugins, assistants d'IA dans l'éditeur.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Éditeur**. Cette catégorie contient **29 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_email_editor`

**Éditeur de courriel en ligne activé**

Si cette option est activée, cliquer sur une adresse de courriel ouvrira un éditeur en ligne.

### `allow_spellcheck`

**Vérification orthographique**

Activer la vérification orthographique

### `block_copy_paste_for_students`

**Bloquer le copier-coller des apprenants**

Empêcher les apprenants de copier et coller dans l'éditeur WYSIWYG

### `editor_block_image_copy_paste`

**Empêcher le copier-coller d'images dans l'éditeur WYSIWYG**

Empêcher l'utilisation du copier-coller d'images en base64 dans l'éditeur afin d'éviter de remplir la base de données avec des images.

*Valeur par défaut : `false`*


### `editor_driver_list`

**Liste des pilotes de fichiers WYSIWYG**

Tableau contenant les noms des pilotes pour l'accès aux fichiers depuis l'éditeur WYSIWYG.

### `editor_settings`

**Paramètres de l'éditeur WYSIWYG**

Tableau de configuration générique permettant de reconfigurer l'éditeur WYSIWYG de manière globale.

### `enable_iframe_inclusion`

**Autoriser les iframes dans l'éditeur HTML**

Autoriser des iframes arbitraires dans l'éditeur HTML améliorera les capacités d'édition des utilisateurs, mais cela peut représenter un risque de sécurité. Veuillez vous assurer que vous pouvez faire confiance à vos utilisateurs (c'est-à-dire que vous savez qui ils sont) avant d'activer cette fonctionnalité.

### `enable_uploadimage_editor`

**Autoriser le glisser-déposer d'images dans l'éditeur WYSIWYG**

Activer le téléversement d'images sous forme de fichier lors d'une copie dans le contenu ou d'un glisser-déposer.

*Valeur par défaut : `false`*


### `enabled_asciisvg`

**Activer AsciiSVG**

Activer le plugin AsciiSVG dans l'éditeur WYSIWYG pour tracer des graphiques à partir de fonctions mathématiques.

### `enabled_googlemaps`

**Activer Google Maps**

Activer le bouton permettant d'insérer Google Maps. L'activation n'est pas pleinement effective si le fichier main/inc/lib/fckeditor/myconfig.php n'a pas été préalablement modifié et qu'une clé d'API Google Maps n'y a pas été ajoutée.

### `enabled_imgmap`

**Activer les cartes d'image**

Activer le bouton permettant d'insérer des cartes d'image. Cela vous permet d'associer des URL à des zones d'une image, créant ainsi des zones cliquables.

### `enabled_insertHtml`

**Autoriser l'insertion de widgets**

Cela vous permet d'intégrer dans vos pages web vos vidéos et applications favorites, telles que vimeo ou slideshare, ainsi que toutes sortes de widgets et de gadgets

### `enabled_mathjax`

**Activer MathJax**

Activer la bibliothèque MathJax pour visualiser des formules mathématiques. Cela ajoute un bouton de formule à la barre d'outils de l'éditeur, où les formules sont rédigées en LaTeX. Voir [Formules mathématiques](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Créer et modifier des fichiers SVG**

Cette option vous permet de créer et de modifier en ligne des fichiers SVG (Scalable Vector Graphics) multicouches, ainsi que de les exporter au format d'image png.

### `enabled_wiris`

**Éditeur mathématique WIRIS**

Activer l'éditeur mathématique WIRIS. En installant ce plugin, vous obtenez l'éditeur WIRIS et WIRIS CAS.<br/>Cette activation n'est pas pleinement effective tant que le <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP pour CKeditor WIRIS</a> n'a pas été préalablement téléchargé et que son contenu n'a pas été décompressé dans le répertoire de Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Cela est nécessaire car Wiris est un logiciel propriétaire et ses services sont <a href='http://www.wiris.com/store/who-pays' target='_blank'>commerciaux</a>. Pour ajuster le plugin, modifiez le fichier configuration.ini ou remplacez son contenu par le fichier configuration.ini.default livré avec Chamilo.

### `etherpad_api_key`

**Clé d'API Etherpad**

Identifiant d'API côté serveur utilisé pour créer le pad et les sessions de l'éditeur. Traitez-le comme un secret ; ne le partagez pas dans des tickets ni dans des captures d'écran de documentation.

*Valeur par défaut : vide*

### `etherpad_enabled`

**Activer Etherpad pour l'édition du Wiki**

Lorsqu'il est activé et correctement configuré, le formulaire d'édition d'une page Wiki existante charge l'éditeur collaboratif Etherpad. L'enregistrement crée une révision Wiki normale à partir de son contenu actuel.

*Valeur par défaut : `false`*

### `etherpad_url`

**URL Etherpad**

URL de base du serveur Etherpad utilisée pour ouvrir l'éditeur Wiki partagé. Pour des sessions intégrées sécurisées, exposez Etherpad sur **la même origine que Chamilo**, par exemple derrière un reverse proxy à `https://campus.example.org/etherpad`. N'intégrez pas un serveur d'origine croisée sans rapport.

*Valeur par défaut : vide*

### `force_wiki_paste_as_plain_text`

**Forcer le collage en texte brut dans le wiki**

Cela empêchera de nombreuses balises cachées, incorrectes ou non standard, copiées depuis d'autres textes, de corrompre le texte du wiki après de nombreux problèmes ; mais certaines fonctionnalités seront perdues lors de l'édition.

### `full_editor_toolbar_set`

**Barre d'outils complète de l'éditeur WYSIWYG**

Afficher la barre d'outils complète dans toutes les zones de l'éditeur WYSIWYG de la plateforme.

*Valeur par défaut : `false`*


### `htmlpurifier_wiki`

**HTMLPurifier dans le wiki**

Activer le purificateur HTML dans l'outil wiki (renforcera la sécurité, mais réduira les fonctionnalités de style)

### `include_asciimathml_script`

**Charger la bibliothèque Mathjax dans toutes les pages du système**

Activez ce paramètre si vous souhaitez afficher les formules mathématiques basées sur MathML et les graphiques mathématiques basés sur ASCIIsvg non seulement dans l'outil « Documents », mais aussi ailleurs dans le système.

### `math_asciimathML`

**Éditeur mathématique ASCIIMathML**

Activer l'éditeur mathématique ASCIIMathML

### `more_buttons_maximized_mode`

**Barre de boutons étendue**

Activer les barres de boutons étendues lorsque l'éditeur WYSIWYG est maximisé

*Valeur par défaut : `true`*

### `save_titles_as_html`

**Enregistrer les titres en HTML**

Autoriser les utilisateurs à inclure du HTML dans les champs de titre à plusieurs endroits. Cela permet une certaine mise en forme des titres, notamment dans les questions de test. Cela permet également à ces champs de titre spécifiques d'utiliser le même balisage par langue que `translate_html` ci-dessous, ce que les titres en texte brut ne peuvent pas contenir autrement.

*Valeur par défaut : `false`*

### `translate_html`

**Prise en charge du contenu HTML multilingue**

Si cette option est activée, elle permet aux utilisateurs d'utiliser un attribut « lang » dans les éléments HTML pour définir la langue dans laquelle le contenu de cet élément est rédigé. Activez plusieurs éléments avec des attributs « lang » différents et Chamilo affichera uniquement le contenu dans la langue de l'utilisateur.

*Valeur par défaut : `false`*

Voir [Contenu multilingue](../../teacher-guide/adding-content/multi-language-content.md) dans le Guide de l'enseignant pour la présentation complète de cette fonctionnalité destinée aux enseignants.


### `video_context_menu_hidden`

**Masquer le menu contextuel du lecteur vidéo**

Lorsque cette option est activée, le menu contextuel du clic droit sur les lecteurs vidéo HTML5 est désactivé.

*Valeur par défaut : `false`*


### `video_player_renderers`

**Moteurs de rendu du lecteur vidéo**

Activer les moteurs de rendu du lecteur pour les médias YouTube, Vimeo, Facebook, DailyMotion et Twitch

### `youtube_for_students`

**Autoriser les apprenants à insérer des vidéos YouTube**

Activer la possibilité pour les apprenants d'insérer des vidéos YouTube