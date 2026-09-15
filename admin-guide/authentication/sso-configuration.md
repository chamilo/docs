# Configuration SSO

Cette page couvre les sujets qui s’appliquent à l’ensemble des méthodes d’authentification.

## Fournisseurs multiples

Vous pouvez activer plusieurs méthodes d’authentification en même temps. Chaque fournisseur activé affiche son propre bouton sur la page de connexion, à côté du formulaire standard identifiant/mot de passe. Les utilisateurs choisissent la méthode de leur préférence.

Conservez le formulaire standard activé afin que les administrateurs de la plateforme puissent toujours se connecter, même si un fournisseur externe est mal configuré.

## Priorité d’authentification

Lorsque plusieurs méthodes sont actives, le système vérifie les identifiants dans cet ordre :

1. LDAP (si `force_as_login_method` est défini)
2. Fournisseurs OAuth2 (dans l’ordre où ils apparaissent dans `authentication.yaml`)
3. Base de données interne Chamilo

## Jetons JWT pour l’accès à l’API

Chamilo utilise JWT (JSON Web Tokens) pour son API REST. La durée de vie des jetons et le comportement de rafraîchissement sont configurés dans `config/packages/lexik_jwt_authentication.yaml`. Cela est distinct du flux de connexion SSO et s’applique uniquement aux clients de l’API.

## Dépannage

### Le bouton de connexion n’apparaît pas après la configuration

Le cache doit être vidé après chaque modification de `authentication.yaml` :

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Les utilisateurs ne peuvent pas se connecter via SSO

* **Incohérence de l’URI de redirection** — L’URI enregistré auprès de votre fournisseur d’identité doit correspondre exactement à `https://your-chamilo-url/connect/<provider>/check`.
* **Dérive d’horloge** — Les jetons SSO sont sensibles au temps. Assurez-vous que l’horloge du serveur est synchronisée (NTP).
* **Certificat SSL** — Chamilo doit faire confiance au certificat du fournisseur d’identité. Vérifiez les problèmes liés aux certificats auto-signés.
* **Journaux** — Consultez `var/log/` et les journaux de votre fournisseur d’identité pour les messages d’erreur spécifiques.

### Les utilisateurs sont créés avec le mauvais rôle

Vérifiez la configuration de correspondance des rôles pour le fournisseur. Les nouveaux utilisateurs se voient attribuer par défaut le rôle étudiant, sauf si une correspondance de groupe ou d’attribut les promeut.

### Les utilisateurs existent chez le fournisseur mais ne peuvent pas accéder à Chamilo

* Si `allow_create_new_users` est false, l’utilisateur doit déjà posséder un compte Chamilo dont l’e-mail ou l’identifiant correspond aux données du fournisseur.
* Vérifiez que l’utilisateur n’est pas désactivé dans Chamilo.
* Pour Azure, examinez `existing_user_verification_order` afin de comprendre comment Chamilo associe les utilisateurs entrants aux comptes existants.