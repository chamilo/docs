# Custom Certificate

The Custom Certificate <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Custom Certificate" data-size="line"> plugin lets you replace the standard [gradebook certificate](../assessing-learners/gradebook.md) with your own design — logos, a seal, up to four signature images with captions, a background image, margins, and content built from placeholder tags.

## Turning It On for Your Course

After your administrator enables the plugin and sets a default template, turn it on per course from **Course Settings**:

* **Custom certificate enable in course** — Activates the feature for this course
* **Use default custom certificate** — Uses the platform's default template instead of designing your own (these two options are mutually exclusive; Chamilo warns you if you try to enable both)

This makes a **Certificate setting** tool available in your course, where you design or edit the template.

## Designing the Certificate

The certificate editor uses tags that get replaced with real data when a learner's certificate is generated, for example `((user_firstname))`, `((course_title))`, `((gradebook_grade))`, and `((date_certificate))`. Beyond content, you can set:

* Up to three logos, a seal image, and a background image
* Up to four signature images, each with its own caption
* Margins and the delivery/expedition date and place shown on the certificate

Use **Certificate** to preview your design, or **Delete certificate** to remove a course's custom template.

## Tips

* **Students see nothing different** — They still download their certificate the normal way from the Gradebook; it just uses your template
* **Preview before relying on it** — Check the preview with real placeholder data to catch layout issues before learners start generating certificates
* **Coordinate with your administrator** — If you want a platform-wide default template rather than a one-off per course, that's set up by your administrator first
