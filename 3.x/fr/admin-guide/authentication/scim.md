# SCIM

**SCIM** (System for Cross-domain Identity Management) automatise le provisionnement des utilisateurs — création, mise à jour et désactivation des comptes Chamilo en fonction des modifications dans votre fournisseur d'identité. Contrairement à OAuth2 ou à LDAP, SCIM gère le provisionnement, et non la connexion.

| Scénario | Action SCIM |
|----------|-------------|
| Un nouvel employé rejoint l'organisation | Crée un compte Chamilo |
| Le nom ou le rôle d'un employé change | Met à jour le compte Chamilo |
| Un employé quitte l'organisation | Désactive ou supprime le compte Chamilo |

## Configuration

### 1. Définir le jeton SCIM

Dans votre fichier `.env` (ou `.env.local`), définissez un jeton aléatoire sécurisé :

```
SCIM_TOKEN=your-secure-random-token
```

Ce jeton est utilisé par votre fournisseur d'identité pour authentifier ses requêtes auprès des points de terminaison SCIM de Chamilo.

### 2. Activer SCIM dans authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

> **Avertissement :** Avec `auth_source: platform`, les utilisateurs provisionnés peuvent également se connecter via le formulaire de connexion habituel. Chamilo leur attribue un mot de passe aléatoire, de sorte qu'ils ne peuvent pas l'utiliser sauf si un administrateur en définit un. Avant la version 3.0.2, le mot de passe était fixe : voir [Mots de passe prévisibles des utilisateurs SSO et SCIM](../installation/upgrading.md#predictable-passwords-of-sso-and-scim-users).

Videz et préchauffez le cache après modification :

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configurer votre fournisseur d'identité

Dans votre fournisseur d'identité (Azure AD, Okta, etc.) :

1. Ajoutez Chamilo en tant qu'application SCIM
2. Définissez l'URL de base SCIM sur `https://your-chamilo-url/scim/v2/`
3. Saisissez le jeton de l'étape 1 comme jeton bearer
4. Associez les attributs du fournisseur aux champs standard SCIM (userName, name.givenName, name.familyName, emails)
5. Activez le provisionnement automatique

## Points de terminaison SCIM

Chamilo implémente SCIM 2.0 :

| Point de terminaison | Méthode | Action |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Lister les utilisateurs |
| `/scim/v2/Users` | POST | Créer un utilisateur |
| `/scim/v2/Users/{id}` | GET | Obtenir un utilisateur |
| `/scim/v2/Users/{id}` | PUT | Remplacer un utilisateur |
| `/scim/v2/Users/{id}` | PATCH | Mettre à jour un utilisateur |
| `/scim/v2/Users/{id}` | DELETE | Supprimer un utilisateur |

## Conseils

* **Commencez par un groupe de test** — provisionnez un petit ensemble d'utilisateurs avant d'activer SCIM pour l'ensemble de l'organisation.
* **Combinez avec OAuth2** — une configuration courante utilise Azure AD OAuth2 pour la connexion et Azure AD SCIM pour le provisionnement.
* **Surveillez les journaux** — consultez à la fois les journaux de Chamilo (`var/log/`) et les journaux de provisionnement de votre fournisseur d'identité pour détecter les erreurs.