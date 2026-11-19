# Signalement confidentiel

Chamilo inclut un processus optionnel de **signalement confidentiel** permettant de transmettre des préoccupations concernant un autre utilisateur à des enquêteurs habilités. Il ne s'agit ni de l'outil ordinaire de tickets d'assistance ni d'un forum de discussion public.

## Activer la fonctionnalité

Ouvrez **Administration > Paramètres de configuration > Sécurité** et configurez :

| Paramètre | Valeur par défaut | Objet |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Activer le processus de signalement confidentiel |
| `security.confidential_reporting_min_reporters` | `2` | Nombre minimal de déclarants distincts (2–10) avant qu'une enquête ne devienne visible |
| `security.confidential_reporting_attachments_enabled` | `true` | Autoriser les pièces jointes de preuve |
| `security.confidential_reporting_notifications_enabled` | `false` | Afficher des indicateurs internes pour les enquêtes éligibles (aucun e-mail) |

Le déploiement exige également que le chiffrement du signalement confidentiel et le stockage privé du serveur soient opérationnels. Chamilo utilise les fonctions cryptographiques PHP Sodium et une clé de chiffrement privée ; **conservez et sauvegardez cette clé de manière sécurisée**. Sa perte peut rendre les signalements stockés illisibles. Ne copiez pas la clé dans un dépôt Git. N'activez pas la fonctionnalité avant d'avoir vérifié que le stockage de la clé privée et les migrations de base de données requises sont opérationnels.

## Soumettre un signalement

1. Connectez-vous directement à Chamilo et ouvrez **Signalement confidentiel** (lorsqu'il est activé pour le portail).
2. Choisissez la personne concernée, saisissez un objet et décrivez l'incident.
3. Ajoutez des preuves si les pièces jointes sont activées.
4. Décidez si les enquêteurs peuvent voir votre **nom et votre adresse e-mail** pour ce signalement précis. Cette autorisation peut être retirée ultérieurement.
5. Envoyez le signalement. Utilisez **Mes signalements confidentiels** pour suivre le dossier et échanger des messages avec un enquêteur.

L'identité du déclarant **n'est pas affichée aux enquêteurs par défaut**. Il s'agit d'un contrôle de confidentialité, et non d'une promesse d'anonymat absolu vis-à-vis des opérateurs du système.

## Autorisations d'enquête et seuils

Les enquêtes exigent l'autorisation dédiée `welfare:investigate` ainsi qu'un rôle d'administrateur ou de RH éligible. Un dossier ne devient disponible pour enquête qu'une fois le nombre configuré de **déclarants distincts** atteint pour la même personne cible. Un enquêteur ne peut pas enquêter sur un signalement le concernant. L'accès RH est limité aux utilisateurs suivis par le responsable RH.

Les enquêteurs accèdent à **Enquêtes confidentielles** pour consulter les dossiers éligibles, examiner les preuves et échanger des messages. Les dossiers en deçà du seuil ou non autorisés ne sont pas exposés via l'API d'enquête. L'**usurpation** administrative ne donne pas accès au signalement confidentiel.

## Confidentialité et précautions opérationnelles

Les signalements et les preuves jointes contiennent des données personnelles sensibles. Restreignez les autorisations des enquêteurs, limitez l'accès aux sauvegardes, définissez une politique organisationnelle de conservation appropriée et testez le processus avec des comptes distincts de déclarant, de personne cible et d'enquêteur. Évitez de copier des signalements complets dans les journaux techniques ou les outils de suivi d'incidents.

Mise en œuvre : [Signalement confidentiel #9310](https://github.com/chamilo/chamilo-lms/pull/9310).