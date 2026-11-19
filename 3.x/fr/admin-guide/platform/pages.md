# Pages

Pages est l'outil intégré de Chamilo, de type CMS, destiné aux blocs de contenu qui composent les zones publiques de votre portail — la page d'accueil, le pied de page, les menus de navigation et les emplacements similaires — sans avoir à modifier un fichier de modèle.

## Accéder à Pages

Depuis le panneau d'administration, cliquez sur **Plateforme > Pages**.

## Fonctionnement de Pages

Chaque page comporte :

* un **titre** et un **contenu** en texte enrichi
* un **slug**, généré automatiquement à partir du titre
* **Activée** — indique si la page est actuellement visible
* **Position** — ordre par glisser-déposer au sein de sa catégorie
* **Locale** — le contenu est propre à chaque langue : le même emplacement peut contenir une page par langue, et le site revient à la langue par défaut de la plateforme si aucune page n'existe pour la langue d'un visiteur
* une **catégorie** — c'est elle qui détermine *où* la page est affichée (par exemple `index`, `home`, `footer_public` ou `menu_links`) ; Chamilo crée automatiquement les catégories dont il a besoin

Sur une installation multi-URL (multi-portail), les pages sont également limitées à chaque URL d'accès, de sorte que chaque portail gère son propre contenu.

## Où apparaît chaque catégorie

Le formulaire de création et d'édition de page se termine par deux schémas qui indiquent où sont affichées les pages de chaque catégorie. Utilisez-les pour choisir la bonne **catégorie** avant de rédiger le contenu.

![Le formulaire d'édition de page, avec les champs titre, URL conviviale, activée, catégorie, langue et contenu, suivi de deux schémas de la page de connexion et de l'interface des utilisateurs connectés, dont les zones bleues sont étiquetées avec les catégories de pages index, faq, demo, footer_public, home, menu_links et footer_private](../../.gitbook/assets/admin-pages-form.png)

* **Page de connexion (visiteurs non connectés)** — les pages `index` occupent la zone principale à côté du formulaire de connexion, et les pages `footer_public` sont affichées dans le pied de page. Les catégories `index`, `faq` et `demo` apparaissent également comme entrées dans la barre supérieure.
* **Interface des utilisateurs connectés** — les pages `home` occupent la zone principale de la page d'accueil. Les pages `menu_links` sont listées dans le menu latéral et les pages `footer_private` sont affichées dans le pied de page.

Les zones bleues mises en évidence sont les emplacements qu'une page peut occuper ; les blocs gris constituent l'interface propre de Chamilo, que les pages ne remplacent pas.

## Catégories de liens de menu

Deux catégories transforment leurs pages activées en une liste de liens (chaque lien affiche le titre de la page et ouvre la page) au lieu d'afficher leur contenu sur place :

* **`menu_links`** — liens affichés à tout le monde : sous le formulaire de connexion pour les visiteurs anonymes, et en bas de la barre latérale gauche pour les utilisateurs connectés. Utilisez-la pour le contenu dont chaque utilisateur peut avoir besoin, comme les mentions légales ou les conditions d'utilisation.
* **`menu_public_links`** — liens affichés **uniquement aux visiteurs anonymes**, sous le formulaire de connexion sur la page d'accueil et sur la page de connexion. Ils disparaissent une fois l'utilisateur connecté. Utilisez-la pour le contenu destiné aux utilisateurs potentiels, comme une présentation de la plateforme ou la procédure de demande de compte.

Lorsque les deux catégories contiennent des pages, les liens `menu_links` sont listés en premier.

## La page d'introduction à l'inscription

**Plateforme > Définir la page d'inscription** est un raccourci vers ce même système Pages pour un emplacement précis : le texte d'introduction affiché au-dessus du formulaire public d'inscription. Il est réservé aux administrateurs de portail. En cliquant dessus, soit :

* la page d'introduction existante s'ouvre pour modification, si une page existe déjà pour votre URL d'accès et votre langue, soit
* l'emplacement est créé à la volée et vous êtes conduit directement à la création de son contenu

Tout ce que vous enregistrez ici est affiché sous forme d'encadré d'information directement au-dessus du formulaire d'inscription — un emplacement naturel pour des consignes, des conditions propres à votre organisation ou un contexte que les utilisateurs potentiels doivent lire avant de s'inscrire. Laissez-la désactivée (ou ne la créez jamais) pour afficher le formulaire d'inscription simple, sans texte d'introduction.

## Publier une page dans toutes les langues

Dans le sélecteur de langue de l'éditeur de page, choisissez **Toutes les langues** lorsque la même page doit être visible quelle que soit la langue d'interface du visiteur. Utilisez plutôt une langue précise pour un contenu localisé. Les pages existantes propres à une langue et le comportement de repli de locale sont conservés ; cette fonctionnalité ne traduit pas automatiquement une page.

Voir [PR pages toutes langues n° 9398](https://github.com/chamilo/chamilo-lms/pull/9398).

## Supprimer plusieurs pages ou des versions linguistiques associées

La liste Pages permet de sélectionner plusieurs entrées et de choisir **Supprimer les pages sélectionnées**. Examinez attentivement la liste de confirmation avant de les supprimer. Lors de la suppression d'une page individuelle, Chamilo peut également afficher des pages candidates dans d'autres langues afin que vous puissiez sélectionner explicitement les versions associées à supprimer.

Les pages dans différentes langues **ne sont pas liées automatiquement**. Ne sélectionnez pas une page au nom similaire, sauf si vous avez vérifié qu'il s'agit de la traduction ou de la contrepartie correcte. Les suppressions sont destructives : examinez donc la sélection et conservez d'abord une copie du contenu CMS important. Voir [PR suppression groupée et multilingue de pages n° 9331](https://github.com/chamilo/chamilo-lms/pull/9331).