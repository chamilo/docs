# xAPI

**xAPI** (Experience API, also known as Tin Can API) is a standard for tracking learning experiences. Chamilo can both generate and consume xAPI statements.

## What xAPI Does

xAPI tracks learning activities as **statements** in the format: "Actor did Verb on Object." For example:

* "Jane completed Module 1"
* "John scored 85% on the Final Exam"
* "Maria watched the Introduction Video"

These statements are stored in a **Learning Record Store (LRS)**, providing a comprehensive record of learning activity.

## Configuration

1. In the platform settings, configure the **LRS endpoint**:
   * **LRS URL** — The address of your Learning Record Store
   * **LRS authentication** — Credentials for sending data to the LRS
2. Enable xAPI tracking for the desired activities

## What Chamilo Tracks via xAPI

Chamilo can generate xAPI statements for:

* Course access and completion
* Exercise attempts and scores
* Learning path progress
* Document views
* Forum participation

## Use Cases

* **Cross-platform tracking** — Track learning activity across multiple tools and platforms in a single LRS
* **Advanced analytics** — Use LRS analytics tools to generate insights that go beyond Chamilo's built-in reporting
* **Compliance reporting** — Generate audit trails of training completion for regulatory requirements
