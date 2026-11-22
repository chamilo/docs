# Content Security Policy (CSP)

Chamilo 3.1 provides optional Content Security Policy (CSP) management for HTML pages using its shared application layout. CSP is a browser-side defense in depth against unauthorized script execution and other resource loads. It does not replace access control, HTML filtering, secure file handling, or antivirus scanning.

## Configure the policy

Open [Security Settings](security-settings.md) under **Administration > Configuration settings > Security** (`/admin/settings/security`). The setting **Content Security Policy mode** (`security.content_security_policy_mode`) has three values:

| Mode | Header sent by Chamilo |
| --- | --- |
| Disabled (`disabled`, default) | No new application CSP header. |
| Report only (`report_only`) | `Content-Security-Policy-Report-Only`, using `security.security_content_policy_report_only`. |
| Enforce (`enforce`) | `Content-Security-Policy`, using `security.security_content_policy`. |

Set the policy text in the corresponding existing setting before selecting the mode. Policy values from older installations are preserved; they may contain compatibility-oriented examples, not a suitable strict policy. An empty policy explicitly omits the selected header. Policy text must contain printable ASCII characters and must not exceed 8,192 bytes (including nonce expansion at runtime). Invalid or oversized header values are rejected by the form or skipped with a server warning; an unreadable or invalid configuration does not automatically fall back to a restrictive policy. The browser interprets the CSP directive syntax. Effective settings follow the existing Access URL configuration and locking rules.

## Nonces and CSP Level 3

A quoted source expression `'nonce-{nonce}'` is replaced with a fresh cryptographically random nonce for the response. Chamilo provides the matching nonce to explicitly marked core scripts in the shared layout, including Vue/Encore bundles, the Vue bootstrap, theme editor settings, the cookie banner and the MathJax bundle when present. It does not search the outgoing HTML for script tags or automatically authorize teacher content, arbitrary legacy JavaScript, custom tracking snippets or plugin code.

The browser supports additional CSP Level 3 directives according to its own implementation. For example, `script-src-attr 'none'` prohibits inline event-handler attributes and `'strict-dynamic'` propagates trust to scripts loaded by trusted scripts. Review the interaction of `script-src-elem` with `script-src` if both are set. A nonce authorizes scripts, not arbitrary inline event handlers. Nonce-bearing application responses are marked private and non-cacheable; configure upstream caches to honor this.

## Example for a staging portal

The following policy is a starting point for testing a production asset build (`yarn build`), not a universally compatible policy for every installation:

```text
default-src 'self'; script-src 'self' 'nonce-{nonce}' 'strict-dynamic'; script-src-attr 'none'; style-src 'self' 'unsafe-inline'; img-src 'self' data: blob:; font-src 'self' data:; connect-src 'self'; media-src 'self' data: blob:; worker-src 'self' blob:; frame-src 'self'; object-src 'none'; base-uri 'self'; frame-ancestors 'self'; form-action 'self';
```

Test this first in **Report only**. The development Webpack build uses eval-based source maps, so development testing may require `'unsafe-eval'` in `script-src`. Do not add it to a production policy just to make development bundles work. In Symfony's `dev` environment, WebProfiler can inject its own scripts with a separate nonce. Temporarily disable its toolbar for CSP validation by setting `web_profiler.toolbar: false` in a local development-only configuration (for example, a temporary YAML file under `config/packages/dev/` in the LMS repository). Clear the development cache afterwards. Restore the original development configuration after testing; do not commit a test-only override. The production application does not need the debug toolbar. The example still permits inline styles; it is a starting point, not a fully strict styles policy. Add only the frame, media, connection and asset origins genuinely required by your portal. External learning activities, LTI, authentication integrations, editors and video conferencing may need additional policy review.

## Verify the configuration

1. Use a test portal and check the document response in the browser Network panel with the mode disabled.
2. Enter a policy in the report-only field and select Report only. Inspect the response headers and browser Console. CSP violations should not prevent the operation from proceeding. A reporting receiver may be configured separately using appropriate CSP reporting directives; Chamilo does not install a CSP report collector or dashboard.
3. Review login/logout, navigation, course tools, editors, learning paths, embedded documents and required plugins. Resolve violations before considering enforcement.
4. Copy the reviewed policy to the enforcement field and select Enforce on the test portal. Verify that an unapproved inline script cannot execute, and that approved scripts, normal user actions and redirects still work.
5. Reload a page twice and check that the nonce changes, with the scripts and header matching within each response.

If using `report-uri` or `report-to`, configure a compatible receiving service and (for `report-to`) the required reporting endpoint configuration separately. Reports can contain sensitive resource URLs: review privacy and retention before forwarding them.

## Scope and operational recovery

The new application policy covers HTTP 200 HTML responses using the shared layout, including routed Symfony pages and the two direct legacy Twig response paths. It does not add a new policy to raw uploaded files, downloads, JSON responses, standalone plugin pages or other unreviewed rendering paths. Existing dedicated content security policies (including specialized document and activity responses) take precedence and are not replaced. Separate policies injected by the web server or proxy can also apply; review their interaction because multiple CSP policies are enforced together.

Before enabling enforcement, make sure you have server access and a recovery path. If the interface becomes unusable, temporarily override the mode to `disabled` in the existing `config/settings_overrides.yaml` file, preserving its other contents. For a default setting override:

```yaml
parameters:
    settings_overrides:
        default:
            'security.content_security_policy_mode': 'disabled'
```

An explicit override under an Access URL ID takes precedence over the default. Update that override too if applicable, then clear the appropriate Symfony cache. The setting is independent of `security.teacher_use_js` and of antivirus scanning. It is opt-in; it does not claim that all Chamilo legacy tools and plugins are compatible with a strict policy without additional testing.

## Developer validation

In the LMS repository (not the documentation repository), run the focused PHPUnit test `tests/CoreBundle/Security/ContentSecurityPolicyTest.php`. The browser-driven scenario `tests/playwright/features/contentSecurityPolicy2575.feature` can be run explicitly against a staging or local installation. Generate the BDD scenarios with the repository's usual `bddgen` command, set `BASE_URL` to the test portal, and run the scenario with `CSP2575_MODE=disabled`, `report_only` and `enforce` separately, after configuring the matching mode in the administration interface. For the active modes, use the example nonce-based policy above, adjusted for the test asset build and local debug toolbar. A successful run verifies the actual login response, Vue initialization, nonce rotation and cache headers, and uses the server's CSP header in an isolated browser probe to check the expected script execution and violation events. It does not establish compatibility for every course tool or integration. Restore the original mode and policies after testing.

See also [Content Security Policy (MDN)](https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Content-Security-Policy) and [CSP Level 3](https://www.w3.org/TR/CSP3/).
