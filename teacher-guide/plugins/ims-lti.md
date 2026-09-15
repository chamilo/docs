# Client IMS/LTI

Le client IMS/LTI <img src="/.gitbook/assets/icons/mdi-link-variant.svg" alt="Client IMS/LTI" data-size="line"> vous permet de lancer un outil externe ou un fournisseur de contenu depuis l’intérieur de votre cours en utilisant le standard LTI (versions 1.1 et 1.3) — par exemple, un manuel interactif d’un éditeur, un outil de simulation spécialisé, ou une autre plateforme qui prend en charge LTI. Chamilo agit comme plateforme de lancement ; le service externe est l’« outil ».

## Accéder à l’outil

Une fois activé, un bouton **Configurer les outils externes** apparaît dans les **Paramètres** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Paramètres" data-size="line"> de votre cours. À partir de là, vous pouvez soit :

* **Ajouter un nouvel outil externe** — Enregistrer vous-même un outil : nom, URL de lancement, version LTI, et les identifiants que le service externe vous a fournis (ID client/clés pour LTI 1.3, ou une clé consommateur et un secret pour LTI 1.1)
* **Ajouter un outil global existant** — Si votre administrateur a déjà enregistré un outil à l’échelle de la plateforme, l’ajouter à votre cours au lieu de créer votre propre connexion

Une fois ajouté, l’outil apparaît comme un outil/raccourci habituel sur la page d’accueil de votre cours.

## Ce que vous pouvez configurer

Pour un outil que vous avez enregistré vous-même : s’il s’ouvre dans une iframe ou une nouvelle fenêtre, si le nom, l’e-mail et la photo de l’apprenant sont partagés avec le service externe, les paramètres de lancement personnalisés, et (pour LTI 1.3) la prise en charge du Deep Linking. Si l’outil prend en charge le service Assignment and Grades, vous pouvez également créer une colonne de carnet de notes liée afin que les scores qu’il renvoie alimentent le carnet de notes Chamilo.

Pour un outil ajouté à partir d’une définition « globale » à l’échelle de la plateforme, vous ne pouvez ajuster que ces options de présentation et de confidentialité au niveau du cours — les identifiants de connexion eux-mêmes appartiennent à la personne qui a enregistré l’outil de base (généralement votre administrateur).

## Conseils

* **Obtenez d’abord les identifiants auprès du fournisseur de l’outil** — Vous aurez besoin de l’URL de lancement et soit des détails client/clé LTI 1.3, soit d’une clé consommateur et d’un secret LTI 1.1 avant de pouvoir enregistrer un nouvel outil
* **Soyez volontaire quant à ce que vous partagez** — N’activez le partage du nom, de l’e-mail ou de la photo d’un apprenant avec un service externe que si l’outil en a réellement besoin
* **Demandez à votre administrateur des outils globaux** — Si le même outil externe est utilisé dans de nombreux cours, un enregistrement à l’échelle de la plateforme évite que chaque enseignant configure sa propre connexion séparément