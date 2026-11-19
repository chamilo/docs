# Émission et vérification des Open Badges 2.0

Chamilo 3.1 peut publier des justificatifs **Open Badges 2.0** pour les compétences acquises, y compris une image de badge qui contient une assertion intégrée dans les métadonnées PNG. La vérification des badges utilise des points d'accès publics pour le badge, l'assertion et l'émetteur.

## Configurer l'émetteur et les compétences

1. Définissez le **nom de l'institution** de la plateforme et une **adresse e-mail de contact de l'administrateur** valide ; les deux sont requis par le profil de l'émetteur.
2. Configurez la compétence avec un titre, une description et des critères de badge.
3. Joignez une image de badge PNG valide lorsque cela est approprié. Chamilo peut également utiliser son image de badge par défaut si la compétence ne dispose d'aucun élément personnalisé.
4. Attribuez ou validez l'acquisition de la compétence pour l'apprenant via le flux de travail habituel des compétences.

Les justificatifs dépendent de la relation de compétence acquise. Une assertion de compétence révoquée ou qui n'est plus acquise est signalée comme révoquée. Les ressources de compétence et de badge sont limitées à l'URL d'accès appropriée.

## Données de vérification publiques

Chaque émission dispose d'une assertion hébergée. Les URL associées sont dérivées de la racine publique de l'application et comprennent :

- `main/skills/assertion.php?issue=<issue-id>` — assertion JSON pour une émission de compétence spécifique.
- `main/skills/class.php?id=<skill-id>` — métadonnées de la classe de badge, y compris les critères et la référence de l'émetteur.
- `main/skills/issuer.php` — profil de l'institution émettrice.
- `main/skills/image.php?id=<skill-id>` — ressource d'image du badge.

Les URL générées exactes dépendent du chemin de base public de l'installation. L'assertion inclut un hachage salé de l'adresse e-mail du destinataire au lieu de publier l'adresse e-mail en clair, et identifie l'émetteur et la compétence acquise. Le PNG du badge peut inclure l'assertion dans un fragment iTXt `openbadges`.

## Valider un badge émis

Ouvrez les points d'accès de l'assertion hébergée, de la classe de badge et de l'émetteur sans session connectée. Ils doivent renvoyer un justificatif lié cohérent. Téléchargez le PNG émis via le flux d'exportation pris en charge par la compétence et vérifiez que son assertion intégrée correspond à la représentation hébergée. Si la compétence est révoquée, vérifiez que la vérification reflète son état révoqué.

Un PNG contenant uniquement l'illustration visuelle du badge ne **prouve pas** un justificatif valide. Ne confondez pas l'émission Open Badges 2.0 avec une fonctionnalité sans rapport de certificat ou de PDF signé.

Voir [Gérer les compétences](managing-skills.md) et [Vérification des certificats signés](../maintenance/signed-certificate-verification.md). Implémentation : [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).