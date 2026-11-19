# OnlyOffice

L'intégration **OnlyOffice** permet aux utilisateurs de modifier des documents (Word, Excel, PowerPoint) directement dans le navigateur au sein de Chamilo, sans les télécharger.

## Ce qu'OnlyOffice fournit

* **Édition de documents** — Modifier les fichiers .docx, .xlsx et .pptx dans le navigateur
* **Compatibilité des formats** — Compatibilité complète avec les formats Microsoft Office
* **Aucun logiciel de bureau requis** — Tout s'exécute dans le navigateur

> L'édition collaborative en temps réel dépend d'OnlyOffice Document Server lui-même ; le plugin de Chamilo ouvre et enregistre les documents via le serveur, mais n'ajoute ni ne restreint cette capacité.

## Configuration

1. Installez **OnlyOffice Document Server** sur votre serveur (ou utilisez le service cloud OnlyOffice)
2. Dans les paramètres de la plateforme Chamilo, configurez :
   * **URL d'OnlyOffice Document Server** — L'adresse de votre serveur OnlyOffice
   * **Clé secrète** — Pour une communication sécurisée entre Chamilo et OnlyOffice
3. Activez l'intégration

## Fonctionnement

Une fois la configuration effectuée, les utilisateurs voient une option **Modifier avec OnlyOffice** lorsqu'ils consultent les types de documents pris en charge dans l'outil Documents. Un clic ouvre le document dans l'éditeur OnlyOffice au sein de l'interface Chamilo.

Les modifications sont automatiquement réenregistrées dans le stockage de documents de Chamilo.

## Actualisation des versions de document et enregistrements

Lorsque le serveur de documents signale qu'une version enregistrée plus récente est disponible, l'éditeur Chamilo peut demander une **configuration de document signée** mise à jour et utiliser la capacité d'actualisation de fichier (file-refresh) d'OnlyOffice sans obliger l'utilisateur à ouvrir un autre document. Chamilo vérifie que la configuration actualisée appartient au même document avant de basculer l'éditeur vers sa nouvelle version.

Un **force-save** alors que l'édition est encore en cours n'avance pas la clé de version du document. Le callback de final-save fait progresser les métadonnées du document enregistré, afin que la prochaine ouverture puisse utiliser la version achevée. Cette distinction évite de traiter un enregistrement en cours comme une version de document distincte.

Si une actualisation échoue, vérifiez qu'OnlyOffice Document Server peut atteindre les URL de fichier et de callback de Chamilo, et consultez les journaux de l'éditeur et du serveur. Ne rouvrez le document qu'après avoir confirmé que le travail a été enregistré ; une session d'éditeur interrompue ou obsolète ne prouve pas que la version finale a atteint Chamilo.

Ce comportement a été corrigé dans la [PR #9178](https://github.com/chamilo/chamilo-lms/pull/9178).

## Conseils

* **Serveur distinct recommandé** — Comme BigBlueButton, OnlyOffice Document Server doit s'exécuter sur son propre serveur pour de meilleures performances
* **HTTPS requis** — Chamilo et OnlyOffice doivent tous deux être servis via HTTPS pour que l'intégration fonctionne
* **Vérifiez les formats** — OnlyOffice fonctionne mieux avec les formats Office (.docx, .xlsx, .pptx). Les autres formats peuvent avoir une prise en charge limitée de l'édition.