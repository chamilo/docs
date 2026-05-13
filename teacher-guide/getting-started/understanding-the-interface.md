# Comprendre l'interface

Chamilo 2.0 possède une interface claire et moderne conçue pour simplifier la navigation. Cette page explique en détail chaque partie de l'interface.

## La barre supérieure

![La barre supérieure avec les éléments annotés incluant le logo, la boîte de réception, le ticket de support et l'avatar de l'utilisateur](/.gitbook/assets/top-bar-annotated.png)

La barre supérieure est toujours visible en haut de chaque page. Elle contient :

* **Logo de la plateforme** — Cliquez dessus pour retourner à la page d'accueil à tout moment.
* **Icône de la boîte de réception** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Boîte de réception" data-size="line"> — Affiche vos messages. Un badge rouge indique des messages non lus. Cliquez pour ouvrir votre boîte de réception.
* **Icône de ticket de support** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Si activé par votre administrateur, cela vous donne accès au système de tickets de support.
* **Votre avatar** — Une image circulaire dans le coin supérieur droit. Cliquez dessus pour ouvrir un menu déroulant avec des liens vers votre profil, les paramètres de compte et la déconnexion.

## La barre latérale

La barre latérale à gauche est votre principale navigation. Elle peut être réduite pour laisser plus d'espace à la zone de contenu. Cliquez sur la flèche de bascule à son bord droit pour l'agrandir ou la réduire. Chamilo mémorise votre préférence.

La barre latérale contient les liens suivants (certains peuvent être masqués en fonction de la configuration de votre plateforme) :

![Le panneau de navigation de la barre latérale dans son état déployé montrant tous les éléments du menu](/.gitbook/assets/sidebar-expanded.png)

| Élément du menu | Icône | Description |
|-----------------|-------|-------------|
| **Accueil** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Accueil" data-size="line"> | Retourne au tableau de bord principal |
| **Mes cours** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Cours" data-size="line"> | Liste tous les cours auxquels vous êtes inscrit |
| **Mes sessions** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Liste vos sessions de formation (actuelles, passées, à venir) |
| **Explorer plus de cours** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Parcourez le catalogue de cours pour trouver de nouveaux cours |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Votre calendrier personnel et de cours |
| **Rapports** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Rapports" data-size="line"> | Accédez au suivi des apprenants et aux rapports de cours |
| **Réseau social** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Réseau social" data-size="line"> | Connectez-vous avec d'autres utilisateurs, envoyez des messages, rejoignez des groupes |
| **Vidéoconférence** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Vidéo" data-size="line"> | Accédez aux sessions vidéo en direct (si configuré) |
| **Administration** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Administration de la plateforme (visible uniquement pour les administrateurs) |

Tout en bas de la barre latérale, vous trouverez une option **Déconnexion** pour vous déconnecter rapidement lorsque vous avez terminé. Cette option est également disponible dans le menu déroulant de l'icône de votre avatar dans le coin supérieur droit.
Si la plateforme est gérée par des méthodes d'authentification externes, ces options de déconnexion pourraient ne pas être disponibles.

## La zone de contenu principale

La zone centrale de l'écran affiche le contenu de la page actuelle. En haut, vous verrez souvent un **fil d'Ariane** indiquant votre emplacement actuel dans la plateforme (par exemple : Accueil > Musique rock > Documents). Utilisez le fil d'Ariane pour revenir à une page parent.

## La page d'accueil du cours

Lorsque vous entrez dans un cours, vous voyez la **page d'accueil du cours**. Cela est couvert en détail dans la section [Créer votre cours](../creating-your-course/), mais voici un aperçu rapide :

* **Titre du cours** — Affiché de manière proéminente en haut
* **Introduction au cours** — Une description optionnelle en texte enrichi que vous pouvez modifier
* **Grille d'outils** — Une grille d'icônes représentant les outils du cours (Documents, Exercices, Forums, etc.)

En tant qu'enseignant, vous verrez des contrôles supplémentaires :

* **Vue étudiant** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Vue étudiant" data-size="line"> — Activez ceci pour voir le cours tel qu'un étudiant le verrait
* **Modifier l'introduction** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Modifier" data-size="line"> — Modifiez le texte d'introduction du cours
* **Afficher tout / Masquer tout** — Changez rapidement la visibilité de tous les outils pour les étudiants
* **Trier** — Activez le glisser-déposer pour réorganiser les outils sur la page d'accueil

## Couleurs des icônes

Ceci est encore expérimental et pas entièrement complet dans Chamilo 2.0, mais nous essayons d'utiliser les règles suivantes pour tous les boutons et icônes d'action dans l'interface :

* **Vert** pour les actions de création. Cela inclut l'ajout, la création, l'importation, l'évaluation, l'enregistrement et la copie de contenu.
* **Bleu** pour les actions de visualisation. Cela inclut l'exportation, la visualisation, la prévisualisation dans des listes ou des vues détaillées, la recherche et le téléchargement.
* **Orange** pour les actions d'édition. Cela inclut la modification, le déplacement, la configuration, l'activation/désactivation, le masquage et l'affichage.
* **Rouge** pour les actions de suppression/retrait. Cela inclut la suppression, le retrait, la désinscription.
* **Gris** pour les actions d'annulation. Cela signifie simplement laisser les choses en l'état.

## Design adaptatif

Chamilo 2.0 s'adapte à différentes tailles d'écran. Sur un appareil mobile ou une fenêtre de navigateur étroite :

* La barre latérale est masquée par défaut et peut être ouverte en appuyant sur l'icône du menu
* Les cartes de cours s'affichent en une seule colonne au lieu d'une grille
* Les tableaux deviennent défilables horizontalement

Cela signifie que vous et vos apprenants pouvez accéder à la plateforme depuis un téléphone, une tablette ou un ordinateur, mais vous pourriez expérimenter l'interface légèrement différemment.