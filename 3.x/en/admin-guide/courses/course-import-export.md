# Course Import and Export

Chamilo supports importing and exporting courses for backup, migration, and content sharing purposes.

These features are located inside the course, in the **Maintenance** tool located under the cog icon at the top of the course homepage.

## Exporting a Course

Teachers can export their own courses from the course Maintenance tool. As an administrator, you can export any course:

1. Enter the course
2. Access the **Course maintenance** tool
3. Select **Create a backup**
4. Choose what to include (content, user data, etc.)
5. Download the export file

The export creates a package containing the course's documents, exercises, forums, learning paths, and configuration.

## Importing a Course

To import a course from a Chamilo export file:

1. Enter the course
2. Access the **Course maintenance** tool
3. In the **Import backup** section, upload the export file
4. Choose what to include (content, user data, etc.)
5. Configure import options:
   * Whether to overwrite existing content
   * Whether to include user data
6. Run the import

## Copying a Course

To copy the contents from another course into your course, you will need a source course and a destination course to be created first.

1. Enter the destination course
2. Access the **Course maintenance** tool
3. In the **Copy course** section, select the **Source** course
4. Validate the options
5. Click **Continue** and follow the instructions

## Common Cartridge

Chamilo supports the **IMS Common Cartridge 1.3** (IMS CC 1.3) standard for interoperability with other learning management systems. You can:

* **Import** Common Cartridge packages (.imscc files)
* **Export** course content in Common Cartridge format

This allows content exchange with other platforms that support the Common Cartridge standard (Moodle, Canvas, Blackboard, etc.).

## Recycling a course

The course recycling feature simply allows you to keep the shell of the course but to erase its content.

## Deleting a course

This will completely erase your course, including all its contents and the user activity in it.

To delete a course permanently:

1. Enter the destination course
2. Access the **Course maintenance** tool
3. In the **Completely delete this course** section, enter the code of the course manually to confirm your intention
4. Validate

You then get redirected to the portal homepage, because the course does not exist anymore.

## Moodle Import

Chamilo can import course backups from **Moodle**. The importer converts Moodle's content structure to Chamilo's format, including quizzes, documents, and course settings.

> **Work in progress.** Although it already covers a wide base, the Moodle importer does not currently cover every Moodle activity type and content format. Treat it as a starting point that may still require manual adjustment after the import completes. If you detect any failing/missing element in the import or export, please report it to us through our [Github space](https://github.com/chamilo/chamilo-lms/issues) by clicking **New issue** at the top and giving as much details as possible (including the course backup itself if it's not confidential).

## Checking course backup and restore dependencies (September 2026)

Recent fixes to Chamilo's course backup and Moodle-compatible MBZ import/export improve the restoration of **related resources**, not just the list of activities. When testing a backup round-trip, check both the imported content and the links between resources:

1. **Exercises:** Open restored quizzes and verify that the questions used by the quiz are present and in the expected order. The export process now takes account of quiz-question dependencies instead of assuming that every referenced question was selected independently ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
2. **Learning path documents and videos:** Play the restored learning path and open its document, HTML and video steps. Resource references are matched against the imported resources; a learning path may reference a document that was not listed by the ordinary course-document selection ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
3. **Final item ordering:** If the original learning path has a terminal **Final item** (for example, a closing page with certificate information), verify that it remains **after the regular steps**. Archives from legacy content may encode the final step with an outdated position; the export/import flow normalizes that position ([PR #9121](https://github.com/chamilo/chamilo-lms/pull/9121)).
4. **Forum and Gradebook references:** Open restored forum discussions and posts, and then check **Assessments (Gradebook)** entries linked to forum threads or participation. The restored links must point to the **destination thread**, not a source-course identifier. This was improved in the MBZ forum importer ([PR #9143](https://github.com/chamilo/chamilo-lms/pull/9143)).
5. **Prerequisites and images:** Check any learning path prerequisites and verify that image files display as images rather than being misidentified as HTML. Import fixes address ID remapping and document classification. A separate migration repairs selected **bundled demo courses**; do not assume it automatically repairs arbitrary custom courses ([PR #9137](https://github.com/chamilo/chamilo-lms/pull/9137)).

**Recommended verification:** Export a representative course, preserve the original archive, restore it into a **separate test course**, and compare exercise questions, learning path navigation, prerequisite behavior, forum discussions and linked Gradebook resources. Do not overwrite a production course to test portability. Source and destination internal IDs can legitimately differ; judge the result by the restored resource and its working links. Moodle import still does not cover every activity type, so check unsupported items manually and report a reproducible missing-resource case with a **sanitized** test archive.

## Tips

* **Regular backups** — Encourage teachers to export their courses periodically as a backup
* **Test imports** — When importing content from another platform, test the import in a trial course first to verify that everything transferred correctly
* **Content portability** — Use Common Cartridge format when you need to share content with other LMS platforms
