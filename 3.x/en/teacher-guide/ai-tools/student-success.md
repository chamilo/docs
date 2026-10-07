# Student Success AI Coach

The **Student Success AI Coach** helps a teacher turn course activity into practical recommendations for one learner. It is available from the learner list in the course reporting area when AI helpers and the **Course analyser** feature are enabled for that course.

> The platform must have at least one text AI provider configured. See [AI Configuration](../../admin-guide/integrations/ai-configuration.md). The relevant platform settings are `ai_helpers.enable_ai_helpers` and `ai_helpers.course_analyser` under **Administration > Configuration settings > AI Helpers**.

## Generating a Recommendation

1. Open the course reporting area and display the **Learner list**.
2. Find the learner and click the **Student Success AI Coach** action.
3. If several AI providers are available, select one.
4. Optionally enter **Additional instructions for the AI coach**. These let you add teaching context or ask the coach to focus on a specific difficulty.
5. Click **Analyze user's learning**.

Chamilo first prepares or reuses a course analysis, then analyzes the learner's activity in the current course or course-session context.

## What the Recommendation Contains

The result can include:

* a concise overall summary;
* **Priority actions**;
* suggested **Additional activities**;
* recommendations about **Rhythm** and pacing;
* alternative **Learning methodologies**;
* other recommendations when relevant;
* **Evidence** links from the approved pedagogical source catalogue for the course language.

The recommendation is stored in Chamilo for that learner and course context. Chamilo also saves a copy in the teacher's own Inbox when message creation succeeds, so it can be reviewed later.

## Privacy

Before the analysis starts, Chamilo displays a privacy warning. Direct profile identifiers are omitted from the learner payload sent to the AI provider, and the AI is instructed not to identify the learner or infer sensitive traits. However, learning activity and course content can still contain information that might indirectly identify somebody. Follow your organization's AI and privacy policy before using the feature.

The same Student Success analysis is also available to authorized MCP clients through the `generate_student_success_feedback` tool; it reuses the same privacy-filtered analysis flow.
