# Relevés de notes académiques

Chamilo peut produire un **relevé de notes académique non officiel** à partir des cours terminés et certifiés d'un apprenant, et permettre au personnel autorisé de délivrer un **relevé de notes officiel signé**. Cette fonctionnalité est distincte d'un certificat de cours individuel ou de sa vérification optionnelle sur le réseau de test Sepolia.

## Activer la fonctionnalité

Dans **Administration > Paramètres de configuration > Certificats**, activez **Relevés de notes académiques** (`certificate.transcript_enabled`). Cette option est désactivée par défaut. Consultez les paramètres supplémentaires relatifs au programme, à l'échelle de notation, aux heures de cours, au numéro d'étudiant, à l'adresse et au signataire dans [Paramètres des certificats](../platform-settings/certificate-settings.md#transcript_enabled).

Le relevé de notes utilise les certificats générés par la **catégorie racine du carnet de notes** des cours et sessions éligibles. Il n'inclut que les cours de l'URL d'accès courante auxquels l'apprenant est encore inscrit. Un cours sans certificat éligible n'ajoute aucune ligne.

La note finale affichée est une moyenne des scores en pourcentage des cours listés ; le GPA est la moyenne non pondérée des points de note correspondants. Les deux dépendent des cours inclus au moment de la consultation ou de la délivrance.

## Colonnes du relevé de notes

| Colonne | Contenu |
|--------|---------|
| **Cours** | Le code du cours, ou le nom du département du cours (`transcript_course_code_source`) |
| **Description** | Le titre du cours, et le titre de la session pour un cours suivi dans une session |
| **Inscription** | Date à laquelle l'apprenant s'est inscrit au cours ou à la session |
| **Heures requises** | La valeur du champ supplémentaire de cours défini dans `transcript_hours_extra_field`, ou la durée du cours |
| **Date d'achèvement** | La date du certificat |
| **Heures effectuées** | Le temps passé par l'apprenant dans le cours, ou les heures requises lorsque `transcript_completed_hours_are_required_hours` est activé |
| **Note finale** | Le score du certificat |
| **Note** | La lettre de `transcript_grading_scale` correspondant à ce score |

## Accéder au relevé de notes d'un apprenant

1. Accédez à **Administration > Utilisateurs > Liste des utilisateurs** et localisez l'apprenant. Une action **Relevé de notes** est disponible pour les administrateurs autorisés et les administrateurs de session lorsque la fonctionnalité est activée.
2. Vous pouvez également utiliser l'action **Relevé de notes** depuis la page de détail du rapport global d'un apprenant éligible.
3. Consultez la liste des cours de l'apprenant, les notes, les dates, les heures, la note finale et le GPA.
4. Sélectionnez **Télécharger le relevé de notes non officiel** pour obtenir un PDF construit à partir des enregistrements actuels de l'apprenant.

La page du relevé de notes est également accessible directement à l'adresse `/transcript?userId=<user-id>` pour toute personne autorisée à consulter les enregistrements de cet apprenant. Ne considérez pas la connaissance de l'URL ou de l'identifiant utilisateur comme une autorisation : l'accès est vérifié côté serveur.

Un apprenant peut consulter **son propre** relevé de notes, mais ne peut ni délivrer ni révoquer un relevé officiel. Les émetteurs autorisés sont :

* Les administrateurs de plateforme/portail agissant dans le périmètre des utilisateurs et des URL d'accès qu'ils gèrent.
* Les responsables RH pour les apprenants qu'ils suivent.
* Les administrateurs de session pour les apprenants inscrits à une session qu'ils administrent.

Ces autorisations sont évaluées par apprenant ; le seul fait d'avoir un rôle de personnel n'accorde pas l'accès à tous les relevés de notes.

![Le relevé de notes d'un apprenant vu par un administrateur, avec les cours, la note finale, le GPA et l'échelle de notation, la liste des relevés officiels et le bloc d'image de signature](../../.gitbook/assets/admin-transcript-user.png)

## Délivrer et vérifier un relevé de notes officiel

1. Sur la page du relevé de notes d'un apprenant autorisé, vérifiez les cours, les notes et les informations personnelles actuellement affichés.
2. Sélectionnez **Délivrer un relevé de notes officiel** et confirmez. Chamilo enregistre un instantané signé des informations à ce moment-là.
3. La nouvelle entrée apparaît sous **Relevés de notes officiels**, avec sa date de délivrance et son émetteur.
4. Utilisez **Télécharger** pour le PDF officiel ou **Vérifier** pour ouvrir la page publique de vérification.
5. Si nécessaire, un émetteur autorisé peut **Révoquer** ce relevé de notes officiel. La page de vérification indiquera alors qu'il est révoqué.

Chaque relevé délivré est stocké séparément : la délivrance d'une version plus récente ne réécrit pas silencieusement un enregistrement signé antérieur. Les liens de vérification suivent `/transcripts/verify/<token>` et exposent également une réponse `.json`. Toute personne disposant du lien de vérification peut contrôler la validité sans se connecter ; conservez ces liens sous un contrôle approprié, car une vérification valide expose les détails du relevé signé. Les enregistrements invalides ou révoqués ne sont pas présentés comme des documents valides.

![La page publique de vérification d'un relevé de notes officiel valide, avec ses détails et ses cours](../../.gitbook/assets/admin-transcript-verification.png)

Un relevé de notes officiel est signé numériquement par Chamilo à l'aide de la clé de signature de l'établissement. **Il ne s'agit pas d'une transaction blockchain** ; la fonctionnalité Sepolia documente un processus distinct pour les justificatifs de certificat du carnet de notes.

## Image de signature et informations du signataire

Un administrateur de la plateforme peut téléverser une image de signature **PNG ou JPEG** dans la section **Signature des relevés officiels** de la page de relevé d'un apprenant. L'image appartient à l'URL d'accès actuelle et est utilisée dans les PDF officiels. Le nom et le titre du signataire proviennent de `certificate.transcript_signatory_name` et `certificate.transcript_signatory_title`.

Seuls les administrateurs de la plateforme gèrent l'image de signature ; les autres émetteurs de relevés autorisés n'obtiennent pas automatiquement cette autorisation. Protégez les clés de signature de l'établissement et le stockage privé de l'image de signature dans le cadre des procédures de sauvegarde et de contrôle d'accès du portail. Les deux sont conservés en dehors du dossier web public, dans `var/certificate-issuer/`, avec la clé qui signe également les justificatifs de certificats du carnet de notes : incluez ce dossier dans vos [sauvegardes](../maintenance/backups.md), faute de quoi chaque relevé et justificatif déjà émis ne pourra plus être vérifié.

## Dépannage

* **Lien du relevé manquant :** vérifiez `certificate.transcript_enabled` et le périmètre de l'utilisateur actuel.
* **Aucun cours terminé :** l'apprenant doit disposer d'un certificat de carnet de notes racine admissible et d'une inscription correspondante au cours/session en cours sur cette URL d'accès.
* **Numéro d'étudiant, heures, lettres de note ou titre de programme incorrects :** examinez les paramètres `certificate.transcript_*` concernés avant d'émettre un relevé officiel.
* **La vérification signale un résultat révoqué ou non valide :** ne réutilisez pas l'enregistrement comme preuve d'un relevé officiel en cours ; le personnel autorisé peut en émettre un nouveau le cas échéant.

Voir aussi [Certificats et compétences](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) et [Mon relevé](../../student-guide/account-and-security/my-transcript.md).