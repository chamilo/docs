# AI Configuration

Chamilo 2.0 includes AI-powered features that require configuration before they become available to teachers and learners.

## Supported AI Providers

Chamilo supports multiple AI providers:

| Provider | Capabilities |
|----------|-------------|
| **OpenAI** | Text generation, image generation |
| **Google Gemini** | Text generation |
| **Mistral** | Text generation |
| **DeepSeek** | Text generation |
| **Grok** | Text generation |

Each provider can be configured for different types of AI tasks:

* **Text** — Used for exercise generation, learning path generation, AI grading, and the AI tutor
* **Image** — Used for AI image generation
* **Video** — Used for AI video generation (where supported)
* **Document** — Used for AI document analysis

## Configuration Steps

### 1. Obtain API Keys

Register for an account with your chosen AI provider and obtain an API key:

* **OpenAI**: [platform.openai.com](https://platform.openai.com/)
* **Google Gemini**: Google AI Studio or Google Cloud
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)

### 2. Configure Providers in Chamilo

![The AI helpers configuration page showing provider settings with API key, model, and endpoint fields](/.gitbook/assets/admin-ai-helpers-config.png)

In the platform settings, navigate to the **AI Helpers** section:

1. **Enable AI helpers** — Turn on the AI features globally
2. **Configure AI providers** — Add one or more providers with:
   * **Provider name** (openai, gemini, mistral, deepseek, grok)
   * **API key** — Your API key for the provider
   * **Model** — The specific model to use (e.g., `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API URL** — The endpoint URL (pre-configured for standard providers)

You can configure multiple providers. The first provider in the configuration becomes the default.

### 3. Enable Features Per Course

AI features can be enabled or disabled at the course level. Teachers can toggle:

* **AI Tutor chatbot** — The AI assistant for learners
* **Exercise generator** — AI-generated quiz questions
* **Learning path generator** — AI-generated learning sequences

This allows different courses to use different AI configurations based on their needs.

## Cost Considerations

AI API calls have costs associated with them. Consider:

* **Setting usage limits** — Monitor and limit AI API usage to control costs
* **Choosing models wisely** — Smaller, less expensive models may be sufficient for many educational tasks
* **Tracking usage** — Chamilo logs AI requests to help you monitor consumption

## Tips

* **Start with one provider** — Configure and test one provider before adding more
* **Test with a course** — Enable AI features in a test course first to verify they work as expected
* **Communicate with teachers** — Let teachers know which AI features are available and how to use them
* **Monitor quality** — Regularly review AI-generated content to ensure it meets your educational standards
