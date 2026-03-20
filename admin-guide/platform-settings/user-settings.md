# User Settings

User settings control profile fields, avatars, and privacy-related options for user accounts. Access them from **Administration > Configuration settings > User**.

## Profile Field Visibility

Chamilo user profiles contain multiple fields. Administrators can control which fields are visible and editable.

| Field | Options |
|-------|---------|
| **Name** | Always visible. |
| **Email** | Visible to all, visible only to administrators, or hidden. |
| **Phone** | Visible, hidden, or editable by user. |
| **Official code** | An organizational identifier (employee ID, student number). Can be set as required or hidden. |
| **Language** | Users can change their interface language if this is editable. |
| **Extra fields** | Custom profile fields added by administrators (see below). |

To configure field visibility, go to **Administration > Configuration settings > User** and adjust the relevant options.

### Custom Profile Fields (Extra Fields)

Administrators can define additional profile fields to capture organization-specific data. Go to **Administration > Extra fields** to manage them.

Each extra field supports:

* **Field type** -- Text, textarea, select/dropdown, date, checkbox, radio, or tag.
* **Visibility** -- Visible to the user, editable by the user, or admin-only.
* **Required** -- Whether the field must be filled in.
* **Filter** -- Whether the field can be used to filter user lists.

Custom fields are useful for tracking department, location, job title, or any other metadata your organization needs.

## Avatar Settings

| Setting | Description |
|---------|-------------|
| **Allow users to upload avatars** | When enabled, users can upload a profile picture. When disabled, a default avatar is shown. |
| **Default avatar** | The image used when a user has not uploaded their own. |
| **Gravatar integration** | When enabled, Chamilo fetches the user's avatar from Gravatar based on their email address, if no local avatar is set. |

## User Export and Privacy

| Setting | Description |
|---------|-------------|
| **Allow users to export their data** | When enabled, users can download a copy of their personal data from their profile page. This supports GDPR compliance. |
| **Allow users to delete their account** | When enabled, users can request account deletion from their profile. Depending on configuration, this may require administrator approval. |
| **Anonymize deleted users** | When a user is deleted, their personal data is replaced with anonymous identifiers while preserving course tracking and statistics. |
| **Show email on certificate** | Controls whether the user's email appears on generated certificates. |

## User Login Settings

| Setting | Description |
|---------|-------------|
| **Allow multiple logins** | Whether the same user account can have simultaneous active sessions from different browsers or devices. |
| **Login as another user** | Allow administrators to log in as another user for troubleshooting. Accessible from the user list in the admin panel. |

## Tips

* **Enable data export** if your platform serves users in jurisdictions with data protection regulations (GDPR, CCPA, etc.).
* **Use extra fields** to capture organizational metadata rather than repurposing built-in fields for unintended purposes.
* **Limit email visibility** to administrators on platforms where user privacy is a concern.
