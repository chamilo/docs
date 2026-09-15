# Outils de la plateforme

Cette page couvre les éléments restants, plus modestes, du bloc de gestion de la plateforme.

## Extra Fields

**Platform > Extra fields** est un sélecteur de type, et non une liste de champs en soi — il affiche chaque type d’objet prenant en charge des champs personnalisés, et un clic sur l’un d’eux mène à l’éditeur de champs propre à ce type. Les types disponibles comprennent : user, course, session, question, learning path (ainsi que learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event et portfolio (plus scheduled announcements, si cette fonctionnalité est activée).

Pour le cas le plus courant — les champs personnalisés du profil utilisateur — voir [Profilage des utilisateurs](../users/user-profiling.md), qui couvre la même fonctionnalité sous-jacente du côté de la gestion des utilisateurs.

## Mail Templates

**Platform > Mail templates** vous permet de remplacer le libellé de certains e-mails système (confirmation d’inscription, notifications d’abonnement, et similaires) sans toucher aux fichiers du serveur. Chaque modèle possède un titre, un **type** correspondant à l’e-mail intégré précis qu’il remplace, le corps du modèle lui-même (texte brut/Twig, pas un éditeur riche) et un indicateur « définir par défaut » — un seul modèle par type peut être le défaut actif. Les modèles sont limités par URL d’accès ; il n’y a pas de champ distinct par langue, donc la gestion linguistique de ces e-mails est celle que le code environnant applique déjà.

Les modèles sont rendus via un environnement Twig **sandboxé** pour la sécurité : seul un petit ensemble de balises et de filtres est autorisé, et les seules données disponibles sont l’objet `User` du destinataire, référencé par `user.getEmail()`, `user.getFirstname()` et des accesseurs similaires (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Tout ce qui sort de cette liste blanche ne produit pas d’erreur visible — il est rendu silencieusement vide, ce qui ramène alors au modèle intégré d’origine. Conservez vos modèles personnalisés simples et testez-les (en déclenchant une véritable inscription ou notification) après modification.

## Contact Form Categories

**Platform > Contact form categories** gère la liste déroulante affichée sur le formulaire public **Contact us** de votre portail. Chaque catégorie n’est qu’un titre et une adresse e-mail de destination — la catégorie choisie par un visiteur détermine la boîte de réception vers laquelle son message est acheminé. Utilisez ceci pour diriger différents sujets (support, ventes, admissions) vers différentes équipes sans créer de formulaires séparés.

## Raccourcis vers les catégories de paramètres

Quelques éléments du bloc sont simplement des liens directs vers des catégories précises des [Paramètres de la plateforme](../platform-settings/README.md), plutôt que des outils distincts :

* **Plugins** et **System templates** ouvrent les paramètres de configuration préfiltrés sur ces catégories
* **Regions** fait de même, pour les paramètres de régions de la plateforme

## Éléments visibles occasionnellement

Quelques éléments n’apparaissent que lorsque le paramètre ou le plugin concerné est actif, de sorte que vous pourriez ne pas les voir sur votre installation :

* **Terms and Conditions** — apparaît lorsque **Allow terms and conditions** est activé, pour gérer le texte que les utilisateurs doivent accepter
* **Notifications** — apparaît lorsque la fonctionnalité d’événements de notification de la plateforme est activée
* **CMS**, **Dictionary**, **Justification** — chacun lié à son propre plugin optionnel installé et activé