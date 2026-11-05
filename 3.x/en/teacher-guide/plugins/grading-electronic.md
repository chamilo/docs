# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exports the learners who passed your course, with their gradebook score, to the file an external certification body imports: either a fixed-format text file or a roster spreadsheet.

## Opening the Export Block

Once enabled, the toolbar of your course's **Assessments** (gradebook) tool gets an **Export** icon. Click it to show the **Grading Electronic** block on the same page; click it again to hide it.

The block has three fields:

* **Preview** — checked by default. While it is checked, nothing is saved: the block only shows what the export would contain
* **Date range** — the start and end dates of the course. The start date goes in the text file's header line, the end date is the date each learner passed
* **Course ID** — the course's identifier at the certification body. It is pre-filled with the value used for the previous export

## Previewing the Export

With **Preview** checked, the block offers a single **Preview** button. It lists every learner of the course (or of the session you are in) with their score and a **PASS** or **SKIP** status, and shows the content of the text file. Only learners who meet the gradebook's passing criteria are marked **PASS**; the others are left out of the export.

## Generating the File

Uncheck **Preview** to replace the **Preview** button with two buttons:

* **Generate TXT** — downloads the fixed-format text file: a header line with the provider ID, the course ID and the start date, then one line per learner who passed
* **Generate XLSX** — downloads the roster spreadsheet, with one row per learner who passed and the columns **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** and **Comment**

Both buttons do the same thing besides the file: they save the **Course ID** for the next export and, if the gradebook generates certificates, generate the certificate of each learner who passed.

## What's in the Spreadsheet

* **FireTRAQ ID** — the learner's ID at the certification body, read from their `fcdice_or_acadis_student_id` profile field
* **Score** — the gradebook score as a whole percentage (0 to 100), whatever the gradebook's total weight
* **Grade** — always **Pass**, since only learners who passed are exported. The cell still offers the **Pass**, **Fail** and **Incomplete** choices if you need to edit the file
* **Date Earned** — the end date of the date range
* **Comment** — left empty

## Tips

* **Check the learner IDs first** — A learner without an ID in their profile is still exported, with an empty **FireTRAQ ID**. Use the preview to spot them before generating the file
* **The provider ID and course hours** come from the course's extra fields, set by your administrator when the plugin was installed
