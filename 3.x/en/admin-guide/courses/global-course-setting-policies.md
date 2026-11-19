# Global Course Setting Policies

Platform administrators can define centralized defaults for course settings and control whether teachers may override them. Policies apply to existing course functionality while preserving compatible course-specific configurations.

## Open the policies page

On the **main access URL**, open **Administration > Settings > Course settings**, or navigate to `/admin/settings/course-settings` on your installation. This administration page is reserved for authorized platform administrators on the main access URL. Do not use a secondary portal to edit global policies.

## Configure a policy

1. Use the **Search** field if you need a specific course-setting key.
2. For each setting, check the exact variable name shown under its heading.
3. Select or clear **Editable in course** to control whether course editors can change that setting.
4. Choose or enter a **Default platform value**. Some settings offer an allowed-values dropdown; others accept text.
5. Save the changes and verify the effective behavior in a test course.

Settings that reuse the same variable name in different categories are displayed separately where necessary. Do not assume that two visually similar names control the same course feature.

## Verify with two roles

As an administrator, confirm the stored default and whether it is editable. As a course teacher, open the corresponding course setting and check that the effective value and edit restriction match the policy. Test both an existing course and a new course where possible.

Changing a global default may affect many courses. Review its impact before disabling teachers' overrides, and record the previous policy values so they can be restored if needed.

See [Managing Courses](managing-courses.md) and [Course Settings](../../teacher-guide/creating-your-course/course-settings.md). Implementation: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).
