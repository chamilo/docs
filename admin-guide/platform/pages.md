# Pages

Pages est l’outil intégré de Chamilo, de type CMS, destiné aux blocs de contenu qui composent les zones publiques de votre portail — la page d’accueil, le pied de page, les menus de navigation et des emplacements similaires — sans avoir à modifier un fichier de modèle.

## Accéder à Pages

Depuis le panneau d’administration, cliquez sur **Plateforme > Pages**.

## Fonctionnement de Pages

Chaque page possède :

* un **titre** et un **contenu** en texte enrichi
* un **slug**, généré automatiquement à partir du titre
* **Activée** — indique si la page est actuellement visible
* **Position** — ordonnancement par glisser-déposer au sein de sa catégorie
* **Locale** — le contenu est propre à chaque langue : le même emplacement peut contenir une page par langue, et le site se rabat sur la langue par défaut de la plateforme si aucune page n’existe pour la langue d’un visiteur
* une **catégorie** — c’est elle qui détermine *où* la page est affichée (par exemple `index`, `home`, `footer_public` ou `menu_links`) ; Chamilo crée automatiquement les catégories dont il a besoin

Sur une installation multi-URL (multi-portail), les pages sont également limitées par URL d’accès, de sorte que chaque portail gère son propre contenu.

## La page d’introduction à l’inscription

**Plateforme > Définir la page d’inscription** est un raccourci vers ce même système Pages pour un emplacement précis : le texte d’introduction affiché au-dessus du formulaire public d’inscription. Il est réservé aux administrateurs de portail. En cliquant dessus, vous :

* ouvrez la page d’introduction existante pour la modifier, si une page existe déjà pour votre URL d’accès et votre langue, ou
* créez l’emplacement à la volée et passez directement à la création de son contenu

Tout ce que vous enregistrez ici s’affiche sous forme d’encadré d’information directement au-dessus du formulaire d’inscription — un emplacement naturel pour des consignes, des conditions propres à votre organisation, ou un contexte que les utilisateurs potentiels devraient lire avant de s’inscrire. Laissez-la désactivée (ou ne la créez jamais) pour afficher le formulaire d’inscription simple, sans texte d’introduction.