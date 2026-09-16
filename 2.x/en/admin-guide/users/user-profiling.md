# User Profiling

Chamilo allows you to define custom profile fields (extra fields) to capture additional information about users beyond the standard name, email, and role.

## Extra Profile Fields

![The extra profile fields list showing custom fields with name, type, and visibility settings](/.gitbook/assets/admin-extra-fields-list.png)

Extra fields let you store metadata specific to your organization, such as:

* Employee ID
* Department
* Job title
* Location/office
* Phone number
* Custom identifiers

## Creating Extra Fields

1. From the administration panel, navigate to **Extra fields** or **Profile fields**
2. Click **Add**
3. Configure the field:
   * **Name** — The field title shown to users
   * **Description** — Optional description
   * **Helper text** — To be shown under the field in any form including it
   * **Field type** — Text, dropdown, date, checkbox, etc.
   * **Field label** — The internal name of the field, for plugins integration 
   * **Possible values** — If the field is a selector between those values 
   * **Default value** — An optional default
   * **Visible to self** — Whether the field is visible on the user profile by the user itself
   * **Visible to others** — Whether the field is visible to other users of the platform
   * **Can change** — Whether the user can change its own field by himself (or whether only the admins can)
   * **Filter** — If this is a selector-type field, whether to include it as a filter in administrative pages (e.g. to subscribe users to courses or sessions)
   * **Order** — If you want to manage the display order of the fields, you will have to give a numerical order to each field
   * **Remove on anonymization** — Important for privacy rules & laws: If the user is anonymized but not deleted, should this field be considered as potential holder of personally identifiable data? 
4. Save

## Field Types

The extra-field engine supports a broad set of input types. Common ones include:

| Type | Description |
|------|-------------|
| **Text** | A single-line text input |
| **Textarea** | A multi-line text input |
| **Radio** | A single-choice radio group |
| **Dropdown / Dropdown multiple** | A list of predefined options (single or multi-select) |
| **Double select** | Two dependent dropdowns (e.g., country → city) |
| **Checkbox** | A yes/no toggle |
| **Date / Date and time** | Date or date+time picker |
| **Integer** | A numeric input |
| **Tag** | Multiple free-form tag values |
| **File** | File upload field |
| **Video URL** | A URL pointing to a video |
| **Mobile phone number** | A formatted phone number field |
| **Timezone** | A timezone picker |
| **Social profile** | A link to a social network profile |
| **Divider** | A visual separator inside the form (no value) |

The exact set of usable types depends on the Chamilo version; the field-type dropdown in the **Extra fields** admin page is the source of truth.

## Using Extra Fields

Extra fields appear:

* In the user creation (if visible to self) and edit forms
* On user profile pages (if visible to self)
* In user imports (you can include extra field values in CSV imports)
* In exports and reports (filter or group by extra field values)

## Tips

* **Plan before creating** — Define what information you need before creating fields, as changing field types after data has been entered can be problematic
* **Use dropdowns for consistency** — When a field has a known set of possible values, use a dropdown instead of free text to ensure data consistency
* **Use for reporting** — Extra fields are useful for filtering reports (e.g., "show all users in Department X who completed Training Y")
