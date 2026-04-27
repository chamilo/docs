# Surveys

The survey tool lets you create questionnaires to collect feedback from your learners. Surveys are useful for course evaluations, needs assessments, and opinion polls.

## Creating a Survey

1. Open the **Surveys** <img src="/.gitbook/assets/icons/mdi-form-dropdown.svg" alt="Surveys" data-size="line"> tool from the course homepage
2. Click **Create survey**
3. Fill in the survey details:
   * **Code** — This is a unique code for the survey. It will be used in mails and links.
   * **Title** — The name of the survey
   * **Subtitle** — An optional secondary heading
   * **Start date** — From when this survey will be open to participation
   * **End date** — Until when this survey will be open to participation
   * **Anonymous** — Whether responses are anonymous or linked to individual learners
   * **Results visibility** — Who can see the results (only coach, coach and students, everyone)
   * **Introduction** — A message shown to learners before they start the survey
   * **Thank you message** — A message shown after submission
4. Save

### Advanced settings

* **Grade in the assessment tool** — Whether to include this survey's answer state in the assessment tool (gradebook). Anyone having completed the survey gets 100%, anyone else get 0%
* **Parent survey** — Not really used at this point (legacy feature)
* **One question per page** — Presentation style for the questions
* **Enable shuffle mode** — Whether to shuffle questions
* **Show question number** — Whether to show (auto-generated) question numbers

## Adding Questions

Once the survey is created, add questions:

1. Choose the question type:
   * **Yes/No** — A simple binary choice
   * **Multiple choice** — Select one answer from several options
   * **Multiple answer** — Select one or more answers from several options
   * **Open-ended** — Free text response
   * **Dropdown** — Select from a dropdown list
   * **Percentage** — Choose a percentage value
   * **Score** — Rate on a numeric scale
   * **Comment** — A text block (not a question) for adding instructions between questions
   * **Multiple choice with "other" option** — Select one answer from several options, with an alternative choice
   * **Selective display** — Special type allowing you to adapt the flow of questions based on previous answers
   * **Page break** — Add page breaks in the questions flow. Only useful if "One question per page" was **not** selected in the previous step
2. Configure the question text and answer options
3. Save

Each question can be marked as mandatory. If you don't, skipping any question will be acceptable behaviour.

## Publishing a Survey

After adding all questions:

1. Click **Publish**
2. Choose the recipients — Select specific learners or groups (you select them). The **Add learners** button adds all the learners in one single push and leaves the teachers behind
3. Add additional users — Lets you invite users from outside Chamilo to participate in the survey. They will receive an e-mail with a link and will appear by their e-mail address in the survey details
4. Mail subject
5. Mail text — Explain what the survey is about and when/how to answer
6. Different options for repeat invitations are available
7. Confirm

Learners receive an invitation (as an email) to complete the survey.

A link is available at the bottom of the publication page to invite even more external users to participate. Participants using this link will not be identified and appear as anonymous in the survey results.

## Viewing Results

![Survey results with charts and percentage breakdowns for each question](/.gitbook/assets/survey-results-charts.png)

After learners have responded:

1. Open the survey
2. Click **Results** or **Report**
3. View response summaries:
   * Charts and percentages for closed questions
   * Individual text responses for open-ended questions
   * Completion rate (how many invitees responded)

You can export results to a spreadsheet for further analysis.

## Tips

* **Keep it short** — Learners are more likely to complete shorter surveys
* **Use anonymous mode** — For honest feedback, enable anonymous responses
* **Time it right** — Send mid-course surveys to make adjustments, not just end-of-course evaluations
