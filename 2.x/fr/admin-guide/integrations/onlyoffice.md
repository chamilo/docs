# OnlyOffice

L'intégration de **OnlyOffice** permet aux utilisateurs de modifier des documents (Word, Excel, PowerPoint) directement dans le navigateur au sein de Chamilo, sans avoir à les télécharger.

## Ce que propose OnlyOffice

* **Édition de documents** — Modifiez des fichiers .docx, .xlsx, .pptx dans le navigateur
* **Compatibilité des formats** — Compatibilité totale avec les formats Microsoft Office
* **Aucun logiciel de bureau requis** — Tout fonctionne dans le navigateur

> L'édition collaborative en temps réel dépend du serveur de documents OnlyOffice lui-même ; le plugin de Chamilo ouvre et enregistre les documents via le serveur, mais n'ajoute ni ne restreint cette fonctionnalité.

## Configuration

1. Installez le **OnlyOffice Document Server** sur votre serveur (ou utilisez le service cloud OnlyOffice)
2. Dans les paramètres de la plateforme Chamilo, configurez :
   * **URL du serveur de documents OnlyOffice** — L'adresse de votre serveur OnlyOffice
   * **Clé secrète** — Pour une communication sécurisée entre Chamilo et OnlyOffice
3. Activez l'intégration

## Fonctionnement

Une fois configuré, les utilisateurs voient une option **Modifier avec OnlyOffice** lorsqu'ils consultent des types de documents pris en charge dans l'outil Documents. En cliquant dessus, le document s'ouvre dans l'éditeur OnlyOffice au sein de l'interface Chamilo.

Les modifications sont automatiquement enregistrées dans le stockage de documents de Chamilo.

## Conseils

* **Serveur séparé recommandé** — Comme pour BigBlueButton, il est conseillé d'exécuter le serveur de documents OnlyOffice sur un serveur dédié pour de meilleures performances
* **HTTPS requis** — Chamilo et OnlyOffice doivent tous deux être servis via HTTPS pour que l'intégration fonctionne
* **Vérifiez les formats** — OnlyOffice fonctionne mieux avec les formats Office (.docx, .xlsx, .pptx). Les autres formats peuvent avoir un support d'édition limité.