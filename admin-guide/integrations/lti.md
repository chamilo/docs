# LTI 1.3

**LTI** (Learning Tools Interoperability) is a standard that allows external learning tools to be embedded within Chamilo. Version 1.3 is the latest and most secure version of the standard.

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

Once an LTI tool is registered by the administrator, teachers can add it to their courses:

1. In the course, look for the option to add an external tool
2. Select from the registered LTI tools
3. The tool appears as a course tool on the homepage

## Security

LTI 1.3 uses:

* **OAuth 2.0** for authentication
* **JSON Web Tokens (JWT)** for message signing
* **Public/private key pairs** for verification

This means credentials are never shared directly between Chamilo and the external tool.

## Grade Passback

LTI tools can send grades back to Chamilo, which can be integrated into the course gradebook. This is configured per tool during registration.

## Tips

* **Verify tool compatibility** — Ensure the external tool supports LTI 1.3 (not just older versions)
* **Test in a sandbox** — Test the LTI integration in a test course before using it in production
* **Monitor performance** — External tools add network dependencies. Ensure the tool is responsive and reliable.
