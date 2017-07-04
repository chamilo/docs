## The Chamilo LMS database structure today {#the-chamilo-lms-database-structure-today}

You can access a full schemas of 1.9and 1.10 here : [https://support.chamilo.org/projects/chamilo-18/wiki/Database_schema](https://support.chamilo.org/projects/chamilo-18/wiki/Database_schema)

![](../assets/images25.png)Illustration 7: High-level view of the Chamilo LMS 1.9 database structure

In the schema, green represents key users-data, blue represents key courses-data and yellow represents key sessions-data. All of the white tables linked to the orange table (the c_item_property table) are ressources that reside inside of a course (forum, documents, assignments, exercises, etc).

This resolution of the diagram can only give you a very high-level view of its scale. For a full-scale diagram, check [https://support.chamilo.org/attachments/download/3685/chamilo-19-db.png](https://support.chamilo.org/attachments/download/3685/chamilo-19-db.png) (a PNG file around 3MB). We use the « Dia » free software to build those, so if you want to use it and make adjustements, feel free to download the editable model at [https://support.chamilo.org/attachments/download/3684/chamilo-19-db.dia](https://support.chamilo.org/attachments/download/3684/chamilo-19-db.dia)