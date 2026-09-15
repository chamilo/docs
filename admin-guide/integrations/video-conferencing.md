# Visioconférence

Chamilo s’intègre aux plateformes de visioconférence afin de permettre des sessions en direct au sein des cours.

## Plateformes prises en charge

### BigBlueButton

**BigBlueButton** (BBB) est un système de webconférence open source conçu pour l’apprentissage en ligne. C’est la solution de visioconférence la plus couramment utilisée avec Chamilo.

#### Configuration

1. Installez BigBlueButton sur un serveur distinct (voir la [documentation BigBlueButton](https://docs.bigbluebutton.org/))
2. Utilisez bbb-conf --salt sur le serveur BBB pour obtenir les informations d’intégration
3. Dans les paramètres de la plateforme Chamilo, **Plugins**, installez le plugin Videoconference et saisissez sa configuration pour définir :
   * **BBB server URL** — L’adresse de votre serveur BBB
   * **BBB salt/secret** — Le secret d’API de votre serveur BBB
4. Enregistrez
5. **Activez** le plugin Videoconference
6. Certaines fonctionnalités spéciales sont disponibles pour les administrateurs ; veillez donc à l’activer dans la région *admin_page*

#### Fonctionnalités disponibles dans Chamilo

* Démarrer/rejoindre des réunions depuis un cours
* Création automatique d’une salle par cours
* Enregistrements des réunions (si activés)
* Partage d’écran, tableau blanc, salles de sous-groupe
* Chat en parallèle de la vidéo

### Zoom

Chamilo peut également s’intégrer à **Zoom** pour la visioconférence.

#### Configuration

1. Créez une application Zoom dans le Zoom Marketplace
2. Dans Chamilo, configurez les identifiants de l’API Zoom
3. Activez l’intégration Zoom

#### Fonctionnement

Lorsque Zoom est configuré, les enseignants peuvent créer et lancer des réunions Zoom depuis leur cours. Les apprenants rejoignent la session via l’interface Chamilo.

## Choisir entre BBB et Zoom

| Fonctionnalité | BigBlueButton | Zoom |
|---------|--------------|------|
| Coût | Gratuit (open source), mais nécessite votre propre serveur | Nécessite un abonnement Zoom |
| Hébergement | Auto-hébergé | Hébergé dans le cloud par Zoom |
| Profondeur d’intégration | Profonde (conçue pour un usage LMS) | Standard |
| Enregistrement | Côté serveur, stocké sur votre infrastructure | Cloud Zoom ou local |
| Tableau blanc | Intégré | Intégré |
| Salles de sous-groupe | Oui | Oui |

## Conseils

* **Serveur distinct pour BBB** — BigBlueButton doit s’exécuter sur son propre serveur dédié pour de meilleures performances, et non sur le même serveur que Chamilo
* **Tester avant les cours** — Testez toujours la configuration de visioconférence avant une session en direct
* **Vérifier la bande passante** — Assurez-vous que votre serveur et votre réseau peuvent prendre en charge le nombre d’utilisateurs simultanés prévu