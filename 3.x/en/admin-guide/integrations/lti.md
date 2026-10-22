# LTI 1.3

**LTI** (Learning Tools Interoperability) is a standard that allows external learning tools to be embedded within Chamilo. Version 1.3 is the latest and most secure version of the standard.

This tool is also reachable from the administration dashboard's [Platform](../platform/README.md) block, as **External tools (LTI)**.

## What LTI Allows

With LTI, you can embed external tools within Chamilo courses. Examples:

* Interactive simulations
* Specialized assessment tools
* Content authoring tools
* Virtual labs
* Third-party content libraries

The external tool appears seamlessly within the Chamilo interface.

## Configuring an LTI Tool

### As an Administrator

1. Navigate to the LTI settings in the administration panel
2. **Register the external tool** by providing:
   * **Tool name** — A descriptive name
   * **Login URL** — The OIDC login initiation URL of the external tool
   * **Redirect URL** — The launch URL the tool returns to after login
   * **Client ID** — Provided by the tool vendor
   * **Public keyset URL (JWKS URL)** — The tool's JWKS endpoint for security key exchange
3. Configure **grade passback** — Whether the tool can send grades back to Chamilo
4. Save

### As a Teacher

Once the **ImsLti** plugin is enabled, teachers with course-editing permissions can configure external tools in their course:

1. Open the course's **External tools (LTI)** configuration. The course-specific form supports both **LTI 1.3** and legacy **LTI 1.0/1.1** integrations; choose the version matching the tool provider.
2. Add a tool or select a reusable tool made available by your administrator. For LTI 1.3, enter the provider's launch and authentication information; the form supports a public keyset URL or RSA key and optional Assignment and Grade Services (AGS) and Names and Role Provisioning Services (NRPS).
3. Save the tool. Depending on its deep-linking configuration, Chamilo adds the corresponding course shortcut. Already-added tools are shown separately from available global tools.
4. To change an existing tool, use its **Edit** action from the same course context. The configuration verifies that the tool belongs to the course; a tool associated with another course cannot be edited by supplying its ID.

The form preserves course context when returning from add/edit actions and displays validation feedback on the configuration page.

## Security

LTI 1.3 uses:

* **OAuth 2.0** for authentication
* **JSON Web Tokens (JWT)** for message signing
* **Public/private key pairs** for verification

This means credentials are never shared directly between Chamilo and the external tool.

## Grade Passback and Assessments

LTI tools can send grades back to Chamilo, which can be integrated into the course **Assessments** (Gradebook). For LTI 1.3, configure the provider's **Assignment and Grade Services (AGS)** option when creating or editing the external tool. An assessment must already exist for the course if you want to link it to a Gradebook evaluation.

The plugin's **Add to Gradebook** action opens the modern Gradebook overview in the **current course/session context**. It displays an evaluation form with a **Tool** dropdown rather than using the previous legacy evaluation form. Select an available LTI tool, verify the title and grading values, and save.

* A tool is offered only when it is assigned to the current course/session context and is not already linked to a Gradebook evaluation.
* A Gradebook evaluation can be linked to an LTI tool **when creating** the evaluation, not by switching an existing evaluation to another tool.
* If no eligible tools are found, the form does not offer an unrelated tool from another course.

See [Assessments](../../teacher-guide/assessing-learners/gradebook.md) for the normal grading workflow. The course-context and Gradebook integration fixes are tracked in [PR #9196](https://github.com/chamilo/chamilo-lms/pull/9196) and [PR #9197](https://github.com/chamilo/chamilo-lms/pull/9197).

## Tips

* **Verify tool compatibility** — Prefer LTI 1.3 for new integrations; Chamilo also exposes legacy LTI 1.0/1.1 configuration when required by a tool.
* **Test in a sandbox** — Test the LTI integration in a test course before using it in production
* **Monitor performance** — External tools add network dependencies. Ensure the tool is responsive and reliable.
