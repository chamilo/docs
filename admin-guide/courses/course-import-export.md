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

## Tips

* **Regular backups** — Encourage teachers to export their courses periodically as a backup
* **Test imports** — When importing content from another platform, test the import in a trial course first to verify that everything transferred correctly
* **Content portability** — Use Common Cartridge format when you need to share content with other LMS platforms
