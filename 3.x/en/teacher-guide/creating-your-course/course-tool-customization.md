# Customize Course Tool Names and Icons

Chamilo 3.1 allows authorized course editors to customize the **name** and **SVG icon** displayed for a tool on a course homepage. These changes are scoped to the course and preserve existing tool destinations.

## Customize a tool

1. Open the course homepage as a user allowed to edit the course.
2. Enable **Customize** mode in the tool grid.
3. Open the customization form for the tool you want to change.
4. Enter the desired **Name** and, if required, select an **Icon** SVG file.
5. Select **Save** and verify the updated tool in the homepage grid.

Tool customization is distinct from the grid's **Sort**, **Show all** and **Hide all** modes. Changing a tool's label or icon does not create a new tool, change its underlying URL or grant additional access to learners.

## SVG requirements and security

Use an SVG file from a trusted source. Chamilo validates uploaded SVG content and rejects unsafe files. If a file is rejected, simplify or re-export it as a clean SVG instead of trying to bypass the validation.

Confirm the resulting icon and name as both a teacher and a student, and verify another course remains unchanged. Students cannot customize tools unless they have the required course editing permissions.

See [Course Homepage](course-homepage.md). Implementation: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).
