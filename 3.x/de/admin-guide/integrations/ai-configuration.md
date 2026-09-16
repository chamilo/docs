# KI-Konfiguration

Chamilo 3.0 enthält KI-gestützte Funktionen, die konfiguriert werden müssen, bevor sie Lehrenden und Lernenden zur Verfügung stehen.

## Unterstützte KI-Anbieter

Chamilo unterstützt mehrere KI-Anbieter:

| Anbieter | Fähigkeiten |
|----------|-------------|
| **DeepSeek** | Textgenerierung |
| **Google Gemini** | Text-, Bild- und Videogenerierung |
| **Grok** | Text-, Bild- und Videogenerierung |
| **Mistral** | Textgenerierung |
| **OpenAI** | Text-, Bild- und Videogenerierung |

Jeder Anbieter kann für unterschiedliche Arten von KI-Aufgaben konfiguriert werden:

* **Text** — Wird für die Generierung von Übungen, die Generierung von Lernpfaden, die KI-Bewertung und den KI-Tutor verwendet
* **Bild** — Wird für die KI-Bildgenerierung verwendet
* **Video** — Wird für die KI-Videogenerierung verwendet (sofern unterstützt)
* **Dokument** — Wird für die KI-Dokumentenanalyse verwendet

## Konfigurationsschritte

### 1. API-Schlüssel beschaffen

Registrieren Sie ein Konto bei dem von Ihnen gewählten KI-Anbieter und beschaffen Sie einen API-Schlüssel:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio oder Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Anbieter in Chamilo konfigurieren

![Die Konfigurationsseite der KI-Helfer mit Anbietereinstellungen und Feldern für API-Schlüssel, Modell und Endpunkt](/.gitbook/assets/admin-ai-helpers-config.png)

Navigieren Sie in den Plattformeinstellungen zum Abschnitt **KI-Helfer**:

1. **KI-Helfer aktivieren** — Schalten Sie die KI-Funktionen global ein
2. **KI-Anbieter konfigurieren** — Fügen Sie einen oder mehrere Anbieter hinzu mit:
   * **Anbietername** (deepseek, gemini, grok, mistral, openai)
   * **API-Schlüssel** — Ihr API-Schlüssel für den Anbieter
   * **Modell** — Das zu verwendende konkrete Modell (z. B. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — Die Endpunkt-URL (für Standardanbieter vorkonfiguriert)

Sie können mehrere Anbieter konfigurieren. Der erste Anbieter in der Konfiguration wird zum Standard.

### 3. Funktionen pro Kurs aktivieren

KI-Funktionen können auf Kursebene aktiviert oder deaktiviert werden. Lehrende können umschalten:

* **KI-Tutor-Chatbot** — Der KI-Assistent für Lernende
* **Aufgabenbewerter** — KI-generierte Bewertungsempfehlung
* **Übungsgenerator** — KI-generierte Quizfragen
* **Lernpfadgenerator** — KI-generierte Lernsequenzen
* **Bild-/Videogenerator** — KI-generierte Bilder und Videos in Dokumenten

Dadurch können unterschiedliche Kurse je nach Bedarf unterschiedliche KI-Konfigurationen verwenden.

## Kostenüberlegungen

KI-API-Aufrufe sind mit Kosten verbunden. Berücksichtigen Sie:

* **Nutzungslimits festlegen** — Überwachen und begrenzen Sie die KI-API-Nutzung, um die Kosten zu steuern
* **Modelle bewusst wählen** — Kleinere, kostengünstigere Modelle können für viele Bildungsaufgaben ausreichen
* **Nutzung nachverfolgen** — Chamilo protokolliert KI-Anfragen, damit Sie den Verbrauch überwachen können

## Tipps

* **Mit einem Anbieter beginnen** — Konfigurieren und testen Sie einen Anbieter, bevor Sie weitere hinzufügen
* **Mit einem Kurs testen** — Aktivieren Sie KI-Funktionen zuerst in einem Testkurs, um zu prüfen, ob sie wie erwartet funktionieren
* **Mit Lehrenden kommunizieren** — Informieren Sie Lehrende darüber, welche KI-Funktionen verfügbar sind und wie sie genutzt werden
* **Qualität überwachen** — Prüfen Sie regelmäßig KI-generierte Inhalte, um sicherzustellen, dass sie Ihren Bildungsstandards entsprechen