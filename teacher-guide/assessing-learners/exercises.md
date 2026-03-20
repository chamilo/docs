# Exercises

The exercises tool (also called "tests") lets you create quizzes and exams with automatic grading. Chamilo supports a wide variety of question types, from simple multiple choice to interactive hotspot questions.

## Creating an Exercise

1. Open the **Exercises** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Exercises" data-size="line"> tool from the course homepage
2. Click **New exercise**
3. Enter a **title** and optional **description**
4. Configure the exercise settings (see below)
5. Save, then add questions

## Exercise Settings

![The exercise settings panel with options for display, time, attempts, and feedback](/.gitbook/assets/exercise-settings.png)

### Display and Navigation

| Setting | Options | Description |
|---------|---------|-------------|
| **Question layout** | All on one page / One per page | Show all questions at once or one at a time |
| **Hide question titles** | Yes / No | Whether to show question titles to learners |
| **Show previous button** | Yes / No | Allow learners to go back to previous questions |
| **Prevent backwards navigation** | Yes / No | Force learners to answer in order without going back |

### Time and Availability

| Setting | Description |
|---------|-------------|
| **Time limit** | Maximum time (in minutes) to complete the exercise. A countdown timer is shown to the learner |
| **Start date** | When the exercise becomes available to learners |
| **End date** | When the exercise stops being available |

### Attempts and Scoring

| Setting | Description |
|---------|-------------|
| **Maximum attempts** | How many times a learner can take the exercise (0 = unlimited) |
| **Pass percentage** | The minimum score to pass (e.g., 70%). Learners who do not reach this threshold see a failure message |
| **Propagate negative scoring** | Whether negative points on individual questions reduce the total score below zero |

### Feedback

| Setting | Options |
|---------|---------|
| **At the end** | Show results and correct answers after the learner submits |
| **Immediate** | Show feedback after each question (useful for learning exercises) |
| **Exam mode** | Do not show any feedback or results |

### Results Display

Control what learners see after completing the exercise:

* Show score and expected answers
* Show score only
* Show score with category breakdown
* Show ranking among other learners
* Show only on last attempt
* Show radar chart visualization

### Completion Messages

* **Success message** — Custom text shown when the learner passes
* **Failure message** — Custom text shown when the learner does not reach the pass percentage

### Question Randomization

| Setting | Description |
|---------|-------------|
| **Random question order** | Shuffle the order of questions for each attempt |
| **Random answers** | Shuffle answer options within each question |
| **Random by category** | Select random questions from each question category |

You can also configure advanced selection strategies that combine categories and randomization.

## Question Types

![Overview of available question types in the exercise creation interface](/.gitbook/assets/exercise-question-types.png)

Chamilo offers a rich set of question types organized into several categories:

### Single Choice

* **Multiple choice (single answer)** — Learner selects one correct answer from a list of options
* **Single answer with images** — Same as above, but answer options are displayed as images

### Multiple Choice

* **Multiple answer** — Learner selects one or more correct answers
* **Multiple answer (dropdown)** — Answer options are presented as dropdown menus
* **True/False** — A series of statements that the learner marks as true or false
* **True/False with degree of certainty** — True/false with an additional confidence level, enabling more nuanced scoring

### Fill in the Blanks

* **Fill in the blanks** — Learner completes missing words in a text. You define the blanks and accepted answers when creating the question.

### Matching

* **Matching** — Learner connects items from two columns
* **Matching (draggable)** — Same concept, but with a drag-and-drop interface
* **Draggable** — Drag items into the correct positions

### Open-Ended

* **Free answer (essay)** — Learner writes a text response. Requires manual grading (or AI-assisted grading if configured)
* **Oral expression** — Learner records an audio response using their microphone
* **Upload answer** — Learner uploads a file as their answer

### Hotspot

* **Hotspot** — Learner clicks on specific areas of an image to answer
* **Hotspot delineation** — Learner draws boundaries around areas on an image
* **Hotspot order** — Learner clicks on image areas in the correct sequence

### Calculated

* **Calculated answer** — Numerical questions with a formula and tolerance range. Useful for math and science courses.

### Special

* **Reading comprehension** — Tests based on reading a passage
* **Annotation** — Learner annotates content or an image
* **Answer in Office document** — Learner completes answers within an embedded document (requires OnlyOffice)

## Adding Questions to an Exercise

1. Open the exercise and click **Add a question**
2. Select the question type
3. Enter the **question text** (supports rich text with images and formatting)
4. Define the **answers** and their scoring:
   * For each answer option, specify whether it is correct and how many points it is worth
   * You can assign negative points to wrong answers to discourage guessing
5. Optionally add **feedback** — explanations shown to the learner after answering
6. Set the **difficulty level** and **category** (useful for random selection and reporting)
7. Save

## Question Categories

You can organize questions into categories (e.g., "Module 1", "Vocabulary", "Advanced"). Categories are useful for:

* Organizing large question banks
* Enabling random selection by category (e.g., "5 questions from Module 1, 3 from Module 2")
* Viewing scores broken down by category in reports

## Question Reuse

Questions can be reused across exercises within the same course. When adding a question, you can choose to create a new one or select an existing question from the question bank.

## Importing Exercises

Chamilo supports importing exercises from external formats:

* **IMS QTI / Common Cartridge** — The standard e-learning quiz format
* **Moodle format** — Import quizzes from Moodle exports

To import, look for the **Import** option in the exercises tool and upload your file.

## Tips

* **Mix question types** — Combine multiple choice, fill-in-the-blanks, and open-ended questions for a comprehensive assessment
* **Use categories** — Organize questions by topic to enable targeted random selection
* **Set a pass percentage** — Give learners a clear target and link it to certificate generation via the Gradebook
* **Use immediate feedback for practice** — Create ungraded practice exercises with immediate feedback to help learners learn from their mistakes
* **Randomize for integrity** — Enable random question order and random answers to reduce the chance of copying
