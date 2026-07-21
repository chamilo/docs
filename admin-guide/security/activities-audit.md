# Activities Audit

The Activities Audit report lets you browse important administrative and platform activities, filtered by event type. It is the same underlying report previously reachable from **Tracking > Administrative activity auditing**; it is now also linked directly from the Security block, since it is primarily a security and accountability tool.

## Accessing Activities Audit

From the administration panel, click **Security > Activities audit**.

## What It Shows

![The Activities audit page listing event type categories such as Course, Session, User, Social, Message, Resource, Wiki, and Other, each expandable into individual event types](/.gitbook/assets/admin-security-activities-audit.png)

Events are grouped into categories:

* **Course** — Course creation, deletion, and settings changes
* **Session** — Session and session-category creation, deletion, and enrollment changes
* **User** — Account creation, deletion, password updates, field changes, and more
* **Social** — Social group creation, deletion, and membership changes
* **Message** — Message data changes and deletions
* **Resource** — Resource and resource-link creation and deletion
* **Wiki** — Wiki page views
* **Other** — Everything else, including plugin activity, gradebook locking, exercise attempt deletions, forced login attempts, and platform-level settings changes

Click an event type chip (for example **Attempted Forced Login**) to filter the report down to a table of matching entries. You can also search directly by keyword using the **Search** field above the event type list.

## Use Cases

* Investigate who deleted a course, session, or user account, and when
* Confirm whether a specific administrative change (a settings update, a plugin install) was made by an expected administrator
* Follow up on **Attempted Forced Login** events alongside the [Login Attempts](login-attempts.md) report
