# Configuration SSO

Cette page traite des sujets qui s'appliquent à travers les différentes méthodes d'authentification.

## Plusieurs fournisseurs

Vous pouvez activer plusieurs méthodes d'authentification en même temps. Chaque fournisseur activé affiche son propre bouton sur la page de connexion à côté du formulaire standard de nom d'utilisateur/mot de passe. Les utilisateurs choisissent leur méthode préférée.

Gardez le formulaire standard activé afin que les administrateurs de la plateforme puissent toujours se connecter, même si un fournisseur externe est mal configuré.

## Priorité d'authentification

Lorsque plusieurs méthodes sont actives, le système vérifie les identifiants dans cet ordre :

1. LDAP (si `force_as_login_method` est défini)
2. Fournisseurs OAuth2 (dans l'ordre où ils apparaissent dans `authentication.yaml`)
3. Base de données interne de Chamilo

## Jetons JWT pour l'accès à l'API

Chamilo utilise des JWT (JSON Web Tokens) pour son API REST. La durée de vie des jetons et le comportement de rafraîchissement sont configurés dans `config/packages/lexik_jwt_authentication.yaml`. Cela est distinct du flux de connexion SSO et s'applique uniquement aux clients API.

## Dépannage

### Le bouton de connexion n'apparaît pas après la configuration

Le cache doit être vidé après chaque modification de `authentication.yaml` :

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Les utilisateurs ne peuvent pas se connecter via SSO

* **Incohérence de l'URI de redirection** — L'URI enregistré dans votre fournisseur d'identité doit correspondre exactement à `https://your-chamilo-url/connect/<provider>/check`.
* **Dérive d'horloge** — Les jetons SSO sont sensibles au temps. Assurez-vous que l'horloge de votre serveur est synchronisée (NTP).
* **Certificat SSL** — Chamilo doit faire confiance au certificat du fournisseur d'identité. Vérifiez les problèmes liés aux certificats auto-signés.
* **Journaux** — Consultez `var/log/` et les journaux de votre fournisseur d'identité pour des messages d'erreur spécifiques.

### Les utilisateurs sont créés avec le mauvais rôle

Vérifiez la configuration de mappage des rôles pour le fournisseur. Les nouveaux utilisateurs sont par défaut assignés au rôle d'étudiant, sauf si un mappage de groupe ou d'attribut les promeut.

### Les utilisateurs existent dans le fournisseur mais ne peuvent pas accéder à Chamilo

* Si `allow_create_new_users` est défini sur false, l'utilisateur doit déjà avoir un compte Chamilo dont l'email ou le nom d'utilisateur correspond aux données du fournisseur.
* Vérifiez que l'utilisateur n'est pas désactivé dans Chamilo.
* Pour Azure, consultez `existing_user_verification_order` pour comprendre comment Chamilo associe les utilisateurs entrants aux comptes existants.