# Modèles

Chamilo utilise des modèles pour les certificats, les documents et les courriels. Vous pouvez personnaliser ces modèles pour qu'ils correspondent à l'image de marque et aux exigences de votre organisation.

## Modèles de certificats

Les modèles de certificats définissent la mise en page et le contenu des certificats décernés aux apprenants qui atteignent les seuils du carnet de notes.

### Personnalisation d'un modèle de certificat

Les modèles de certificats utilisent HTML et CSS avec des variables de substitution :

| Variable | Remplacée par |
|----------|---------------|
| Nom de l'étudiant | Le nom complet de l'apprenant |
| Nom du cours | Le nom du cours |
| Date | La date à laquelle le certificat a été obtenu |
| Score | Le score final de l'apprenant |
| Code-barres | Un espace réservé pour un code-barres (`((certificate_barcode))`) utilisé pour la vérification |

### Téléversement d'un modèle

1. Accédez à la gestion des modèles de certificats
2. Téléversez ou modifiez le modèle HTML
3. Utilisez les variables de substitution là où le contenu dynamique doit apparaître
4. Enregistrez

## Modèles de documents

Les enseignants peuvent utiliser des modèles de documents lors de la création de contenu dans l'outil Documents. Les modèles fournissent une mise en page de départ pour les types de documents courants.

### Gestion des modèles de documents

1. Accédez à la gestion des modèles dans le panneau d'administration
2. Ajoutez de nouveaux modèles en téléversant des fichiers HTML
3. Les modèles deviennent disponibles pour les enseignants lorsqu'ils créent de nouveaux documents

## Conseils

* **Incluez votre logo** — Ajoutez le logo de votre organisation aux modèles de certificats pour un aspect professionnel
* **Testez avec des données réelles** — Prévisualisez les certificats avec des données réelles d'apprenants avant de déployer le modèle
* **Gardez les modèles simples** — Les conceptions simples s'impriment mieux et ont un aspect professionnel