# Paramètres des Documents

Comportement de l'outil **Documents** des cours — téléversements, extensions autorisées, partage et modèles.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Documents**. Cette catégorie contient **29 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `access_url_specific_files`

**Activer les fichiers spécifiques à une URL**

Lorsque cette fonctionnalité est activée sur une configuration multi-URL, vous pouvez accéder à l'URL principale et fournir des versions spécifiques à une URL pour n'importe quel fichier (dans l'outil Documents). Le fichier original sera remplacé par la version alternative lorsque vous le visualisez depuis une URL différente. Cela vous permet de personnaliser davantage chaque URL tout en profitant de l'avantage de réutiliser les mêmes cours plusieurs fois.

*Par défaut : `false`*

### `default_document_quotum`

**Espace disque par défaut**

Quel est l'espace disque disponible pour un cours ? Vous pouvez remplacer le quota pour un cours spécifique via : administration de la plateforme > Cours > modifier

*Par défaut : `1000`*

### `default_group_quotum`

**Espace disque disponible pour les groupes**

Quel est l'espace disque par défaut disponible pour l'outil Documents des groupes ?

*Par défaut : `250`*

### `documents_custom_cloud_link_list`

**Définir une liste stricte d'hôtes pour les liens cloud**

L'outil Documents peut intégrer des liens vers des fichiers dans le cloud. La liste des services cloud est limitée à une liste codée en dur, mais vous pouvez définir le tableau 'links' qui contiendra une liste de vos propres services/URLs. La liste définie ici remplacera la liste par défaut.

### `documents_default_visibility_defined_in_course`

**Visibilité des documents définie dans le cours**

La visibilité par défaut des documents pour tous les cours

*Par défaut : `false`*

### `documents_hide_download_icon`

**Masquer l'icône de téléchargement des documents**

Dans l'outil Documents, masquer l'icône de téléchargement pour les utilisateurs.

*Par défaut : `false`*

### `enable_x_sendfile_headers`

**Activer les en-têtes X-sendfile**

Activez cette option si vous avez X-sendfile activé au niveau du serveur web et que vous souhaitez ajouter les en-têtes nécessaires pour que les navigateurs les prennent en charge.

*Par défaut : `false`*

### `group_category_document_access`

**Activer les options de partage pour les documents dans une catégorie de groupe**

Lorsque cette option est activée, les administrateurs peuvent définir des permissions d'accès et de partage pour les groupes de documents par catégorie.

*Par défaut : `false`*

### `group_document_access`

**Activer les options de partage pour les documents de groupe**

Lorsque cette option est activée, les permissions de partage et d'accès aux documents peuvent être configurées au niveau du groupe.

*Par défaut : `false`*

### `pdf_export_watermark_by_course`

**Activer la définition de filigrane par cours**

Lorsque cette option est activée, les enseignants peuvent définir leur propre filigrane pour les documents de leurs cours.

*Par défaut : `false`*

### `pdf_export_watermark_enable`

**Activer le filigrane dans l'exportation PDF**

En activant cette option, vous pouvez téléverser une image ou un texte qui sera automatiquement ajouté comme filigrane à toutes les exportations PDF des documents sur le système.

*Par défaut : `false`*

### `pdf_export_watermark_text`

**Texte de filigrane PDF**

Ce texte sera ajouté comme filigrane aux exportations de documents au format PDF.

### `permanently_remove_deleted_files`

**Les fichiers supprimés ne peuvent pas être restaurés**

Supprimer un fichier dans l'outil Documents le supprime définitivement. Le fichier ne peut pas être restauré.

*Par défaut : `false`*

### `permissions_for_new_directories`

**Permissions pour les nouveaux répertoires**

La possibilité de définir les paramètres de permissions à attribuer à chaque répertoire nouvellement créé vous permet d'améliorer la sécurité contre les attaques de pirates téléversant du contenu dangereux sur votre portail. Le paramètre par défaut (0770) devrait suffire à offrir à votre serveur un niveau de protection raisonnable. Le format utilisé suit la terminologie UNIX de Propriétaire-Groupe-Autres avec des permissions de Lecture-Écriture-Exécution.

*Par défaut : `0770`*

### `permissions_for_new_files`

**Permissions pour les nouveaux fichiers**

La possibilité de définir les paramètres de permissions à attribuer à chaque fichier nouvellement créé vous permet d'améliorer la sécurité contre les attaques de pirates téléversant du contenu dangereux sur votre portail. Le paramètre par défaut (0550) devrait suffire à offrir à votre serveur un niveau de protection raisonnable. Le format utilisé suit la terminologie UNIX de Propriétaire-Groupe-Autres avec des permissions de Lecture-Écriture-Exécution. Si vous utilisez Oogie, assurez-vous que l'utilisateur qui lance LibreOffice peut écrire des fichiers dans le dossier du cours.

*Par défaut : `0660`*

### `send_notification_when_document_added`

**Envoyer une notification aux étudiants lorsqu'un document est ajouté**

Chaque fois qu'une personne crée un nouvel élément dans l'outil Documents, envoyer une notification aux utilisateurs.

*Par défaut : `false`*

### `show_default_folders`

**Afficher dans l'outil Documents tous les dossiers contenant des ressources multimédias fournies par défaut**

Dossiers de fichiers multimédias contenant des fichiers fournis par défaut, organisés en catégories de vidéo, audio, image et animations flash à utiliser dans leurs cours. Bien que vous les rendiez invisibles dans l'outil Documents, vous pouvez toujours utiliser ces ressources dans l'éditeur web de la plateforme.

*Par défaut : `true`*

### `show_documents_preview`

**Afficher l'aperçu des documents**

Afficher des aperçus des documents dans l'outil Documents permet d'éviter de charger une nouvelle page juste pour afficher un document, mais cela peut être instable avec certains navigateurs plus anciens ou sur des écrans de petite largeur.

*Par défaut : `false`*

### `show_users_folders`

**Afficher les dossiers des utilisateurs dans l'outil Documents**

Cette option vous permet d'afficher ou de masquer aux enseignants les dossiers que le système génère pour chaque utilisateur qui visite l'outil Documents ou envoie un fichier via l'éditeur web. Si vous affichez ces dossiers aux enseignants, ils peuvent les rendre visibles ou non aux apprenants et permettre à chaque apprenant d'avoir un espace spécifique dans le cours où non seulement stocker des documents, mais aussi créer et éditer des pages web, exporter en PDF, faire des dessins, créer des modèles web personnels, envoyer des fichiers, ainsi que créer, déplacer et supprimer des répertoires et fichiers et faire des copies de sécurité de leurs dossiers. Chaque utilisateur du cours dispose d'un gestionnaire de documents complet. De plus, rappelez-vous que tout utilisateur peut copier un fichier visible depuis n'importe quel dossier dans l'outil Documents (qu'il en soit le propriétaire ou non) vers ses portfolios ou sa zone de documents personnels du réseau social, ce qui lui permettra de l'utiliser dans d'autres cours.

*Par défaut : `true`*

### `students_download_folders`

**Permettre aux apprenants de télécharger des répertoires**

Permettre aux apprenants de compresser et de télécharger un répertoire complet depuis l'outil Documents.

*Par défaut : `true`*

### `students_export2pdf`

**Permettre aux apprenants d'exporter des documents web au format PDF dans les outils Documents et Wiki**

Cette fonctionnalité est activée par défaut, mais en cas de surcharge du serveur ou d'abus, ou dans des environnements d'apprentissage spécifiques, vous pourriez vouloir la désactiver pour tous les cours.

*Par défaut : `true`*

### `thematic_pdf_orientation`

**Orientation PDF pour la progression du cours**

Dans l'outil de progression du cours, vous pouvez imprimer un PDF des différents éléments. Définissez 'portrait' ou 'landscape' (termes techniques) pour modifier l'orientation.

*Par défaut : `landscape`*

### `upload_extensions_blacklist`

**Liste noire - paramètre**

La liste noire est utilisée pour filtrer les extensions de fichiers en supprimant (ou en renommant) tout fichier dont l'extension figure dans la liste noire ci-dessous. Les extensions doivent être indiquées sans le point initial (.) et séparées par un point-virgule (;) comme suit : exe;com;bat;scr;php. Les fichiers sans extension sont acceptés. La casse (majuscules/minuscules) n'a pas d'importance.

### `upload_extensions_list_type`

**Type de filtrage pour les téléversements de documents**

Indique si vous souhaitez utiliser le filtrage par liste noire ou liste blanche. Consultez la description de la liste noire ou de la liste blanche ci-dessous pour plus de détails.

*Par défaut : `blacklist`*

### `upload_extensions_replace_by`

**Extension de remplacement**

Entrez l'extension que vous souhaitez utiliser pour remplacer les extensions dangereuses détectées par le filtre. Nécessaire uniquement si vous avez sélectionné un filtre par remplacement.

*Par défaut : `dangerous`*

### `upload_extensions_skip`

**Comportement du filtrage (ignorer/renommer)**

Si vous choisissez d'ignorer, les fichiers filtrés par la liste noire ou la liste blanche ne seront pas téléversés sur le système. Si vous choisissez de les renommer, leur extension sera remplacée par celle définie dans le paramètre de remplacement d'extension. Attention, renommer ne vous protège pas vraiment et peut causer des collisions de noms si plusieurs fichiers portant le même nom mais des extensions différentes existent.

*Par défaut : `true`*

### `upload_extensions_whitelist`

**Liste blanche - paramètre**

La liste blanche est utilisée pour filtrer les extensions de fichiers en supprimant (ou en renommant) tout fichier dont l'extension ne figure *PAS* dans la liste blanche ci-dessous. Cette approche est généralement considérée comme plus sûre mais plus restrictive pour le filtrage. Les extensions doivent être indiquées sans le point initial (.) et séparées par un point-virgule (;) comme suit : htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Les fichiers sans extension sont acceptés. La casse (majuscules/minuscules) n'a pas d'importance.

### `users_copy_files`

**Permettre aux utilisateurs de copier des fichiers d'un cours dans leur espace de fichiers personnel**

Permet aux utilisateurs de copier des fichiers d'un cours dans leur espace de fichiers personnel, visible via le réseau social ou via l'éditeur HTML lorsqu'ils ne sont pas dans un cours.

*Par défaut : `true`*

### `video_features`

**Fonctionnalités vidéo**

Tableau de fonctionnalités supplémentaires que vous pouvez activer pour le lecteur vidéo dans Chamilo. Les options incluent 'speed', qui permet de modifier la vitesse de lecture d'une vidéo.