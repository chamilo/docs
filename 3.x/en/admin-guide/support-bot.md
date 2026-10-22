# Support Bot (Decision-Tree Assistant)

The **Support Bot** is a configurable help assistant built from a fixed decision tree. It was implemented in [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) for [issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). It is **not a generative-AI chatbot**: administrators write questions and selectable answers that guide users to an explanation, a page or a support ticket.

## Enable it

1. In **Administration > Configuration settings > Tickets**, enable `ticket.ticket_support_bot_enabled` (disabled by default).
2. Open **Administration > Support bot** and create a **draft** decision tree. Provide a title and at least one entry node with options.
3. Define the question or information at each node and link the options to the next action.
4. Publish a valid tree. Only a published tree with a valid entry node and selectable options is available to users.

The engine selects the published tree for the current access URL; its availability is therefore portal-scoped. An administrator must have `ROLE_ADMIN` to manage trees.

## Design a support flow

Each option can perform one of four actions:

| Action | Result |
| --- | --- |
| **Go to another node** | Continue the conversation at another question in the same tree |
| **Open a link** | Link to a Chamilo page using a same-site relative path, for example `/tickets` |
| **End conversation** | Mark the issue as resolved and optionally display a closing message |
| **Create support ticket** | Escalate the conversation to the Tickets system |

For ticket escalation, select a **Default ticket project** and a category belonging to that project. Categories that require a course cannot be used for this support-bot escalation. The created ticket contains the user's decision-tree transcript, so support staff can see the choices that led to escalation.

The editor validates tree structure before publication. The **Published** and **Archived** versions are read-only; use **Duplicate** to create a new editable draft. Publishing a replacement archives the previously published version in the same scope. From the list, administrators can also import or export a tree and review its conversation history. A published tree must be archived before deletion, and a tree with conversation history cannot be deleted.

## How users access it

When the setting is on and the portal has a valid published tree, signed-in users see a **Support bot** contact in the docked chat. They answer by choosing the offered options. The bot can resolve the conversation, open a same-site page, or create a ticket and show the link to it. Users can start a new conversation after an earlier one ends.

This is separate from the **AI Tutor**, which responds to open-ended learning questions. The support bot follows only the routes and options configured by administrators.

## Troubleshooting and security

* **No bot in the chat:** verify the Tickets setting, that a tree is published for the current portal, and that its entry node has options.
* **Cannot publish:** review missing nodes, unresolved destination nodes and invalid actions in the draft.
* **Ticket cannot be created:** check the selected ticket project and category. Do not use a course-required ticket category.
* **Missing older conversations:** administrators can review conversation history from the corresponding tree; conversations are tied to a user and an access URL.

For the related setting, see [Tickets Settings](platform-settings/ticket-settings.md).
