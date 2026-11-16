# Open Badges 2.0 Issuance and Verification

Chamilo 3.1 can publish **Open Badges 2.0** credentials for acquired skills, including a badge image that carries a baked assertion in PNG metadata. Badge verification uses public badge, assertion and issuer endpoints.

## Configure the issuer and skills

1. Set the platform's **institution name** and a valid **administrator contact email**; both are required by the issuer profile.
2. Configure the skill with a title, description and badge criteria.
3. Attach a valid PNG badge image where appropriate. Chamilo can also use its default badge image if the skill has no custom asset.
4. Award or validate acquisition of the skill for the learner through the normal skills workflow.

Credentials depend on the acquired skill relation. A revoked or no-longer-acquired skill assertion is reported as revoked. Skill and badge resources are scoped to the appropriate access URL.

## Public verification data

Each issuance has a hosted assertion. The related URLs are derived from the application's public root and include:

- `main/skills/assertion.php?issue=<issue-id>` — JSON assertion for a specific skill issuance.
- `main/skills/class.php?id=<skill-id>` — badge class metadata, including criteria and issuer reference.
- `main/skills/issuer.php` — issuing institution profile.
- `main/skills/image.php?id=<skill-id>` — badge image resource.

The exact generated URLs depend on the installation's public base path. The assertion includes a salted hash of the recipient's email instead of publishing the plain email address, and identifies the issuer and acquired skill. The badge PNG can include the assertion in an `openbadges` iTXt chunk.

## Validate an issued badge

Open the hosted assertion, badge class and issuer endpoints without a logged-in session. They should return a consistent linked credential. Download the issued PNG through the skill's supported export flow and verify that its embedded assertion matches the hosted representation. If the skill is revoked, check that verification reflects its revoked state.

A PNG with visual badge artwork alone does **not** prove a valid credential. Do not confuse Open Badges 2.0 issuance with unrelated certificate or signed-PDF functionality.

See [Managing Skills](managing-skills.md) and [Signed Certificate Verification](../maintenance/signed-certificate-verification.md). Implementation: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).
