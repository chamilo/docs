# OnlyOffice

L’intégration **OnlyOffice** permet aux utilisateurs de modifier des documents (Word, Excel, PowerPoint) directement dans le navigateur, au sein de Chamilo, sans les télécharger.

## Ce que fournit OnlyOffice

* **Édition de documents** — Modifier les fichiers .docx, .xlsx, .pptx dans le navigateur
* **Compatibilité des formats** — Compatibilité complète avec les formats Microsoft Office
* **Aucun logiciel de bureau requis** — Tout s’exécute dans le navigateur

> L’édition collaborative en temps réel dépend du Document Server OnlyOffice lui-même ; le plugin de Chamilo ouvre et enregistre les documents via le serveur, mais n’ajoute ni ne restreint cette capacité.

## Configuration

1. Installez **OnlyOffice Document Server** sur votre serveur (ou utilisez le service cloud OnlyOffice)
2. Dans les paramètres de la plateforme Chamilo, configurez :
   * **OnlyOffice Document Server URL** — L’adresse de votre serveur OnlyOffice
   * **Secret key** — Pour une communication sécurisée entre Chamilo et OnlyOffice
3. Activez l’intégration

## Fonctionnement

Une fois configuré, les utilisateurs voient une option **Edit with OnlyOffice** lorsqu’ils consultent des types de documents pris en charge dans l’outil Documents. Un clic ouvre le document dans l’éditeur OnlyOffice, au sein de l’interface Chamilo.

Les modifications sont enregistrées automatiquement dans le stockage de documents de Chamilo.

## Conseils

* **Serveur dédié recommandé** — Comme BigBlueButton, OnlyOffice Document Server devrait s’exécuter sur son propre serveur pour de meilleures performances
* **HTTPS obligatoire** — Chamilo et OnlyOffice doivent tous deux être servis en HTTPS pour que l’intégration fonctionne
* **Vérifier les formats** — OnlyOffice fonctionne le mieux avec les formats Office (.docx, .xlsx, .pptx). Les autres formats peuvent n’offrir qu’une prise en charge limitée de l’édition.