# KI-Konfiguration

Chamilo 2.0 bietet KI-gestützte Funktionen, die vor ihrer Verfügbarkeit für Lehrkräfte und Lernende konfiguriert werden müssen.

## Unterstützte KI-Anbieter

Chamilo unterstützt mehrere KI-Anbieter:

| Anbieter | Fähigkeiten |
|----------|-------------|
| **DeepSeek** | Textgenerierung |
| **Google Gemini** | Text-, Bild- und Videogenerierung |
| **Grok** | Text-, Bild- und Videogenerierung |
| **Mistral** | Textgenerierung |
| **OpenAI** | Text-, Bild- und Videogenerierung |

Jeder Anbieter kann für verschiedene Arten von KI-Aufgaben konfiguriert werden:

* **Text** — Wird für die Generierung von Übungen, Lernpfaden, KI-Bewertungen und den KI-Tutor verwendet
* **Bild** — Wird für die KI-Bildgenerierung verwendet
* **Video** — Wird für die KI-Videogenerierung verwendet (wo unterstützt)
* **Dokument** — Wird für die KI-Dokumentenanalyse verwendet

## Konfigurationsschritte

### 1. API-Schlüssel beschaffen

Registrieren Sie sich für ein Konto bei Ihrem gewählten KI-Anbieter und besorgen Sie sich einen API-Schlüssel:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio oder Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Anbieter in Chamilo konfigurieren

![Die Konfigurationsseite für KI-Helfer mit Anbieter-Einstellungen, API-Schlüssel-, Modell- und Endpunktfeldern](/.gitbook/assets/admin-ai-helpers-config.png)

Navigieren Sie in den Plattformeinstellungen zum Abschnitt **KI-Helfer**:

1. **KI-Helfer aktivieren** — Schalten Sie die KI-Funktionen global ein
2. **KI-Anbieter konfigurieren** — Fügen Sie einen oder mehrere Anbieter hinzu mit:
   * **Anbietername** (deepseek, gemini, grok, mistral, openai)
   * **API-Schlüssel** — Ihr API-Schlüssel für den Anbieter
   * **Modell** — Das spezifische Modell, das verwendet werden soll (z. B. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — Die Endpunkt-URL (für Standardanbieter vorkonfiguriert)

Sie können mehrere Anbieter konfigurieren. Der erste Anbieter in der Konfiguration wird zum Standard.

### 3. Funktionen pro Kurs aktivieren

KI-Funktionen können auf Kursebene aktiviert oder deaktiviert werden. Lehrkräfte können folgendes umschalten:

* **KI-Tutor-Chatbot** — Der KI-Assistent für Lernende
* **Aufgabenbewertung** — KI-generierte Bewertungsempfehlung
* **Übungsgenerator** — KI-generierte Quizfragen
* **Lernpfadgenerator** — KI-generierte Lernsequenzen
* **Bild-/Videogenerator** — KI-generierte Bilder und Videos in Dokumenten

Dies ermöglicht es verschiedenen Kursen, unterschiedliche KI-Konfigurationen je nach ihren Bedürfnissen zu verwenden.

## Kostenüberlegungen

KI-API-Aufrufe sind mit Kosten verbunden. Beachten Sie:

* **Nutzungslimits festlegen** — Überwachen und begrenzen Sie die Nutzung der KI-API, um Kosten zu kontrollieren
* **Modelle mit Bedacht wählen** — Kleinere, kostengünstigere Modelle können für viele pädagogische Aufgaben ausreichend sein
* **Nutzung verfolgen** — Chamilo protokolliert KI-Anfragen, um Ihnen bei der Überwachung des Verbrauchs zu helfen

## Tipps

* **Mit einem Anbieter beginnen** — Konfigurieren und testen Sie zunächst einen Anbieter, bevor Sie weitere hinzufügen
* **Mit einem Kurs testen** — Aktivieren Sie KI-Funktionen zuerst in einem Testkurs, um sicherzustellen, dass sie wie erwartet funktionieren
* **Mit Lehrkräften kommunizieren** — Informieren Sie Lehrkräfte darüber, welche KI-Funktionen verfügbar sind und wie sie genutzt werden können
* **Qualität überwachen** — Überprüfen Sie regelmäßig KI-generierte Inhalte, um sicherzustellen, dass sie Ihren pädagogischen Standards entsprechen