## The Chamilo LMS database structure today
{#the-chamilo-lms-database-structure-today}

You can access a full schema of Chamilo 1.9, 1.10 and 1.11 databases here : [https://github.com/chamilo/chamilo-lms/wiki/Database-structure](https://github.com/chamilo/chamilo-lms/wiki/Database-structure)

![](https://github.com/chamilo/chamilo-lms/blob/1.11.x/tests/history/1.11.0/chamilo-1.11-db.png)
High-level view of the Chamilo LMS 1.11 database structure

In the schema, green represents key users-data, blue represents key courses-data and yellow represents key sessions-data. All tables linked to the orange table (the `c_item_property` table) are ressources that reside inside of a course (forum, documents, assignments, exercises, etc).

We use the « Dia » free software to build those, so if you want to use it and make adjustements, feel free to download the editable model at [https://github.com/chamilo/chamilo-lms/blob/1.11.x/tests/history/1.11.0/chamilo-1.11-db.dia](https://github.com/chamilo/chamilo-lms/blob/1.11.x/tests/history/1.11.0/chamilo-1.11-db.dia)

