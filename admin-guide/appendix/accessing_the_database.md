# Accessing the database

We highly recommend you **never access the database directly** and always use Chamilo's admin tools to alter your data. This will ensure data integrity and will allow any administrator to safely an quickly analyse your data in case of problem.

We do, however, acknowledge the need to access the database in some very specific circumstances to execute large operations faster.

To do this, we recommend using applications that do not require too much work for installation and configuration, like adminer.php. Adminer is a small, one-script application that allows you to connect to your database, execute SQL operations, then remove the file when you're done. This way, you do not make your database server vulnerable to remote attacks for longer than required, and you do not increase the complexity of your system.

