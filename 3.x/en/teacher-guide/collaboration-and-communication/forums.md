# Forums

The forum tool allows you to host structured discussions within your course. Learners can post messages, reply to each other, and engage in threaded conversations.

## Forum Structure

![The forum category list showing categories, forums, and topic counts](../../.gitbook/assets/forum-category-list.png)

Forums in Chamilo are organized in three levels:

1. **Forum categories** — Top-level groupings (e.g., "General Discussions", "Module 1 Questions")
2. **Forums** — Individual discussion boards within a category
3. **Topics (threads)** — Individual discussion topics within a forum, each with a chain of replies

## Creating a Forum Category

1. Open the **Forums** <img src="../../.gitbook/assets/icons/mdi-comment-quote.svg" alt="Forums" data-size="line"> tool from your course homepage
2. Click **Add a forum category**
3. Enter a **Category name** and optional description
4. Save

## Creating a Forum

You can only add a forum once at least one category exists.

1. Within a category, click **Add a forum**
2. Fill in the basic details:
   * **Title** — The name of this discussion board
   * **Description** — An optional description of the forum's purpose
   * **Create in category** — The category this forum belongs to
3. Open **Advanced settings** to configure:
   * **Publication date** / **Closing date** — Optional time window during which the forum is open
   * **Moderated forum** — Require new posts to be approved by a teacher before they become visible
   * **Can learners edit their own posts?** — Allow or prevent learners from editing posts after submitting
   * **Allow users to start new threads** — When set to No, learners can only reply to existing threads
   * **Default view type** — Choose how posts are displayed: **Flat**, **Threaded**, or **Nested**
   * **For Group** — Attach this forum to a course group
   * **Public access / Private access** — For group forums, decide whether any course member can read it or only group members
4. Save

If the course visibility is set to "Open to the world", the form also shows an **Allow anonymous posts?** option. This option is hidden in courses with restricted visibility.

## Managing Topics

Learners (and you) can create new topics within a forum. As a teacher, you can:

* **Pin a topic (sticky message)** — Mark a thread as sticky when you create or edit it so it always appears at the top
* **Lock a topic** — Prevent further replies
* **Edit or delete posts** — Moderate the discussion
* **Move a topic** — Transfer a topic to a different forum

## Forum Scoring

When creating a new thread as a teacher, you can enable **Grade this thread** under Advanced settings. You then set a maximum score, a column header for the gradebook, and a weight in the report. You can also enable **Thread scored by peers**, which requires each learner to qualify at least two other learners before their own score counts.

## Participation Requirements and Category Information

Administrators can optionally enable three forum-wide behaviors under **Administration > Configuration settings > Forums**:

* **Show thread replies only after participating** (`show_thread_replies_after_participation`) — A learner sees the thread's opening message, but not other people's replies until they have contributed a post. Teachers, administrators, session coaches and group tutors are not subject to this restriction. A learner's post waiting for moderation still counts as participation, although normal moderation rules still apply.
* **Show the forum category description in threads** (`show_category_description_in_thread`) — The category title and an excerpt of its description appear above the discussion. **Read more** expands long descriptions.
* **Posts required to complete a forum thread** (`thread_participation_progress_posts`) — When greater than `0`, a progress bar shows a learner's post count against the configured target. Posts awaiting moderation count. Setting it to `0` hides the bar.

The progress target is an informational indicator, **not** the threshold for unlocking replies: if participation-gated replies are enabled, posting once is sufficient to lift that restriction. These settings are disabled by default. See [Forums Settings](../../admin-guide/platform-settings/forum-settings.md).

## Notifications

Each forum and thread has a **Notify me** toggle that you and your learners can use to subscribe to email notifications about new posts. Notifications are a per-user subscription and are not configured when creating the forum.
