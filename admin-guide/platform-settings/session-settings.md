# Session Settings

Session settings control defaults for how training sessions behave on the platform. Access them from **Administration > Configuration settings > Session**.

## What Are Sessions?

Sessions are time-bound instances of one or more courses. They allow the same course content to be reused across different groups of learners with separate tracking. For example, a "Project Management" course can run in a January session and a March session, each with different students and coaches but identical content.

## Default Session Visibility

| Visibility | Description |
|------------|-------------|
| **Read only** | After the session period ends, learners can still view content but cannot interact (no quiz attempts, no forum posts). This is the most common default. |
| **Accessible** | The session remains fully interactive even after its end date. |
| **Not accessible** | After the session ends, learners can no longer access it at all. |

Set the default under **Default visibility after session end**. Session administrators can override this per session.

## Session Creation Permissions

| Setting | Description |
|---------|-------------|
| **Allow teachers to create sessions** | When enabled, teachers can create and manage their own sessions. When disabled, only administrators and session administrators can create sessions. |
| **Session administrators can manage all sessions** | When enabled, session administrators can see and manage sessions created by other session administrators. When disabled, they can only manage their own. |

## Duration Settings

| Setting | Description |
|---------|-------------|
| **Default session duration (days)** | The number of days a session remains active by default when no specific end date is set. Set to 0 for unlimited. |
| **Session access before start date** | Number of days before the session start date that coaches can access the session to prepare content. Learners cannot access it during this period. |
| **Session access after end date** | Number of days after the session end date that learners retain access (subject to the visibility setting above). |

## Session Display

| Setting | Description |
|---------|-------------|
| **Show session coach name** | Display the general coach name on the session listing page. |
| **Show session description** | Show the session description to users before enrollment. |
| **Order sessions by** | Controls how sessions are sorted in the user's session list: by start date, name, or custom order. |

## How Sessions Interact with Courses

* A session contains one or more courses. Content comes from the base course but tracking is separate per session.
* Coaches (session tutors and course coaches) can add session-specific content that does not modify the base course.
* Learners enrolled in a session only see their session's context, not the base course data from other sessions.

## Tips

* **Use "Read only" as the default post-session visibility** so learners can review materials after training ends without generating new activity data.
* **Set coach access before start date** to at least 7 days so coaches have time to customize content before learners arrive.
* **Use session categories** to organize sessions by department, semester, or program for easier management.
