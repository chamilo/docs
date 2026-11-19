# Client IMS/LTI

Le client IMS/LTI <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="Client IMS/LTI" data-size="line"> vous permet de lancer un outil externe ou un fournisseur de contenu depuis votre cours à l'aide de la norme LTI (versions 1.1 et 1.3) — par exemple, un manuel interactif d'un éditeur, un outil de simulation spécialisé ou une autre plateforme compatible LTI. Chamilo agit comme la plateforme de lancement ; le service externe est l'« outil ».

## Accéder à l'outil

Une fois activé, un bouton **Configurer les outils externes** apparaît dans les **Paramètres** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Paramètres" data-size="line"> de votre cours. À partir de là, vous pouvez :

* **Ajouter un nouvel outil externe** — Enregistrez-le vous-même : nom, URL de lancement, version LTI et identifiants fournis par le service externe (identifiant client/clés pour LTI 1.3, ou clé consommateur et secret pour LTI 1.1)
* **Ajouter un outil global existant** — Si votre administrateur a déjà enregistré un outil à l'échelle de la plateforme, ajoutez-le à votre cours au lieu de créer votre propre connexion

Une fois ajouté, l'outil apparaît comme un outil ou un raccourci classique sur la page d'accueil de votre cours.

## Ce que vous pouvez configurer

Pour un outil que vous avez enregistré vous-même : s'il s'ouvre dans un iframe ou une nouvelle fenêtre, si le nom, l'adresse e-mail et la photo de l'apprenant sont partagés avec le service externe, les paramètres de lancement personnalisés et (pour LTI 1.3) la prise en charge du Deep Linking. Si l'outil prend en charge l'Assignment and Grades Service, vous pouvez également créer une colonne liée du carnet de notes afin que les scores qu'il renvoie alimentent votre carnet de notes Chamilo.

Pour un outil ajouté à partir d'une définition « globale » à l'échelle de la plateforme, vous ne pouvez ajuster que ces options de présentation et de confidentialité au niveau du cours — les identifiants de connexion eux-mêmes appartiennent à la personne qui a enregistré l'outil de base (généralement votre administrateur).

## Conseils

* **Obtenez d'abord les identifiants auprès du fournisseur de l'outil** — Vous aurez besoin de l'URL de lancement et soit des informations client/clé LTI 1.3, soit d'une clé consommateur et d'un secret LTI 1.1 avant de pouvoir enregistrer un nouvel outil
* **Soyez attentif à ce que vous partagez** — N'activez le partage du nom, de l'adresse e-mail ou de la photo d'un apprenant avec un service externe que si l'outil en a réellement besoin
* **Interrogez votre administrateur au sujet des outils globaux** — Si le même outil externe est utilisé dans de nombreux cours, un enregistrement à l'échelle de la plateforme évite que chaque enseignant configure sa propre connexion séparément