# Simple IDS

Chamilo includes a lightweight, in-application intrusion detection system (IDS). On every request, it scans the URL query parameters, the request path, and a couple of headers (`User-Agent`, `Referer`) for common attack signatures — for example XSS payloads or path-traversal patterns — and logs anything suspicious. The Simple IDS page lets you review what it has flagged.

Request **bodies** are intentionally not scanned, to avoid false positives from rich-text editor content (course text legitimately contains HTML/JavaScript-like markup).

## Accessing Simple IDS

From the administration panel, click **Security > Simple IDS**.

## What It Shows

![The Simple IDS page showing charts for events by day, events by type, and top attacking IPs, followed by a table of flagged IDS events with date, IP, detection type, parameter, URI, and detail](/.gitbook/assets/admin-security-simple-ids.png)

* **Events by day (last 7 days)**, **Events by type (last 30 days)**, and **Top attacking IPs (last 30 days)** — Summary charts
* **Flagged IDS events table** — Each entry shows the date, source IP, detection type (for example `XSS`), the affected parameter, the request URI, and a short description of what was detected

Use the **IP**, event type, and date-range filters above the charts to narrow the results.

## How It Works

* Every request is scanned on the way in; matches are appended to `var/logs/ids/ids_events.log`
* On the way out, the same subscriber adds OWASP-recommended security headers to the response
* If blocking is enabled, a request that matches a signature is stopped immediately with an HTTP 400 response instead of reaching your application code

## Configuration

Simple IDS is controlled by environment variables, set in `config/packages/chamilo_ids.yaml`:

| Variable | Purpose |
|----------|---------|
| `IDS_ENABLED` | Turns request scanning and logging on or off |
| `IDS_BLOCK` | When enabled, a detected request is rejected (HTTP 400) instead of only logged |
| `IDS_SECURITY_HEADERS` | Controls whether the OWASP-recommended response headers are added |

This is a lightweight, best-effort detector meant to catch obvious scanning and exploitation attempts — it does not replace a dedicated web application firewall (WAF) for high-risk deployments.
