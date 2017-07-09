### The Chamilo root directory {#the-chamilo-root-directory}

The root directory is (in this context) the directory which contains the Chamilo files. For the example in this tutorial, let&#039;s consider it has been installed in _/var/www/chamilo_ and is available through [_http://localhost/chamilo/_](http://localhost/chamilo/) (for a remote server, we will need to use FTP o SSH/ SFTP).

To save, you will have to compress the files through your terminal going to the _/var/www/_ directory.

user@server:cd /var/www

Compress the directory using the “ tar “ command to generate a tar.gz file:

user@server:/var/www$ sudo tar cvfj /home/you/bkp/backup_chamilo.tar.gz chamilo/

It can be practical to give a name composed using the date, like _2010-05-07-backup-chamilo.__tar.gz_. This way, if you store a series of backup files, it will be easy to sort them by date.

This backup copy will contain all information from the Chamilo database accesses and all its configurations. It is then useful in case of data loss or an undesired incursion on your server. It is the only reliable way to rebuild your Chamilo server if any major problem occurs.

This backup can be executed automatically by a scheduling system (_cron_ process under GNU/Linux) on the server, but it can be executed manually in case the server doesn&#039;t do it right.

If you do not have access to a terminal, it is possible you might need to execute a backup copy through _FTP_. This operation, however (without compression), can be **much** longer.