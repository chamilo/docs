# Paramètres des documents

Comportement de l'outil **Documents** du cours — téléversements, extensions autorisées, partage et modèles.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Documents**. Cette catégorie contient **30 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `access_url_specific_files`

**Activer les fichiers spécifiques à l'URL**

Lorsque cette fonctionnalité est activée dans une configuration multi-URL, vous pouvez vous rendre sur l'URL principale et fournir des versions spécifiques à l'URL de n'importe quel fichier (dans l'outil documents). Le fichier d'origine sera remplacé par l'alternative chaque fois qu'il est consulté depuis une URL différente. Cela vous permet de personnaliser davantage chaque URL, tout en bénéficiant de l'avantage de réutiliser les mêmes cours à de nombreuses reprises.

*Valeur par défaut : `false`*

### `default_document_quotum`

**Espace disque par défaut**

Quel est l'espace disque disponible pour un cours ? Vous pouvez remplacer le quota d'un cours spécifique via : administration de la plateforme > Cours > modifier

*Valeur par défaut : `1000`*


### `default_group_quotum`

**Espace disque disponible pour le groupe**

Quel est l'espace disque par défaut disponible pour l'outil documents d'un groupe ?

*Valeur par défaut : `250`*


### `document_default_visibility_can_be_modified_in_course` **v3**

**La visibilité par défaut des nouveaux documents peut être modifiée par cours**

Lorsque cette option est activée, les enseignants peuvent choisir dans les paramètres du cours la visibilité attribuée aux nouveaux documents de leur cours, au lieu de la valeur par défaut de la plateforme.

*Valeur par défaut : `false`*

Lorsque cette option est activée, une option **Visibilité par défaut des nouveaux documents** apparaît dans la section **Documents** des paramètres du cours. Un cours qui n'a pas choisi de valeur utilise `document_default_visibility_on_creation`.

### `document_default_visibility_on_creation` **v3**

**Visibilité par défaut des nouveaux documents**

Visibilité attribuée à un nouveau document, dossier ou fichier téléversé lorsqu'un enseignant le crée dans un cours. Les enseignants peuvent toujours modifier ensuite la visibilité de chacun d'eux.

*Valeur par défaut : `visible`*

### `documents_custom_cloud_link_list`

**Définir une liste stricte d'hôtes pour les liens cloud**

L'outil documents peut intégrer des liens vers des fichiers dans le cloud. La liste des services cloud est limitée à une liste codée en dur, mais vous pouvez définir le tableau « links » qui contiendra une liste de vos propres services/URL. La liste définie ici remplacera la liste par défaut.

### `documents_hide_download_icon`

**Masquer l'icône de téléchargement des documents**

Dans l'outil documents, masquer l'icône de téléchargement pour les utilisateurs.

*Valeur par défaut : `false`*


### `enable_x_sendfile_headers`

**Activer les en-têtes X-sendfile**

Activez cette option si X-sendfile est activé au niveau du serveur web et que vous souhaitez ajouter les en-têtes requis pour que les navigateurs les prennent en compte.

*Valeur par défaut : `false`*

### `group_category_document_access`

**Activer les options de partage pour les documents au sein d'une catégorie de groupes**

Lorsque cette option est activée, les administrateurs peuvent définir l'accès aux documents et les autorisations de partage pour les groupes de documents par catégorie.

*Valeur par défaut : `false`*


### `group_document_access`

**Activer les options de partage pour les documents de groupe**

Lorsque cette option est activée, le partage des documents et les autorisations d'accès peuvent être configurés au niveau du groupe.

*Valeur par défaut : `false`*


### `pdf_export_watermark_by_course`

**Activer la définition du filigrane par cours**

Lorsque cette option est activée, les enseignants peuvent définir leur propre filigrane pour les documents de leurs cours.

*Valeur par défaut : `false`*


### `pdf_export_watermark_enable`

**Activer le filigrane dans l'exportation PDF**

En activant cette option, vous pouvez téléverser une image ou un texte qui sera automatiquement ajouté comme filigrane à toutes les exportations PDF de documents sur le système.

*Valeur par défaut : `false`*

### `pdf_export_watermark_text`

**Texte du filigrane PDF**

Ce texte sera ajouté comme filigrane aux exportations de documents au format PDF.

### `permanently_remove_deleted_files`

**Les fichiers supprimés ne peuvent pas être restaurés**

La suppression d'un fichier dans l'outil documents le supprime définitivement. Le fichier ne peut pas être restauré

*Valeur par défaut : `false`*

### `permissions_for_new_directories`

**Autorisations des nouveaux répertoires**

La possibilité de définir les paramètres d'autorisations à attribuer à chaque répertoire nouvellement créé vous permet d'améliorer la sécurité contre les attaques de pirates téléversant du contenu dangereux sur votre portail. Le paramètre par défaut (0770) devrait suffire à offrir à votre serveur un niveau de protection raisonnable. Le format indiqué utilise la terminologie UNIX Propriétaire-Groupe-Autres avec les autorisations Lecture-Écriture-Exécution.

*Valeur par défaut : `0770`*

### `permissions_for_new_files`

**Autorisations des nouveaux fichiers**

La possibilité de définir les paramètres d'autorisations à attribuer à chaque fichier nouvellement créé vous permet d'améliorer la sécurité contre les attaques de pirates téléversant du contenu dangereux sur votre portail. Le paramètre par défaut (0550) devrait suffire à offrir à votre serveur un niveau de protection raisonnable. Le format indiqué utilise la terminologie UNIX Propriétaire-Groupe-Autres avec les autorisations Lecture-Écriture-Exécution. Si vous utilisez Oogie, veillez à ce que l'utilisateur qui lance LibreOffice puisse écrire des fichiers dans le dossier du cours.

*Par défaut : `0660`*


### `send_notification_when_document_added`

**Envoyer une notification aux étudiants lorsqu'un document est ajouté**

Chaque fois qu'une personne crée un nouvel élément dans l'outil documents, envoyer une notification aux utilisateurs.

*Par défaut : `false`*


### `show_default_folders`

**Afficher dans l'outil documents tous les dossiers contenant des ressources multimédias fournies par défaut**

Dossiers de fichiers multimédias contenant des fichiers fournis par défaut, organisés en catégories de vidéo, audio, image et animations Flash, à utiliser dans leurs cours. Même si vous les rendez invisibles dans l'outil documents, vous pouvez toujours utiliser ces ressources dans l'éditeur web de la plateforme.

*Par défaut : `true`*

### `show_documents_preview`

**Afficher l'aperçu des documents**

L'affichage des aperçus des documents dans l'outil documents évite de charger une nouvelle page uniquement pour afficher un document, mais peut s'avérer instable avec certains navigateurs plus anciens ou des écrans de plus faible largeur.

*Par défaut : `false`*

### `show_users_folders`

**Afficher les dossiers des utilisateurs dans l'outil documents**

Cette option vous permet d'afficher ou de masquer aux enseignants les dossiers que le système génère pour chaque utilisateur qui visite l'outil documents ou envoie un fichier via l'éditeur web. Si vous affichez ces dossiers aux enseignants, ils peuvent les rendre visibles ou non pour les apprenants et permettre à chaque apprenant de disposer d'un espace spécifique dans le cours où non seulement stocker des documents, mais aussi créer et modifier des pages web, exporter au format PDF, réaliser des dessins, créer des modèles web personnels, envoyer des fichiers, ainsi que créer, déplacer et supprimer des répertoires et des fichiers et effectuer des copies de sécurité de leurs dossiers. Chaque utilisateur du cours dispose ainsi d'un gestionnaire de documents complet. N'oubliez pas non plus que tout utilisateur peut copier un fichier visible depuis n'importe quel dossier de l'outil documents (qu'il en soit ou non le propriétaire) vers ses portfolios ou la zone de documents personnels du réseau social, qui sera alors disponible pour qu'il puisse l'utiliser dans d'autres cours.

*Par défaut : `true`*

### `students_download_folders`

**Autoriser les apprenants à télécharger des répertoires**

Autoriser les apprenants à compresser et télécharger un répertoire complet depuis l'outil documents

*Par défaut : `true`*


### `students_export2pdf`

**Autoriser les apprenants à exporter des documents web au format PDF dans les outils documents et wiki**

Cette fonctionnalité est activée par défaut, mais en cas de surcharge du serveur due à un usage abusif, ou dans des environnements d'apprentissage spécifiques, vous pourriez souhaiter la désactiver pour tous les cours.

*Par défaut : `true`*

### `thematic_pdf_orientation`

**Orientation PDF pour la progression du cours**

Dans l'outil de progression du cours, vous pouvez imprimer un PDF des différents éléments. Définissez « portrait » ou « landscape » (termes techniques) pour la modifier.

*Par défaut : `landscape`*


### `upload_extensions_blacklist`

**Liste noire - paramètre**

La liste noire sert à filtrer les extensions de fichiers en supprimant (ou en renommant) tout fichier dont l'extension figure dans la liste noire ci-dessous. Les extensions doivent figurer sans le point initial (.) et être séparées par un point-virgule (;) comme suit :  exe;com;bat;scr;php. Les fichiers sans extension sont acceptés. La casse (majuscules/minuscules) n'a pas d'importance.

### `upload_extensions_list_type`

**Type de filtrage des téléversements de documents**

Indique si vous souhaitez utiliser le filtrage par liste noire ou par liste blanche. Consultez la description de la liste noire ou de la liste blanche ci-dessous pour plus de détails.

*Par défaut : `blacklist`*


### `upload_extensions_replace_by`

**Extension de remplacement**

Saisissez l'extension que vous souhaitez utiliser pour remplacer les extensions dangereuses détectées par le filtre. Nécessaire uniquement si vous avez sélectionné un filtre par remplacement.

*Par défaut : `dangerous`*


### `upload_extensions_skip`

**Comportement du filtrage (ignorer/renommer)**

Si vous choisissez d'ignorer, les fichiers filtrés par la liste noire ou la liste blanche ne seront pas téléversés dans le système. Si vous choisissez de les renommer, leur extension sera remplacée par celle définie dans le paramètre d'extension de remplacement. Attention : le renommage ne vous protège pas réellement et peut provoquer des collisions de noms si plusieurs fichiers de même nom mais d'extensions différentes existent.

*Par défaut : `true`*

### `upload_extensions_whitelist`

**Liste blanche - paramètre**

La liste blanche sert à filtrer les extensions de fichiers en supprimant (ou en renommant) tout fichier dont l'extension ne figure *PAS* dans la liste blanche ci-dessous. Elle est généralement considérée comme une approche de filtrage plus sûre, mais plus restrictive. Les extensions doivent figurer sans le point initial (.) et être séparées par un point-virgule (;) comme suit :  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Les fichiers sans extension sont acceptés. La casse (majuscules/minuscules) n'a pas d'importance.

### `users_copy_files`

**Autoriser les utilisateurs à copier des fichiers d'un cours dans votre espace de fichiers personnel**

Permet aux utilisateurs de copier des fichiers d'un cours dans votre espace de fichiers personnel, visible via le réseau social ou via l'éditeur HTML lorsqu'ils se trouvent hors d'un cours

*Par défaut : `true`*


### `video_features`

**Fonctionnalités vidéo**

Tableau de fonctionnalités supplémentaires que vous pouvez activer pour le lecteur vidéo dans Chamilo. Les options incluent « speed », qui permet de modifier la vitesse de lecture d'une vidéo.