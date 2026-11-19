# IDS simple

Chamilo intègre un système de détection d'intrusion (IDS) léger, intégré à l'application. À chaque requête, il analyse les paramètres de requête de l'URL, le chemin de la requête et quelques en-têtes (`User-Agent`, `Referer`) à la recherche de signatures d'attaque courantes — par exemple des charges utiles XSS ou des motifs de traversée de chemin — et journalise tout élément suspect. La page IDS simple vous permet d'examiner ce qui a été signalé.

Les **corps** de requête ne sont volontairement pas analysés, afin d'éviter les faux positifs provenant du contenu des éditeurs de texte enrichi (le texte d'un cours contient légitimement du balisage de type HTML/JavaScript).

## Accéder à l'IDS simple

Depuis le panneau d'administration, cliquez sur **Sécurité > IDS simple**.

## Ce qu'elle affiche

![La page IDS simple affichant des graphiques des événements par jour, des événements par type et des principales adresses IP attaquantes, suivis d'un tableau des événements IDS signalés avec la date, l'adresse IP, le type de détection, le paramètre, l'URI et le détail](../../.gitbook/assets/admin-security-simple-ids.png)

* **Événements par jour (7 derniers jours)**, **Événements par type (30 derniers jours)** et **Principales adresses IP attaquantes (30 derniers jours)** — Graphiques de synthèse
* **Tableau des événements IDS signalés** — Chaque entrée indique la date, l'adresse IP source, le type de détection (par exemple `XSS`), le paramètre concerné, l'URI de la requête et une brève description de ce qui a été détecté

Utilisez les filtres **IP**, type d'événement et plage de dates situés au-dessus des graphiques pour affiner les résultats.

## Fonctionnement

* Chaque requête est analysée à l'entrée ; les correspondances sont ajoutées à `var/logs/ids/ids_events.log`
* À la sortie, le même abonné ajoute à la réponse les en-têtes de sécurité recommandés par l'OWASP
* Si le blocage est activé, une requête correspondant à une signature est immédiatement interrompue par une réponse HTTP 400, au lieu d'atteindre le code de votre application

## Configuration

L'IDS simple est contrôlé par des variables d'environnement, définies dans `config/packages/chamilo_ids.yaml` :

| Variable | Objet |
|----------|---------|
| `IDS_ENABLED` | Active ou désactive l'analyse et la journalisation des requêtes |
| `IDS_BLOCK` | Lorsqu'elle est activée, une requête détectée est rejetée (HTTP 400) au lieu d'être seulement journalisée |
| `IDS_SECURITY_HEADERS` | Détermine si les en-têtes de réponse recommandés par l'OWASP sont ajoutés |

Il s'agit d'un détecteur léger, au mieux de ses possibilités, destiné à repérer les tentatives évidentes d'analyse et d'exploitation — il ne remplace pas un pare-feu applicatif web (WAF) dédié pour les déploiements à haut risque.