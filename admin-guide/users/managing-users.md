# Managing Users

This page covers the day-to-day tasks of creating, editing, and managing user accounts.

## User List

![The user list showing accounts with name, email, role, and status columns](/.gitbook/assets/admin-user-list.png)

From the administration panel, click **User list** to see all users on the platform. The list shows:

* User name and avatar
* Email address
* Role/status
* Registration date
* Last login
* Active/inactive status

Use the **search and filter** tools to find specific users by name, email, role, or other criteria.

## Creating a User

![The user creation form with fields for name, email, username, password, role, and language](/.gitbook/assets/admin-user-create-form.png)

1. Click **Add a user** from the administration panel
2. Fill in the required fields:
   * **First name** and **Last name**
   * **Email** — Must be unique on the platform
   * **Username** — The login name (must be unique)
   * **Password** — Set an initial password
   * **Role** — Select the user's platform role (student, teacher, admin, etc.)
   * **Language** — The user's preferred interface language
3. Optionally fill in additional fields:
   * Phone number
   * Expiration date — Automatically deactivate the account after a date
   * Active/inactive status
   * Extra profile fields (if configured)
4. Save

## Importing Users

![The user import interface for uploading CSV or XML files with user data](/.gitbook/assets/admin-user-import.png)

For bulk user creation, you can import users from a file:

1. Click **Import users** from the administration panel
2. Upload a **CSV** or **XML** file with user data
3. Map the file columns to Chamilo user fields
4. Choose how to handle existing users (update or skip)
5. Import

The import file should contain columns for at least: first name, last name, email, username, and password.

## Exporting Users

Click **Export users** to download the user list as a CSV or XML file. You can filter which users to export by role, registration date, or other criteria.

## Editing a User

Click on a user's name in the user list to edit their account. You can modify:

* Personal information (name, email, phone)
* Role/status
* Password (reset)
* Active/inactive status
* Expiration date
* Extra profile fields

## User Actions

| Action | Description |
|--------|-------------|
| **Deactivate** | Disable a user's account without deleting it. The user cannot log in but their data is preserved. |
| **Activate** | Re-enable a previously deactivated account |
| **Delete** | Permanently remove the user account and associated data |
| **Login as** | Log in to the platform as this user (impersonation). Useful for troubleshooting. |

> **Login as** is a powerful feature. Use it responsibly and only for legitimate support purposes.

## Batch Operations

Select multiple users in the user list to perform batch actions:

* Activate or deactivate multiple users at once
* Delete multiple users
* Assign users to a course or session

## Tips

* **Use CSV import for large enrollments** — When onboarding many users at the start of a training program, prepare a CSV file and import in bulk
* **Set expiration dates** — For temporary users (workshop participants, trial users), set an expiration date to automatically deactivate their accounts
* **Deactivate rather than delete** — When a user leaves, deactivate their account first. This preserves their training records. Only delete if you are sure the data is no longer needed.
