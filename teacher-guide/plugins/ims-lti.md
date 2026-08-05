# IMS/LTI Client

IMS/LTI Client <img src="/.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI Client" data-size="line"> lets you launch an external tool or content provider from inside your course using the LTI standard (versions 1.1 and 1.3) — for example, a publisher's interactive textbook, a specialized simulation tool, or another platform that supports LTI. Chamilo acts as the launching platform; the external service is the "tool."

## Accessing the Tool

Once enabled, a **Configure external tools** button appears in your course's **Settings** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line">. From there you can either:

* **Add a new external tool** — Register one yourself: name, launch URL, LTI version, and the credentials the external service gave you (client ID/keys for LTI 1.3, or a consumer key and secret for LTI 1.1)
* **Add an existing global tool** — If your administrator has already registered a platform-wide tool, add it to your course instead of creating your own connection

Once added, the tool appears as a regular tool/shortcut on your course homepage.

## What You Can Configure

For a tool you registered yourself: whether it opens in an iframe or a new window, whether the learner's name, email, and picture are shared with the external service, custom launch parameters, and (for LTI 1.3) Deep Linking support. If the tool supports the Assignment and Grades Service, you can also create a linked gradebook column so scores it reports back feed your Chamilo gradebook.

For a tool added from a platform-wide "global" definition, you can only adjust these course-level presentation and privacy options — the connection credentials themselves belong to whoever registered the base tool (usually your administrator).

## Tips

* **Get credentials from the tool provider first** — You'll need the launch URL and either LTI 1.3 client/key details or an LTI 1.1 consumer key and secret before you can register a new tool
* **Be deliberate about what you share** — Only enable sharing a learner's name, email, or picture with an external service if the tool actually needs it
* **Ask your administrator about global tools** — If the same external tool is used across many courses, a platform-wide registration avoids every teacher configuring their own connection separately
