# Course Picture Generator

The AI course picture generator lets you create a thumbnail image for your course directly from the course settings screen, instead of sourcing or designing one yourself. This is the image shown for your course in listings and in the [course catalog](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Accessing the Generator

The **Generate with AI** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Generate with AI" data-size="line"> button is available next to the **Course picture** field, provided that:

1. AI helpers are enabled at the platform level
2. At least one AI provider configured on your platform supports image generation
3. The feature is allowed in your course (see **AI Helpers Settings** in [Course Settings](../creating-your-course/course-settings.md))

Open your course's **Settings** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> and scroll to the **Course picture** field:

![The Course picture field in Course Settings, with a Choose File button and a Generate with AI button below it](/.gitbook/assets/course-picture-ai-button.png)

## How to Generate a Picture

1. Click **Generate with AI**
2. A dialog opens with a **Prompt** field pre-filled with a default description; edit it to describe the illustration you want, or leave the default as-is

![The Generate with AI dialog showing the Prompt field with its default text, and Cancel/Generate buttons](/.gitbook/assets/course-picture-ai-modal.png)

3. Click **Generate** and wait — image generation can take a few seconds
4. The generated image is automatically placed in the **Course picture** field, replacing anything you had selected there
5. Preview it in the **Preview** panel, then click the form's **Save** button to actually apply it to your course — generating the image does not save it by itself

If you don't like the result, you can generate again with a different prompt as many times as you want before saving.

## What Goes Into the Prompt

Beyond what you type, Chamilo automatically adds context to help the AI produce a relevant, on-brand image:

* Your course's title
* The first section of your course's [Course Description](../creating-your-course/course-description.md), if you've filled one in — giving the AI a sense of the actual subject matter
* Your platform's color theme (primary, secondary, tertiary), so the illustration uses colors consistent with your portal

The image is generated in flat, widescreen (16:9) illustration style, without any readable text, logos, or photorealistic people — matching the format expected for a course thumbnail.

## Tips

* **Fill in a Course Description first** — since it feeds the prompt, a course with a real description tends to get a more relevant illustration than one with none
* **Be specific about style, not content** — the course title and description already anchor the subject; use your prompt for style cues (color mood, metaphor, composition) rather than re-describing the topic
* **Regenerate rather than settle** — each click produces a new attempt at no extra step; try a couple of variations before picking one
* **Remember to save** — the button only fills in the picture field; navigate away without saving and the generated image is lost
* **If generation fails, ask your administrator** — a disabled feature, an unconfigured image provider, or an exhausted monthly AI usage quota all produce an error message here; your administrator can check the [AI Configuration](../../admin-guide/integrations/ai-configuration.md)
