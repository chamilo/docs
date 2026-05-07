# Exercise Generator

The AI Exercise Generator helps you create quiz questions automatically using artificial intelligence. You provide a topic or content, and the AI generates questions that you can review, edit, and add to your exercises.

## Accessing the Exercise Generator

The Exercise Generator is available when creating or editing an exercise, provided that:

1. AI helpers are enabled at the platform level
2. At least one AI text provider is configured

Look for the **AI Generator** button or section within the exercise creation interface.

## How to Generate Questions

![The AI exercise generator form with fields for topic and number of questions](/.gitbook/assets/ai-exercise-generator.png)

The generator offers two modes, available as tabs:

* **Test from topic** — Generate questions from a textual topic description
* **Test from document** — Generate questions from a course document (only available when a document-capable provider is configured). When this mode is used, the topic field becomes optional and is treated as an extra hint.

1. Open the AI Generator form within an exercise and pick the mode
2. Configure the generation parameters:
   * **Quiz title** — The title for the resulting exercise
   * **Questions topic** — Describe what the questions should be about (or, in document mode, an optional hint)
   * **Number of questions** — How many questions to generate (capped at 100)
   * **Question type** — Currently only **Multiple answer** is offered
   * **AI provider** — Select which AI provider to use (only shown when more than one is configured)
3. Click **Generate**
4. The AI produces a set of questions with answer options and correct answers marked. When AI disclosure is enabled, generated questions are prefixed with **\[AI-assisted\]**.

## Reviewing and Editing

![AI-generated questions displayed for review with options to edit, accept, or remove each one](/.gitbook/assets/ai-exercise-generator-results.png)

Generated questions are presented as **suggestions**. You should:

* **Review each question** for accuracy and relevance
* **Edit the wording** if needed — adjust questions, answer options, and feedback
* **Verify correct answers** — make sure the AI has identified the right answers
* **Remove unsuitable questions** — delete any that don't meet your standards
* **Adjust scoring** — set appropriate point values for each question

Once you are satisfied, add the questions to your exercise.

Note that despite our specific format requests, some models will return question titles prefixed by a number. We don't recommend leaving that number there as this will hinder the mix of questions in tests with randomly selected questions. Also, sometimes you don't get as many questions as you've asked, so make sure you check that and potentially generate more questions, or change model if you have that possibility.

## Tips

* **Provide specific topics** — The more specific your topic description, the more relevant the generated questions will be.
* **Always review** — AI-generated content may contain errors. Never publish questions without reviewing them first.
* **Use as a starting point** — Generated questions are a time-saver, not a finished product. Edit them to match your teaching style and course content.
* **Mix with manual questions** — Combine AI-generated questions with manually created ones for the best results.
* **Try different providers** — If multiple AI providers are available, try different ones to see which produces the best questions for your subject area.
* **Co-generated with AI marker** — Depending on laws and regulations, your administrator might have left the default system configuration of signaling to the final user that a question was co-generated with AI. This will show as an icon with a short text next to the question title.
