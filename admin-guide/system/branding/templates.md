# Modèles

Chamilo utilise des modèles pour les certificats, les documents et les e-mails. Vous pouvez personnaliser ces modèles afin qu’ils correspondent à l’identité visuelle et aux exigences de votre organisation.

## Modèles de certificats

Les modèles de certificats définissent la mise en page et le contenu des certificats délivrés aux apprenants qui atteignent les seuils du carnet de notes.

### Personnaliser un modèle de certificat

Les modèles de certificats utilisent HTML et CSS avec des variables d’espace réservé :

| Variable | Remplacée par |
|----------|-------------|
| Student name | Le nom complet de l’apprenant |
| Course name | Le nom du cours |
| Date | La date d’obtention du certificat |
| Score | Le score final de l’apprenant |
| Barcode | Un espace réservé de code-barres (`((certificate_barcode))`) utilisé pour la vérification |

### Téléverser un modèle

1. Accédez à la gestion des modèles de certificats
2. Téléversez ou modifiez le modèle HTML
3. Utilisez les variables d’espace réservé là où le contenu dynamique doit apparaître
4. Enregistrez

## Modèles de documents

Les enseignants peuvent utiliser des modèles de documents lors de la création de contenu dans l’outil Documents. Les modèles fournissent une mise en page de départ pour les types de documents courants.

### Gérer les modèles de documents

1. Accédez à la gestion des modèles dans le panneau d’administration
2. Ajoutez de nouveaux modèles en téléversant des fichiers HTML
3. Les modèles deviennent disponibles pour les enseignants lorsqu’ils créent de nouveaux documents

## Conseils

* **Incluez votre logo** — Ajoutez le logo de votre organisation aux modèles de certificats pour un rendu professionnel
* **Testez avec des données réelles** — Prévisualisez les certificats avec les données réelles des apprenants avant de déployer le modèle
* **Gardez les modèles simples** — Les conceptions simples s’impriment mieux et ont un aspect professionnel