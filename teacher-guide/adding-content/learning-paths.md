# Learning Paths

Learning paths let you create structured sequences of learning activities. A learning path guides your learners through a specific order of documents, exercises, links, and other resources, with optional prerequisites and progress tracking.

## Why Use Learning Paths?

Learning paths are useful when you want to:

* **Control the order** of content consumption — ensure learners complete foundational material before advancing
* **Track progress** — see exactly where each learner is in the sequence
* **Set prerequisites** — require learners to pass an exercise before accessing the next section
* **Award completion** — link learning path completion to the gradebook and certificates
* **Package content** — create self-contained learning modules that learners can work through at their own pace

## Creating a Learning Path

1. Open the **Learning paths** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Learning paths" data-size="line"> tool from the course homepage
2. Click **Create a learning path**
3. Enter a **title** and optional description
4. Save — you will be taken to the learning path editor

## The Learning Path Editor

![The learning path editor with the item tree on the left and content preview on the right](/.gitbook/assets/learning-path-editor.png)

The editor has two main areas:

* **Left panel** — The list of items (steps) in the learning path, shown as a tree structure
* **Right panel** — The content of the selected item

### Adding Items

Click **Add an item** and choose what to add:

| Item type | Description |
|-----------|-------------|
| **Section** | A heading that groups related items (like a chapter title). Sections do not contain content themselves. |
| **Document** | A file or web page from your course's Documents tool |
| **Exercise** | A quiz or test from the Exercises tool |
| **Link** | An external URL |
| **Assignment** | A student publication from the Assignments tool |
| **Forum** | A link to a course forum |

### Organizing Items

* **Drag and drop** items to reorder them
* **Nest items** under sections by dragging them to the right
* **Delete** items you no longer need

### Setting Prerequisites

Prerequisites ensure learners complete certain steps before accessing others:

1. Select an item in the learning path
2. Open its **prerequisites** settings
3. Choose which preceding item(s) must be completed first
4. For exercises, you can require a **minimum score** (e.g., "Must score at least 70% on Quiz 1 before accessing Module 2")

## Learner Experience

When a learner opens a learning path:

* They see the list of items in the left panel
* Completed items are marked with a checkmark
* Items with unmet prerequisites are locked
* Progress is tracked automatically — if a learner leaves and comes back, they resume where they left off
* A progress bar shows overall completion percentage

## SCORM and AICC Content

Chamilo supports importing standardized e-learning packages:

* **SCORM 1.2 and SCORM 2004** — The most widely used e-learning standard. Upload a SCORM ZIP file and Chamilo will create a learning path from it, tracking progress and scores according to the SCORM specification.
* **AICC** — An older e-learning standard. Chamilo supports importing AICC packages.

To import a SCORM or AICC package:

1. In the Learning paths tool, click **Import**
2. Upload the ZIP file
3. Chamilo unpacks and creates the learning path automatically

## Learning Path Settings

Configure how the learning path behaves:

| Setting | Description |
|---------|-------------|
| **Visibility** | Hide or show the learning path to learners |
| **Prerequisites** | Require completion of other learning paths before this one |
| **Auto-launch** | Automatically open this learning path when learners enter the course |
| **Accumulated SCORM time** | Whether to accumulate time across multiple sessions |

## Linking to the Gradebook

You can include learning path completion as a graded activity in the Gradebook. This allows learning path progress to contribute to the learner's overall course grade and certificate eligibility.

## Tips

* **Start with an outline** — Plan your sections and items before building the path
* **Use sections as chapters** — Group related items under section headings for clarity
* **Set prerequisites for assessments** — Require learners to study the content before taking a quiz
* **Mix content types** — Combine reading materials, videos, interactive exercises, and external resources for an engaging learning experience
* **Check the learner view** — Use the Student View feature to experience the learning path as a learner would
* **Use SCORM for interactivity** — If you have access to SCORM authoring tools (like Articulate, iSpring, or similar), create rich interactive content and import it into Chamilo
