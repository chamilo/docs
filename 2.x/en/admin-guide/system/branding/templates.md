# Templates

Chamilo uses templates for certificates, documents, and emails. You can customize these templates to match your organization's branding and requirements.

## Certificate Templates

Certificate templates define the layout and content of certificates awarded to learners who meet gradebook thresholds.

### Customizing a Certificate Template

Certificate templates use HTML and CSS with placeholder variables:

| Variable | Replaced with |
|----------|-------------|
| Student name | The learner's full name |
| Course name | The name of the course |
| Date | The date the certificate was earned |
| Score | The learner's final score |
| Barcode | A barcode placeholder (`((certificate_barcode))`) used for verification |

### Uploading a Template

1. Navigate to certificate template management
2. Upload or edit the HTML template
3. Use the placeholder variables where dynamic content should appear
4. Save

## Document Templates

Teachers can use document templates when creating content in the Documents tool. Templates provide a starting layout for common document types.

### Managing Document Templates

1. Navigate to template management in the administration panel
2. Add new templates by uploading HTML files
3. Templates become available to teachers when they create new documents

## Tips

* **Include your logo** — Add your organization's logo to certificate templates for a professional look
* **Test with real data** — Preview certificates with actual learner data before deploying the template
* **Keep templates simple** — Simple designs print better and look professional
