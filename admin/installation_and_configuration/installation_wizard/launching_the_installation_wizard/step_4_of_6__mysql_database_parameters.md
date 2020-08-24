#### Step 4 of 6 : MySQL database parameters {#step-4-of-6-mysql-database-parameters}

We&#039;ll now check the database management system (DBMS) works and is configured as expected :

![](../../../assets/images7.png)Illustration 8: Installation – MySQL settings

To allow for the settings check, you will have to fill in the required fields. These elements have probably been given to you when you rented your hosting service the first time, or you did them yourself when configuring your [LAMP](http://fr.wikipedia.org/wiki/LAMP) server locally.

*   _Database host :_ the name of the SQL server. If this is a local installation, the MySQL server is probably local too, and its name will be _localhost_.

*   _Database user :_ the name of the database user. If this is a local installation, the name will probably be _root_ by default, but we recommend the creation of another user for your Chamilo databases, because using _root_ represents a significant security risk for your other databases on that server. Typically, you can create a new user through a web interface, but if you have to do this in the terminal, and assuming you want a user named “chamilo” with a password “olimahc”, these 2 commands will help you out:

    *   grant all privileges on chamilo.* to chamilo@localhost identified by &#039;olimahc&#039;;

    *   flush privileges;

*   _Database password:_ the password that has been given/created during the hiring/creation of the database, at the same time as the user. Locally, the password is generally empty by default, but once again we recommend defining your own password here, for security reasons.

*   _Database name:_ the name of the database to create and in which to store all of your Chamilo&#039;s data

Since Chamilo 1.9.0, the installation process has been simplified and the database structure has been migrated so that only one database is used, which greatly simplifies the installation process and th maintenance of Chamilo portals.

Check the data entered in the form, then click the _Check database connection_ button. If an error message appears, check the data again. Maybe this password is not the right one?

Once everything is OK (and the green confirmation block appears), move on to the next step.

![](../../../assets/images9.png)Illustration 9: Installation database check - OK

If a database with the same name already exists, a yellow-background message will tell you so, because this database **will get overridden** with your new database! To avoid this, make sure you use another database name in the previous form.