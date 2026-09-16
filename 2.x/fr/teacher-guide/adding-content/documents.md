# Documents

L'outil Documents est le répertoire de fichiers de votre cours. Vous pouvez téléverser des fichiers, créer des documents au format HTML, organiser le contenu dans des dossiers et donner aux apprenants accès à tous les matériels dont ils ont besoin.

## Accéder à l'outil Documents

Ouvrez l'outil **Documents** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documents" data-size="line"> depuis la page d'accueil du cours. Vous verrez un explorateur de fichiers affichant le dossier racine de la bibliothèque de documents de votre cours.

![L'explorateur de fichiers des documents affichant les dossiers et fichiers avec des icônes d'action](/.gitbook/assets/documents-file-browser.png)

## Téléverser des fichiers

1. Cliquez sur le bouton **Téléverser** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Téléverser" data-size="line">
2. Sélectionnez un ou plusieurs fichiers depuis votre ordinateur (vous pouvez glisser-déposer les fichiers dans la zone de téléversement)
3. Les fichiers sont téléversés et apparaissent dans le dossier actuel

Chamilo prend en charge la plupart des types de fichiers courants : PDF, documents bureautiques (.docx, .odt), présentations (.pptx, .odp), feuilles de calcul (.xlsx, .ods), images (PNG, JPG, SVG, GIF), fichiers audio, fichiers vidéo (y compris WEBM), fichiers HTML, et bien plus encore.

Certains formats peuvent être interdits par l'administrateur du portail via un réglage de filtrage par liste blanche/liste noire dans la section sécurité de l'administration.

Pour une meilleure lisibilité par les apprenants, nous recommandons de téléverser des fichiers qu'un navigateur peut afficher ou ouvrir sans outils supplémentaires. Cela rend votre cours plus portable et, par conséquent, plus accessible sur les appareils mobiles et plus lisible pour les personnes ayant des besoins spécifiques.

## Créer du contenu

En plus de téléverser des fichiers, vous pouvez créer du contenu directement dans Chamilo :

### Pages web

1. Cliquez sur **Nouveau document**
2. Utilisez l'éditeur de texte enrichi pour rédiger votre contenu avec mise en forme, images, tableaux et liens
3. Entrez un **titre** pour la page
4. Enregistrez

L'éditeur de texte enrichi (TinyMCE) offre des fonctionnalités similaires à celles d'un traitement de texte, notamment :

* Mise en forme du texte (gras, italique, titres, listes)
* Tableaux
* Images (téléversement ou lien vers des images existantes)
* Vidéos et audio intégrés
* Liens vers d'autres ressources
* Édition de la source HTML pour les utilisateurs avancés

### Génération de médias par IA

Lorsque les assistants IA sont activés sur la plateforme, vous pouvez demander à l'IA de générer une **image** ou une **courte vidéo** pour illustrer un paragraphe dans le document que vous éditez. Sélectionnez un paragraphe, ouvrez la boîte de dialogue **Générer un média IA**, et l'IA produira un élément multimédia que vous pourrez examiner et insérer. La boîte de dialogue respecte les permissions au niveau du cours et n'apparaît que dans les cours où la génération de médias par IA est autorisée.

### Enregistrement audio

Si votre navigateur le permet, vous pouvez enregistrer de l'audio directement dans l'outil Documents — utile pour créer des instructions audio ou du contenu pour l'apprentissage des langues. Cela nécessite une configuration HTTPS pour Chamilo, car l'enregistrement audio utilise une technologie que le navigateur n'autorise que si la connexion est sécurisée.

## Organiser avec des dossiers

Maintenez votre bibliothèque de documents organisée en utilisant des dossiers :

1. Cliquez sur **Nouveau dossier** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nouveau dossier" data-size="line">
2. Entrez un nom pour le dossier
3. Enregistrez

Vous pouvez créer des dossiers imbriqués pour construire une hiérarchie de contenu logique (par exemple, `Module 1 > Semaine 1 > Lectures`).

### Déplacer des fichiers

* Localisez votre fichier dans la liste
* Cliquez sur **Déplacer** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Déplacer" data-size="line">
* Sélectionnez le dossier de destination
* Confirmez

## Gérer les documents

Pour chaque fichier ou dossier, vous pouvez :

| Action | Icône | Description |
|--------|-------|-------------|
| **Modifier** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Modifier" data-size="line"> | Renommer le fichier ou modifier son contenu (pour les pages web) |
| **Supprimer** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Supprimer" data-size="line"> | Supprimer le fichier ou le dossier |
| **Télécharger** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Télécharger" data-size="line"> | Télécharger le fichier sur votre ordinateur |
| **Visibilité** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibilité" data-size="line"> | Masquer ou afficher le fichier aux apprenants |
| **Remplacer** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Remplacer" data-size="line"> | Remplacer le fichier par une version mise à jour |
| **Déplacer** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Déplacer" data-size="line"> | Déplacer vers un autre dossier |

Remplacer un fichier est une fonctionnalité importante lorsque vous utilisez des documents pour construire des parcours d'apprentissage, car remplacer le document permettra de le rafraîchir sans que les apprenants perdent la progression enregistrée pour ce document.

### Actions en masse

Sélectionnez plusieurs fichiers en utilisant les cases à cocher, puis utilisez la barre d'outils pour supprimer ou télécharger tous les éléments sélectionnés en une seule fois.

## Intégration OnlyOffice

Si votre administrateur a configuré le plugin **OnlyOffice**, vous pouvez modifier des fichiers Word, Excel et PowerPoint (ou LibreOffice) directement dans le navigateur sans les télécharger. Recherchez l'option **Modifier avec OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> lorsque vous consultez un fichier pris en charge.

Les documents sont stockés dans Chamilo, OnlyOffice est uniquement utilisé pour **visualiser** ou modifier les documents dans le navigateur, sans besoin d'outil supplémentaire.

## Fichiers dans le cloud

Si vous utilisez un stockage cloud (Azure Blob, AWS S3 ou Google Cloud) pour vos fichiers, ceux-ci sont stockés dans le cloud mais vous pouvez les lier depuis ici. Cela est transparent pour vous et vos apprenants — l'outil Documents fonctionne de la même manière quel que soit le backend de stockage.

## Conseils

* **Organisez dès le départ** — Créez votre structure de dossiers avant de téléverser du contenu pour ne pas avoir à réorganiser plus tard. Si vous avez créé d'autres cours avec la bonne structure, vous pouvez les utiliser comme modèle par la suite
* **Utilisez des noms de fichiers descriptifs** — Aidez les apprenants à trouver ce dont ils ont besoin avec des noms clairs et significatifs
* **Masquez les travaux en cours** — Utilisez l'interrupteur de visibilité pour masquer les documents que vous êtes encore en train de préparer
* **Liez depuis les parcours d'apprentissage** — Référencez des documents dans vos parcours d'apprentissage pour créer des séquences d'apprentissage guidées
* **Vérifiez le quota de disque** — Si votre cours a une limite de stockage, supprimez les fichiers obsolètes pour libérer de l'espace