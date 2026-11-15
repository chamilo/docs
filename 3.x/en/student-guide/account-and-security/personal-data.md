# Personal Data

If your administrator has enabled the platform's GDPR features, you can review the personal data Chamilo holds about you and export a machine-readable copy of it. The page lives under **Social network > Personal data** in the sidebar — it is grouped there for historical reasons, not because it is a social feature.

The page shows your profile, legal consent status, and the categories of data stored for your account (messages, course activity, logs, and similar). You can also request to withdraw legal agreement or to delete your account, if those options are available on your platform.

## Downloading or Sending Your Data

A **Download or send your personal data** card lets you take a copy of this information with you. That is the platform's way of supporting the right to data portability: you can obtain your data in a structured, commonly used, machine-readable format, and — when the administrator allows it — ask Chamilo to send the same file to another service.

For your security, every download and transfer asks you to type your **current password**. The password is checked on the server and is never written to logs or included in the export file.

* **Download as JSON-LD** saves a file named like `chamilo-personal-data-{username}-{date}.json`.
* **Download as XML** saves the same information as a well-formed XML 1.0 document, named like `chamilo-personal-data-{username}-{date}.xml`.
* **Send to a URL**, if your administrator has enabled it, posts the JSON-LD document to an HTTPS address you provide. Only HTTPS is accepted. Private, loopback, and other reserved network addresses are refused so that the platform cannot be used to probe internal systems. Every successful transfer is recorded as a third-party data exchange.

If GDPR features are disabled on your platform, this page — and the export actions — will not be available.

## The Export File

There is no single official GDPR export schema. The GDPR requires a structured, commonly used, machine-readable format, but it does not prescribe one template. Chamilo therefore uses a versioned document (`format`: `chamilo-personal-data`, currently `version` `1.0`) that reuses well-known vocabularies so another system — or another AI — can recognise the meaning of each field. You can download it as JSON-LD or as XML; both formats carry the same envelope, the same Person record, the same xAPI statements, and the same other sections.

The file always starts with a short envelope:

* `format` — always `chamilo-personal-data`
* `version` — the schema version (`1.0`)
* `generated_at` — when the file was produced, as an ISO 8601 timestamp (UTC)

The remaining top-level sections are described below.

### `user` — a schema.org Person (JSON-LD)

Your profile is exported as a [schema.org](https://schema.org/Person) `Person` in JSON-LD:

* `@context`: `https://schema.org`
* `@type`: `Person`
* `@id`: an IRI for your account on this portal
* `givenName`, `familyName`, `name`
* `email`
* `alternateName` and an `identifier` `PropertyValue` for your username (and the internal user id)
* `telephone`, `address` (`PostalAddress`), `knowsLanguage`, `url`, `description`, `gender` when those values are present

Chamilo-specific profile fields that have no natural schema.org property — timezone, roles, last login, and most user extra fields — are listed under `additionalProperty` as `PropertyValue` entries. Extra fields whose names look like secrets (password, token, API key, and similar) are omitted. Legal-consent extra fields are exported in the `consents` section instead of here. API tokens are never included.

### `learning_activities` — xAPI statements

Course and session enrolment, exercise attempts and results, learning-path progress, assignments, forum posts, certificates, survey answers, and attendance are exported as an array of [xAPI (Experience API)](https://github.com/adlnet/xAPI-Spec) statements. Each statement uses the usual xAPI shape:

* **actor** — an Agent. The Inverse Functional Identifier is an `account` (`homePage` is the portal URL, `name` is your username), plus a display `name`. Email is not repeated here; it lives on the `Person`.
* **verb** — a standard ADL verb IRI such as `http://adlnet.gov/expapi/verbs/registered`, `attempted`, `completed`, `passed`, `answered`, `commented`, or `attended`, with a short `display`.
* **object** — an Activity whose `id` is an IRI built from the portal URL, plus a `definition` with `name` and a type IRI (`http://adlnet.gov/expapi/activities/course`, `assessment`, `module`, and similar).
* **result** — when it applies: `score` (`raw`, `min`, `max`, `scaled`), `success`, `completion`, and `duration` in ISO 8601 (for example `PT5M`).
* **context** — `contextActivities.parent` is the course; the session id and course code, when known, are in `extensions` (`https://chamilo.org/xapi/extensions/session-id` and `https://chamilo.org/xapi/extensions/course-code`).
* **timestamp** — when the activity took place, as ISO 8601.

Typical mappings:

| What in Chamilo | Verb | Activity type |
| --- | --- | --- |
| Course or session subscription | `registered` | course, or Chamilo's session activity type |
| Exercise attempt | `attempted` or `completed` | assessment |
| Learning path progress | `attempted` or `completed` | module |
| Assignment submission | `completed` | assignment |
| Forum post | `commented` | forum topic |
| Gradebook certificate | `passed` | course |
| Survey answer | `answered` | cmi.interaction |
| Attendance sheet | `attended` | meeting |

### Other sections

These use schema.org types where a natural one exists:

* `messages` — `Message` (inbox items you sent or received)
* `consents` — `AgreeAction` for legal agreement and related consent extra fields
* `logs` — `Action` for login sessions, `DownloadAction` for recorded downloads
* `notebooks` — `DigitalDocument`
* `wikis` — `Article`
* `tickets` — `Question`
* `ticket_messages` — `Message`
* `assignment_comments` — `Comment`
* `course_votes` — `Rating`
* `groups` and `course_categories` — kept as named arrays with their existing field names when no single schema.org type fits cleanly


## The XML Download

The XML file is a direct mapping of the JSON-LD document, produced with an XML writer (not by concatenating strings). Characters that are not allowed in XML 1.0 are stripped, and every text value is escaped.

The root element is `chamiloPersonalData`. It declares `xmlns:schema="https://schema.org/"`. The envelope fields `format`, `version`, and `generated_at` are child elements.

The `user` section contains a `schema:Person` element. Profile properties use schema.org element names (`schema:givenName`, `schema:familyName`, `schema:email`, `schema:alternateName`, `schema:telephone`, `schema:address` / `schema:PostalAddress`, `schema:knowsLanguage`, and so on). The JSON-LD `@id` is written as an `id` attribute. Chamilo-specific fields stay under repeating `schema:additionalProperty` / `schema:PropertyValue` elements, just as in JSON-LD.

Each learning activity is a `statement` under `learning_activities`, with the same xAPI children: `actor`, `verb`, `object`, `result`, `context`, and `timestamp`. Language maps such as a verb `display` become `<value xml:lang="en-US">…</value>`. xAPI extension IRIs, which are not valid XML names, become `<extension id="https://chamilo.org/xapi/extensions/…">` elements.

Other sections keep their JSON names (`messages`, `consents`, `logs`, and the rest). Items that have a schema.org `@type` are written with the matching `schema:` element (`schema:Message`, `schema:AgreeAction`, `schema:DigitalDocument`, and so on).

Sending to a URL always uses the JSON-LD document, so a receiving service only has to implement one parser and the HMAC verification below.

## Verifying a Transfer Signature

When you (or a receiving service) use **Send to a URL**, Chamilo POSTs the JSON body to that address and signs the request with HMAC-SHA256. The receiving service should verify the signature before accepting the payload.

The signed string is three lines joined by a newline:

```
{timestamp}
{nonce}
{sha256_hex(raw_body)}
```

that is, the Unix timestamp, a unique nonce, and the SHA-256 hex digest of the **raw request body**, in that order. The HMAC-SHA256 of that string is sent in these headers:

* `X-Chamilo-Signature`: `sha256=` followed by the hex HMAC
* `X-Chamilo-Timestamp`: the Unix timestamp
* `X-Chamilo-Nonce`: the unique request id

The shared secret is the platform setting `privacy.personal_data_export_hmac_secret`. Only your administrator can share that secret with a receiving service. To verify:

1. Recompute `SHA-256` of the raw body you received (hex, lowercase).
2. Build the string `{timestamp}\n{nonce}\n{body_hash}` from the `X-Chamilo-Timestamp` and `X-Chamilo-Nonce` headers.
3. Compute HMAC-SHA256 with the shared secret and compare it to the value after `sha256=` in `X-Chamilo-Signature`, using a constant-time comparison.
4. Reject the request if the timestamp is too old, if the nonce was already used, or if the signature does not match.

A short example in Python:

```python
import hashlib, hmac

def verify(body: bytes, timestamp: str, nonce: str, signature_header: str, secret: str) -> bool:
    body_hash = hashlib.sha256(body).hexdigest()
    payload = f"{timestamp}\n{nonce}\n{body_hash}".encode()
    expected = hmac.new(secret.encode(), payload, hashlib.sha256).hexdigest()
    received = signature_header.removeprefix("sha256=")
    return hmac.compare_digest(expected, received)
```
