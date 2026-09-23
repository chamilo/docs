# Simple IDS

Chamilo intègre un système de détection d’intrusion (IDS) léger, au sein de l’application. À chaque requête, il analyse les paramètres de requête de l’URL, le chemin de la requête et quelques en-têtes (`User-Agent`, `Referer`) à la recherche de signatures d’attaque courantes — par exemple des charges XSS ou des motifs de traversée de chemin — et consigne tout élément suspect. La page Simple IDS vous permet d’examiner ce qui a été signalé.

Les **corps** de requête ne sont volontairement pas analysés, afin d’éviter les faux positifs provenant du contenu des éditeurs de texte enrichi (le texte des cours contient légitimement du balisage de type HTML/JavaScript).

## Accéder à Simple IDS

Depuis le panneau d’administration, cliquez sur **Sécurité > Simple IDS**.

## Ce qu’elle affiche

![La page Simple IDS présentant des graphiques des événements par jour, des événements par type et des principales adresses IP attaquantes, suivis d’un tableau des événements IDS signalés avec la date, l’adresse IP, le type de détection, le paramètre, l’URI et le détail](../../.gitbook/assets/admin-security-simple-ids.png)

* **Événements par jour (7 derniers jours)**, **Événements par type (30 derniers jours)** et **Principales adresses IP attaquantes (30 derniers jours)** — Graphiques de synthèse
* **Tableau des événements IDS signalés** — Chaque entrée indique la date, l’adresse IP source, le type de détection (par exemple `XSS`), le paramètre concerné, l’URI de la requête et une brève description de ce qui a été détecté

Utilisez les filtres **IP**, type d’événement et plage de dates au-dessus des graphiques pour affiner les résultats.

## Fonctionnement

* Chaque requête est analysée à l’entrée ; les correspondances sont ajoutées à `var/logs/ids/ids_events.log`
* À la sortie, le même abonné ajoute les en-têtes de sécurité recommandés par l’OWASP à la réponse
* Si le blocage est activé, une requête correspondant à une signature est interrompue immédiatement par une réponse HTTP 400, sans atteindre le code de l’application

## Configuration

Simple IDS est contrôlé par des variables d’environnement, définies dans `config/packages/chamilo_ids.yaml` :

| Variable | Objet |
|----------|---------|
| `IDS_ENABLED` | Active ou désactive l’analyse des requêtes et la journalisation |
| `IDS_BLOCK` | Lorsqu’elle est activée, une requête détectée est rejetée (HTTP 400) au lieu d’être seulement consignée |
| `IDS_SECURITY_HEADERS` | Contrôle l’ajout des en-têtes de réponse recommandés par l’OWASP |

Il s’agit d’un détecteur léger, de type « meilleur effort », destiné à intercepter les tentatives évidentes de balayage et d’exploitation — il ne remplace pas un pare-feu d’application web (WAF) dédié pour les déploiements à haut risque.