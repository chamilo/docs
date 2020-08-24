# Volledig herstel

This recovery procedure has been tested a few times, but your configuration might vary considerably from this example. Here we will use a local installation case, using PhpMyAdmin and a backup of the Chamilo root directory. For a remote server, it would require SSH / SFTP or FTP access to the server.

This recovery might be necessary after you mistakenly delete some or all of the Chamilo databases, or after serious damage has been caused on your server by a cracker.

1. Copy the backup file into the root directory \(/var/www\) and unzip it. Keeping the same directories structure allows you not to loose some of the pre-configured access path to some data.
2. Import the database backup from PhpMyAdmin \(after removing the previous database if it was still present\).
3. Connect to your site and check everything is in order.

The backup contains users, passwords, courses, learning paths, and all the resources of your portal.

We actively recommend taking automatic backups on **another** server at least once a day for critical Chamilo servers.

