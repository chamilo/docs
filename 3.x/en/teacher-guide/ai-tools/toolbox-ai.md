# AI Toolbox

The **AI Toolbox** is a course tool that generates interactive educational applications from a teacher's instructions. Chamilo packages each generated application as **SCORM 1.2**, so learner progress, score and resume data are tracked by the platform.

> The administrator must enable both `ai_helpers.enable_ai_helpers` and `ai_helpers.toolbox` under **Administration > Configuration settings > AI Helpers**, and at least one text AI provider must be configured.

## Creating an Interactive Application

1. Open **AI Toolbox** in the course.
2. Click **Create**.
3. Enter a **Title** and, optionally, a **Description**.
4. In **What should the application do?**, describe the complete activity you want. Include the learning objective, rules, levels, scoring and what should happen when the learner finishes.
5. Choose the **AI provider** when more than one is available.
6. Click **Generate**.

The first generation is stored as **version 1**. It starts as a draft, so you can preview it before making it visible to learners.

## Improving and Versioning

Open an application's **Settings** to manage it. You can:

* preview or download the current application;
* use **Improve with AI** to describe a change and generate a new version;
* review the **Version history**;
* preview, download or restore an earlier version;
* publish or hide the application;
* open **Reporting** to review learner tracking.

Generating an improvement does not delete previous versions. Restoring an earlier version makes that version current again.

## Learner Experience

Learners only see applications that have been published. From the Toolbox they can open an application, continue from their latest SCORM state, and see their **Progress** and **Score**. When a new attempt is allowed, **Try again** starts a fresh attempt.

Toolbox applications run inside the Learning Path runtime in a restricted iframe and report their SCORM state back to Chamilo. They are managed from the Toolbox rather than from the normal Learning Paths list.

Authorized MCP clients can also create or update Toolbox applications when the same AI Toolbox settings are enabled.
