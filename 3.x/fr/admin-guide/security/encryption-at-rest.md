# Chiffrement au repos des champs de profil utilisateur

Chamilo 3.1 peut, de manière optionnelle, chiffrer certains champs personnels du profil avant de les stocker dans la base de données. Cette première implémentation couvre la **biographie**, le **téléphone** et l’**adresse**. Le chiffrement est **désactivé par défaut** et nécessite une clé de chiffrement privée. Il ne chiffre pas l’ensemble des informations utilisateur et ne remplace pas la sécurité du disque, de la base de données, du transport ou des sauvegardes.

## Avant d’activer le chiffrement

Seul un administrateur de la plateforme disposant d’un accès au serveur doit effectuer le déploiement. Vérifiez d’abord que l’installation inclut les migrations Chamilo 3.1 pour le stockage des champs chiffrés, effectuez une sauvegarde récupérable de la base de données et prévoyez une sauvegarde sécurisée de la clé de chiffrement **séparément de la base de données**. Testez les procédures de restauration avant de modifier les données de production.

La clé est stockée dans `var/data-at-rest/master.key`, en dehors de la racine web publique. Ne la publiez jamais, ne la collez pas dans une demande d’assistance et ne la validez pas dans Git. La perte de la clé d’origine peut rendre les données chiffrées illisibles. Ne générez pas de clé de remplacement si des données utilisateur sont déjà chiffrées.

## Initialiser la clé

Exécutez la commande une fois en mode aperçu :

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Si elle indique qu’aucune donnée chiffrée n’existe et que la clé peut être provisionnée, initialisez-la explicitement :

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Si la commande signale une clé compatible existante, aucun remplacement n’est effectué. Si des lignes chiffrées existent mais que la clé est absente ou incompatible, **arrêtez** et récupérez la clé d’origine.

## Choisir les champs protégés

Ouvrez **Administration > Paramètres > Sécurité** et sélectionnez **Biographie**, **Téléphone** et/ou **Adresse** dans le paramètre des champs utilisateur chiffrés. Ne sélectionnez que les champs que vous souhaitez protéger. Les nouvelles écritures dans les champs sélectionnés utilisent un chiffrement authentifié (libsodium XChaCha20-Poly1305) ; les enregistrements en clair hérités restent lisibles jusqu’à un remplissage explicite.

## Inspecter et remplir les données existantes

Les commandes de remplissage ne modifient pas les enregistrements sans `--apply`. Préférez un seul utilisateur de QA avant un lot plus large :

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Après avoir vérifié la disponibilité de la clé, la sélection des champs, les sauvegardes et le compte de QA, lancez un pilote intentionnel :

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Remplacez `102` par l’identifiant réel d’un utilisateur de test. Pour des jeux de données plus volumineux, utilisez l’argument optionnel `--batch-size` (1–500), examinez la sortie de la commande et le comportement de l’application, et planifiez les lots pendant une fenêtre de maintenance. N’exécutez pas un remplissage de l’ensemble de la base de données sans une stratégie de retour arrière testée.

## Limites opérationnelles

- Il s’agit de la première phase du chiffrement au niveau des champs, et non d’un chiffrement de l’ensemble de la base de données.
- Les intégrations et exportations SQL directes plus anciennes peuvent ne pas savoir lire les valeurs chiffrées ; vérifiez-les avant le déploiement.
- Une sauvegarde de la base de données **sans** clé récupérable correspondante est insuffisante.
- Ne journalisez pas le contenu brut des champs et n’incluez pas de matériel de clé dans les diagnostics.
- Le seul retour arrière du code de l’application ne déchiffre pas les valeurs stockées.

Voir [Paramètres de sécurité](../platform-settings/security-settings.md) pour les options générales de sécurité de la plateforme. Implémentation : [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).