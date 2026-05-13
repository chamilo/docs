---
# Visioconférence

Chamilo s'intègre aux plateformes de visioconférence pour permettre des sessions en direct au sein des cours.

## Plateformes prises en charge

### BigBlueButton

**BigBlueButton** (BBB) est un système de conférence web open-source conçu pour l'apprentissage en ligne. C'est la solution de visioconférence la plus couramment utilisée avec Chamilo.

#### Configuration

1. Installez BigBlueButton sur un serveur distinct (voir la [documentation BigBlueButton](https://docs.bigbluebutton.org/))
2. Utilisez la commande bbb-conf --salt sur le serveur BBB pour obtenir les détails d'intégration
3. Dans les paramètres de la plateforme Chamilo, sous **Plugins**, installez le plugin Visioconférence et saisissez sa configuration pour définir :
   * **URL du serveur BBB** — L'adresse de votre serveur BBB
   * **Sel/secret BBB** — Le secret API de votre serveur BBB
4. Enregistrez
5. **Activez** le plugin Visioconférence
6. Certaines fonctionnalités spéciales sont disponibles pour les administrateurs, assurez-vous donc de l'activer dans la région *admin_page*

#### Fonctionnalités disponibles dans Chamilo

* Démarrer/rejoindre des réunions depuis un cours
* Création automatique de salles par cours
* Enregistrements de réunions (si activés)
* Partage d'écran, tableau blanc, salles de sous-groupes
* Chat en parallèle de la vidéo

### Zoom

Chamilo peut également s'intégrer à **Zoom** pour la visioconférence.

#### Configuration

1. Créez une application Zoom dans le Zoom Marketplace
2. Dans Chamilo, configurez les identifiants API de Zoom
3. Activez l'intégration Zoom

#### Fonctionnement

Lorsque Zoom est configuré, les enseignants peuvent créer et lancer des réunions Zoom directement depuis leur cours. Les apprenants rejoignent les réunions via l'interface Chamilo.

## Choisir entre BBB et Zoom

| Fonctionnalité | BigBlueButton | Zoom |
|---------------|--------------|------|
| Coût | Gratuit (open-source), mais nécessite votre propre serveur | Nécessite un abonnement Zoom |
| Hébergement | Auto-hébergé | Hébergé dans le cloud par Zoom |
| Profondeur d'intégration | Profonde (conçu pour une utilisation avec LMS) | Standard |
| Enregistrement | Côté serveur, stocké sur votre infrastructure | Cloud Zoom ou local |
| Tableau blanc | Intégré | Intégré |
| Salles de sous-groupes | Oui | Oui |

## Conseils

* **Serveur séparé pour BBB** — BigBlueButton devrait fonctionner sur un serveur dédié pour une performance optimale, et non sur le même serveur que Chamilo
* **Testez avant les cours** — Testez toujours la configuration de la visioconférence avant une session en direct
* **Vérifiez la bande passante** — Assurez-vous que votre serveur et votre réseau peuvent gérer le nombre attendu d'utilisateurs simultanés