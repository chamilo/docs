# Saving a course

The platform administrator can save any course from (among other methods) the administrative interface.

1. Go to : « Administration » → « Courses list » :

![](../../../.gitbook/assets/images13%20%288%29.png)

_Illustration: Administration – Courses block_

1. Click on the CD icon, for the course to export.

![](../../../.gitbook/assets/graficos33%20%286%29.png)

_Illustration: Administration – Courses list – Backup_

1. Chamilo then suggests to « Generate a backup » or « Import backup information » from backup. Click on _Generate backup_.

![](../../../.gitbook/assets/sauvegardecours_-backup%20%281%29.png)

_Illustration: Administration - Backup_

1. You can choose between a complete backup and a specific selection (depending on your needs). Let's pick _Complete_ backup for the example.

![](../../../.gitbook/assets/sauvegardegenerer_-backup%20%283%29.png)

_Illustration: Administration – Backup settings_

1. The backup is generated and you just have to click the zip file button to download it.

![](../../../.gitbook/assets/sauvegardebackup_-ok%20%283%29.png)

_Illustration: Administration – Backup, results of backup generation_

1. On clicking the _Generate backup_ button, Chamilo creates a backup file which, by default, ends up in its _chamilo/archive_ directory. You can thus recover it by direct access, but that means other people can also have access to it. This means, as an admin, that you should both have a regular process to clean this directory (we offer one in the _main/cron_ directory but you have to execute it) **and** that you should set your configuration (through .htaccess or VirtualHost config) to avoid direct navigation inside the _main/archive_ directory.

There is also another way to generate backups...

As admin or teacher, click on the _My courses_ tab, then on one of the courses available. Then it is possible to generate a backup pretty much the same way clicking on the _Maintenance_ tool.

![](../../../.gitbook/assets/administrationmaintenance%20%283%29.png)

_Illustration: Interface – Course administration tools_

The interface is slightly different...

![](../../../.gitbook/assets/proprietemaintenance%20%283%29.png)

_Illustration: Interface – Course backup options_

With the course backup options, you can still execute three more functions:

* **Course copy** allows you to duplicate all or part of a course into another (preferably empty) course. The only required state before this is to have a first course with something to copy, and another course which doesn't contain the elements of the first one.
* **Empty course** allows you to empty the whole contents of a course. Let's say you want to start a fresh course inside the same “shell” as the previous one... just click this link and all the resources previously created will be gone, with no chance to recover them. Obviously, before you do that, you might want to recover the course element through a _Course backup_ operation.
* **Delete** allows you to delete the whole course, this also means removing its empty shell. A confirmation is required, but once it's removed, don't expect it to be available as a safe copy anywhere...

**Note** : when opening the backup's .zip file, you will find a close similarity with the _Documents_ tool documents hierarchy.

For your information, the default .zip file for a course initially created with example content weighs around 8.9MB.

It contains :

* one internal structure file named course\_info.dat
* one directory called _Document_
* a series of files and folders containing the course documents, anything not linked to the users (assignments and other stuff user-related are not saved)

The _Document_ directory has a structure similar to the one presented in an illustration above which reproduces the documents tool structure.

![](../../../.gitbook/assets/structuredoc%20%283%29.png)

_Illustration: Backup – Backup files structure_

![](../../../.gitbook/assets/graficos34%20%286%29.png)

_Illustration: Interface – Documents list_

These documents are the default contents of the course.

Furthermore, the backup will only recover documents (images, videos, etc.) related to the course.

