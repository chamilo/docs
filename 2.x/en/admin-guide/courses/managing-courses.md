# Managing Courses

As an administrator, you can manage all courses on the platform regardless of who created them.

## Course List

![The course list showing all courses with title, code, category, enrolled users, and visibility status](/.gitbook/assets/admin-course-list.png)

From the administration panel, click **Course list** to see all courses. The list shows:

* Course title and code
* Language
* Categories
* Visibility status

Use the **Advanced search** tool to find specific courses.

## Creating a Course

As an administrator, you can create courses and assign them to any teacher:

1. Click **Add course** from the administration panel
2. Fill in the course details (title, code, category, language)
3. Assign a teacher to the course
4. Save

Note: In Chamilo 1.11.x, the course code was shown as part of the course URL, and was impossible to change after the creation of the course. This behaviour is changing in 2.x. The course code is not visible in the URL anymore, and future versions might allow teachers to modify the course code afterwards as it become less essential to the platform.

## Managing an Existing Course

Find a course in the list to access management options in the *Actions* column:

* **Information** — Show information about the course 
* **Course home** — Sends you directly to the course's homepage 
* **Reporting** — See engagement and performance data
* **Edit** — Change course title, category, visibility, and other settings
* **Create a backup** — Go to the maintenance section of the course, where you can create copies and do other things
* **Add to catalogue** — Add this course to the course catalogue
* **Delete** — Permanently remove the course and all its content

> Deleting a course removes all content, learner data, grades, and tracking information permanently. Consider exporting the course first as a backup.

## Bulk Operations

Select multiple courses in the list to perform batch actions such as deleting them. To export a course, enter the course and use the **Maintenance** tool — there is no bulk export action on the admin course list.

## Course Visibility Settings

Administrators can override the visibility set by teachers:

| Visibility | Effect |
|-----------|--------|
| **Public** | Accessible to everyone, including anonymous visitors |
| **Open** | Accessible to all logged-in users |
| **Private** | Only enrolled users can access the course |
| **Closed** | No one can access the course (except the teacher and admins) |
| **Hidden** | No one can view or access the course (except the admins) |
