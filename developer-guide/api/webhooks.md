# Webhooks

Chamilo supports webhooks for notifying external systems about platform events.

## How Webhooks Work

When specific events occur in Chamilo (e.g., a user enrolls in a course, an assignment is submitted), the platform can send an HTTP POST request to a configured URL with event data.

## Configuration

Webhook endpoints are configured through the platform settings or via the administration panel. Configure:

* **URL** — The endpoint to receive webhook notifications
* **Events** — Which events trigger notifications
* **Authentication** — How the receiving system authenticates the webhook (API key, shared secret)

## Event Payload

Webhook notifications are sent as JSON POST requests containing:

* **Event type** — What happened
* **Timestamp** — When it happened
* **Data** — Relevant details about the event

## Use Cases

* **Notify HR systems** when learners complete training
* **Update CRM** when users register or complete courses
* **Trigger workflows** in external automation tools
* **Sync data** with third-party platforms
