# Serveur d'autorisation OAuth 2.1 et clients MCP

Chamilo peut agir comme **serveur d'autorisation OAuth** pour les clients qui se connectent à ses ressources protégées. Il s'agit d'une fonctionnalité distincte de la [connexion OAuth2](oauth2.md), dans laquelle Chamilo utilise un fournisseur d'identité externe pour authentifier les utilisateurs.

## Activer et configurer

Sous **Administration > Paramètres de configuration > Sécurité**, activez `security.oauth_server_enabled`. L'accès MCP dépend également de la configuration existante `security.mcp_enabled` et du rôle MCP autorisé pour l'utilisateur.

Le serveur expose les routes standard d'autorisation, de jeton, d'enregistrement et de révocation (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) ainsi que les métadonnées de découverte. Seul HTTPS doit être utilisé pour les clients de production.

## Enregistrer un client

Chamilo prend en charge les clients publics de type authorization code avec PKCE et les clients confidentiels enregistrés. L'enregistrement dynamique de clients (DCR) utilise `/oauth/register` et est soumis à une limitation de débit. Le paramètre `security.dynamic_client_registration` est **désactivé par défaut** ; le point de terminaison reste disponible pour le flux d'enregistrement MCP pris en charge, tandis que le paramètre contrôle les portées de client supplémentaires acceptées lors de l'enregistrement. Ne supposez pas que l'activation de ce paramètre rende disponibles des API protégées arbitraires.

Les clients enregistrés disposent d'une liste côté serveur de **ressources autorisées**. Actuellement, le registre des ressources ne définit que la ressource **MCP** et la portée `mcp`. De nouvelles ressources protégées nécessitent une implémentation serveur explicite et des décisions d'autorisation, et non le simple ajout d'une URL non reconnue à une requête. Chamilo valide les paramètres `resource` de la RFC 8707 tout au long du traitement de l'autorisation et des jetons.

## Consentement de l'utilisateur et audit

1. Un client initie une requête authorization code avec PKCE (`S256`) et la portée/ressource demandée.
2. L'utilisateur s'authentifie avec sa connexion Chamilo habituelle si nécessaire.
3. Chamilo affiche l'identité du client, les détails d'enregistrement et l'accès demandé sur un écran de consentement.
4. L'utilisateur sélectionne **Autoriser** ou **Refuser**. Une approbation est enregistrée dans l'historique de consentement du serveur, et les informations d'approbation antérieures peuvent être affichées lors de requêtes ultérieures.

Le consentement est lié à la requête présentée à l'utilisateur. Une requête approuvée n'accorde pas d'autres ressources protégées ni un accès arbitraire au-delà des autorisations demandées.

## Notes de déploiement et de sécurité

Les mises à jour OAuth 2.1 introduisent un champ de ressources autorisées pour les clients et des enregistrements persistants de consentement client. Appliquez les **migrations de base de données Chamilo spécifiques** fournies avec la version avant d'activer le flux mis à jour. Conservez la confidentialité des URL de rappel et des secrets de client OAuth. L'enregistrement d'un client n'accorde pas un accès illimité aux utilisateurs ou aux cours Chamilo.

Référence d'implémentation : [Enregistrement et consentement des clients OAuth, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).