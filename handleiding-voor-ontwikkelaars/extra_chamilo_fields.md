# Extra Chamilo-velden

![](../.gitbook/assets/images29%20%282%29.png)

If you ever wonder where those « original\_user\_id » values we saw in the webservices chapter were stored, have a look at the « extra\_field » table. You'll find that users, courses and even sessions all use two « extra » tables that allow us to store a virtually-unlimited amount of additional information and links to other systems.

For users, it's easy : you can define fields through the administration panel. Just click the last link of the users block : « Profiling » and follow the instructions to define a new field.

Since 1.10.0, the admin panel offers the possibility to configure additional course and session fields, and since 1.11.0, you can do that with any supported element through a link at the end of the platform block.

For users, courses and sessions, however, the fields were already available in the Chamilo 1.9 database, so you **could** use them if you wanted. Web services already used them when creating a new course or a new session through them : they create \(or insert data into it if it exists\) a field by the name of the value you gave in the « original\_course\_id\_name » parameter to the WSCreateCourse\(\) method, for example.

Either way, you can define new fields manually directly from your database client and use these through plugins, if you want.

Fields definitions are stored in the extra\_field table. Values of each user, course or session for these fields are stored in the extra\_field\_values table.

Check them out, they're a great resource to work with !

