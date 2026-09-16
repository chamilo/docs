# Configuration de l'IA

Chamilo 2.0 inclut des fonctionnalités alimentées par l'IA qui nécessitent une configuration avant de devenir disponibles pour les enseignants et les apprenants.

## Fournisseurs d'IA pris en charge

Chamilo prend en charge plusieurs fournisseurs d'IA :

| Fournisseur | Capacités |
|-------------|-----------|
| **DeepSeek** | Génération de texte |
| **Google Gemini** | Génération de texte, d'image et de vidéo |
| **Grok** | Génération de texte, d'image et de vidéo |
| **Mistral** | Génération de texte |
| **OpenAI** | Génération de texte, d'image et de vidéo |

Chaque fournisseur peut être configuré pour différents types de tâches d'IA :

* **Texte** — Utilisé pour la génération d'exercices, la génération de parcours d'apprentissage, l'évaluation par IA et le tuteur IA
* **Image** — Utilisé pour la génération d'images par IA
* **Vidéo** — Utilisé pour la génération de vidéos par IA (lorsque pris en charge)
* **Document** — Utilisé pour l'analyse de documents par IA

## Étapes de configuration

### 1. Obtenir des clés API

Inscrivez-vous pour un compte auprès du fournisseur d'IA de votre choix et obtenez une clé API :

* **DeepSeek** : [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini** : Google AI Studio ou Google Cloud
* **Grok** : [console.x.ai](https://console.x.ai/)
* **Mistral** : [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI** : [platform.openai.com](https://platform.openai.com/)

### 2. Configurer les fournisseurs dans Chamilo

![La page de configuration des assistants IA affichant les paramètres des fournisseurs avec les champs clé API, modèle et endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Dans les paramètres de la plateforme, accédez à la section **Assistants IA** :

1. **Activer les assistants IA** — Activez les fonctionnalités IA de manière globale
2. **Configurer les fournisseurs d'IA** — Ajoutez un ou plusieurs fournisseurs avec :
   * **Nom du fournisseur** (deepseek, gemini, grok, mistral, openai)
   * **Clé API** — Votre clé API pour le fournisseur
   * **Modèle** — Le modèle spécifique à utiliser (par exemple, `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL API** — L'URL du point de terminaison (préconfigurée pour les fournisseurs standards)

Vous pouvez configurer plusieurs fournisseurs. Le premier fournisseur dans la configuration devient celui par défaut.

### 3. Activer les fonctionnalités par cours

Les fonctionnalités IA peuvent être activées ou désactivées au niveau de chaque cours. Les enseignants peuvent activer ou désactiver :

* **Chatbot Tuteur IA** — L'assistant IA pour les apprenants
* **Évaluateur de travaux** — Recommandation d'évaluation générée par IA
* **Générateur d'exercices** — Questions de quiz générées par IA
* **Générateur de parcours d'apprentissage** — Séquences d'apprentissage générées par IA
* **Générateur d'images/vidéos** — Images et vidéos générées par IA dans les documents

Cela permet à différents cours d'utiliser des configurations IA adaptées à leurs besoins.

## Considérations sur les coûts

Les appels API IA ont des coûts associés. Prenez en compte :

* **Définir des limites d'utilisation** — Surveillez et limitez l'utilisation de l'API IA pour contrôler les coûts
* **Choisir les modèles judicieusement** — Des modèles plus petits et moins coûteux peuvent suffire pour de nombreuses tâches éducatives
* **Suivre l'utilisation** — Chamilo enregistre les requêtes IA pour vous aider à surveiller la consommation

## Conseils

* **Commencez avec un seul fournisseur** — Configurez et testez un fournisseur avant d'en ajouter d'autres
* **Testez avec un cours** — Activez les fonctionnalités IA dans un cours de test pour vérifier qu'elles fonctionnent comme prévu
* **Communiquez avec les enseignants** — Informez les enseignants des fonctionnalités IA disponibles et de la manière de les utiliser
* **Surveillez la qualité** — Examinez régulièrement le contenu généré par IA pour vous assurer qu'il répond à vos standards éducatifs
