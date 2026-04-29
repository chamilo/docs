# AI Tutor

The AI Tutor is a chatbot integrated into Chamilo that learners can interact with to ask course-related questions. It provides instant, context-aware responses powered by a large language model.

## How It Works

When the AI Tutor is enabled for a course, learners see a chat interface where they can:

* **Ask questions** about course content
* **Get explanations** of concepts covered in the course
* **Receive guidance** without waiting for the teacher to respond

The AI Tutor uses the course context to provide relevant answers. It is designed to supplement your teaching, not replace it.

## Enabling the AI Tutor

The AI Tutor requires two levels of configuration:

1. **Platform level** — The administrator must enable AI helpers and configure at least one AI provider (see [AI Configuration](../../admin-guide/integrations/ai-configuration.md))
2. **Course level** — The AI Tutor must be enabled in the course settings (a simple on/off toggle). The provider used for the chat is the one configured by the administrator.

## The Chat Interface

![The AI Tutor chat interface showing a conversation between a learner and the AI](/.gitbook/assets/ai-tutor-chat.png)

The AI Tutor appears as a **docked chat panel** within the course. Learners can:

* Type messages and receive AI-generated responses
* View their conversation history
* Reset the conversation to start fresh

The chat interface shows the exchange between the learner and the AI in a familiar messaging format.

## Important Behavior

* **Course context only** — The AI Tutor is only available inside a course, not on the general platform
* **Disabled during exams** — The AI Tutor is automatically disabled when a learner is taking an exercise, to prevent cheating
* **Conversation per learner** — Each learner has their own private conversation with the AI Tutor, and the prompt context only includes the most recent messages
* **Provider failover** — If the configured provider fails, Chamilo falls back to another available provider so the chat keeps working

## As a Teacher

You should be aware that:

* The AI Tutor may not always give perfect answers — encourage learners to verify important information
* You can review AI Tutor usage through platform tracking
* The AI Tutor is a complement to your teaching, not a substitute. Use it alongside forums, announcements, and direct messaging for comprehensive learner support.

## Tips

* **Set expectations** — Tell learners at the start of the course that an AI Tutor is available and explain how to use it appropriately
* **Encourage critical thinking** — Remind learners to think critically about AI-generated answers
* **Use for frequently asked questions** — The AI Tutor is especially useful for handling common questions that you would otherwise answer repeatedly
