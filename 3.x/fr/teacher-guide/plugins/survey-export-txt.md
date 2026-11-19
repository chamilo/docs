# Export TXT d'enquête

Export TXT d'enquête <img src="../../.gitbook/assets/icons/mdi-file-outline.svg" alt="Export TXT d'enquête" data-size="line"> exporte les résultats d'une enquête vers un fichier texte brut lisible par l'humain — un bloc par répondant, listant chaque question, la ou les réponses choisies et toute réponse en texte libre, au lieu des lignes et colonnes d'un CSV.

## Exportation d'une enquête

Une fois activé, la liste de l'outil **Enquêtes** de votre cours affiche une icône **Exporter** sur chaque ligne d'enquête. Cliquez dessus pour télécharger les résultats sous forme de fichier `.txt`.

## Contenu du fichier

* Les enquêtes anonymes affichent « Anonyme » au lieu des informations d'identité ; les enquêtes non anonymes incluent le nom et le nom d'utilisateur du répondant
* Les réponses de chaque répondant sont séparées par une ligne de séparation, ce qui facilite la lecture du fichier de haut en bas
* Si aucune réponse n'est éligible à l'exportation, le fichier l'indique simplement au lieu d'échouer

## Conseils

* **Mieux pour la lecture, CSV pour l'analyse** — Utilisez ce format lorsque vous souhaitez lire les réponses directement ; utilisez [Export CSV d'enquête](survey-export-csv.md) si vous prévoyez d'ouvrir les résultats dans un tableur