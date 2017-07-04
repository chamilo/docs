## History {#history}

To understand (and tolerate) the Chamilo LMS files structure today, you need a bit of history.

The Chamilo code started (really) in 2001, as a project called _Claroline_. Claroline grew to be a popular free software project, in particular in the academical world, and distinguished itself from other projects like _Moodle_, _WebCT_ and _Ilias_ (between others) by its ease of use, a characteristic tha Chamilo maintainted.

In 2004, the Claroline project suffered a fork (what would be a schism in theology) between the initial project (that still exists today) and the Dokeos project, more focused on bringing the tool to the corporate world.

In 2010, the Dokeos project suffered another fork, between Dokeos (still exists today) and Chamilo, provoked by the very unsensitive behaviour of the Dokeos project leader, with little understanding of the value of the community in such a project.

These changes were mostly philosophical in the project, but they did come with their changes in structure (both at the database level and at the files level), and we&#039;ll try to cover these shortly here.

An important note to conclude with this short time-travel is that Chamilo LMS 1.10, currently at 60 % of development, comes with critical new changes that will greatly improve readability and reusability of the Chamilo system.

So, let&#039;s see what notable changes have happened in Chamilo over the years...

### 2001-2003 {#2001-2003}

During this period, Claroline starts as an aggregate of simple teacher tools and a relatively loose central core. The project developers earned our respect for drawing the first draft of what didn&#039;t exist in the free software world, using nothing but the PHP basis to build a cathedral, but they did a considerable amount of errors as well, which still have an impact on Chamilo today.

#### Separation of courses databases {#separation-of-courses-databases}

Arguably the biggest mistake in the whole structure of the system was to separate the data of each course into its individual database.

This meant that, to have 20 active courses in your platform, you had to have 20 databases + 1 main database + 1 users database + 1 tracking database. And if you wanted more courses, you had to create more databases, forcing your MySQL user to have weird permissions on all databases with the same prefix, like so :

GRANT ALL PRIVILEGES ON `clarodb\_ %`.* to &#039;clarodb&#039;@&#039;localhost&#039; identified by &#039;abcde&#039; ;

This had the direct impact that users wanting to install Claroline on a shared hosting services couldn&#039;t, because they had to get permissions on more than one database, which usually hosting services at this time didn&#039;t allow.

An attempt at mildly reducing the impact of this measure made things even worst, as the idea went from having one database per course (with ~50 tables each) to having one single database but maintaining the prefix system, which caused a 20-courses platform to actually require one database with 1000 tables. You then had a clarodb_course1_document, a clarodb_course2_document, etc just to manage the documents tool.

#### Separation of responsibilities : one developer per tool {#separation-of-responsibilities-one-developer-per-tool}

Somehow, this is not as much of a design mistake than an open-contributions-with-limited-management problem. The problem was that, after a few years of development, each tool had developed a different standard. The coding conventions were not respected strictly enough, and the dropbox tool ended up being completely different in code styling and name conventions than the documents tool, for example.

This had dramatic consequences, which were somehow found later, in Dokeos, as well : security flaws were found in one tool for a feature that was pretty similar to another, unflawed, feature in another tool.

Furthermore, the development of separate tools in a relatively uncontrolled manner generate code replication. A lot of code was found in different tools at the same time, generating more work to maintain and less traceability of changes.

#### Course code as literal {#course-code-as-literal}

A final issue was the use of a literal (string) as a course identifier. This means that, for all joins between tables where the course is important, we have several searches on the course code, meaning we need expensive indexes in place to speed up the searches, while an integer would make things much faster.

It also reduces portability a little, as querying a string comes with uppercase vs lowercase issues as well as escaping characters (&#039; vs &#039;&#039; vs integer) which are not always similar between different database systems.

#### Multiple writeable folders {#multiple-writeable-folders}

An issue starting to appear right before 2004 and after was the multiplication of writeable folders. A writeable folder is a folder to which the web server requires write access in order to provide the complete features of Chamilo. Having several folders like this imply changing permissions **and** watching for security attacks in all of these, as well as taking backups of only part of these, etc. In short : a series of complications for such a small interest point for final users.

### 2004-2010 {#2004-2010}

The split between Claroline and Dokeos could have been handled in a smarter way, to say the least. The main issue here was that the separation did not separate the development team : mainly it did the management team.

This meant that Dokeos, while being a great innovative view of how an e-learning platform could also help the private business world, did not maintain its technical lineage and lost a lot of know-how in the change. The separation was rather brutal as well (with very little preventing a legal battle), so it was not really welcome to communicate with the previous technical team, and the new developers starting to work on Dokeos had to fill the gaps as well as possible, with a market that was clearly different and a lot of technical changes to be done.

Nevertheless, the Dokeos team maintained and improved the software within their capabilities and the structure issues from Claroline were maintained, never reaching a point with sufficient ressources to fix the flaws, but working slowly on getting them fixed progressively.

#### Tracking for learning paths {#tracking-for-learning-paths}

One mistake increased the damage a little, though, and was mostly due to a lack of experience of the original author of this guide : the tracking for the learning path tool (completely re-written in Dokeos to support SCORM .12) was stored inside the main database (which is alright thinking in the long-term of bringing all data under the same database), provoking some confusion within the developers team as all other tracking ressources are generally located in tables prefixed with _track_._ This still is a bit confusing today, until a proper renaming and re-structuring of the tracking tables can be executed without risking our users&#039; data.

#### The item_property table {#the-item-property-table}

Another mistake, which we&#039;re not clear whether it was already present in Claroline or appeared in Dokeos, is that there is an item_property tool which holds some item properties (as the name suggests) but **also** stores time information of when these properties have changed.

The practicality of this meant that some developers started using this table as a tracking table (for reporting of who deleted or created this or that), which meant that we also started keeping stale data of objects already deleted there which, in turn, meant that this table kept growing and growing until it became clogged with data that is very hard to parse.

At the moment, for example, it might be necessary to go through all records for a specific item to know what its current visibility is, which requires a lot of unnecessary resources to execute.

Furthermore, the item_property table keeps a reference to object of many other tables, using a literal as a discriminator instead of an integer number, which has further performance impact.

### 2010-2014 {#2010-2014}

#### Single database and InnoDB {#single-database-and-innodb}

At the very beginning of the Chamilo project, a major task was undertaken to get rid of the multiple-databases issue.

The first stable version to come with a single database was version 1.9.0, released in 2012\. It came shipped with a fully-automated upgrade process from earlier versions, which changes the database structure from multiple-databases to a single database on-the-fly and leaves you with an upgraded and much more efficient.

This issue is now completely solved as of Chamilo 1.9.4, as the little remaining details were fixed in the versions following directly 1.9.0.

However, the change to a single database was made with little performance details to be improved. For example, the (relatively quick) mixing of several tables implied the discrimination of elements through a course code or a course ID combined with the original element ID, instead of redefining a new global ID.

For example, for a field « id » in a table « document » in database « chamilodb_course1 », we now have (whenever a global ID has not been set yet) a « c_id » + an « id » fields in a « document » table in the single « chamilodb » database. Or to put it in SQL terms, two queries like these :

select * from chamilodb_**course1**.document where id = 5 ;

select * from chamilodb_**course2**.document where id = 5 ;

Now became

select * from chamilodb.document where id = 5 and c_id = 1 ;

select * from chamilodb.document where id = 5 and c_id = 2 ;

As such, the primary key for table « document » is not « id » anymore, but rather a combination of « c_id+id », which prevents the tables still using this structure to use the InnoDB engine in MySQL, which prevent further database efficiency improvements.

Fixing these means adding an additional, global, ID that is worth for all courses combined, which is currently being implemented for all tables in version 1.10 of Chamilo LMS[^4], to be released in 2014\.

Once this step is completed, Chamilo will be completely optimized for very high load portals. In the meantime, handling thousands of transactions per second on several database servers in a load balanced infrastructure should be done with care, possibly using only a few tools (like the exercises tool in Chamilo 1.10, which has already been implemented in such a structure in production).

#### Multiple databases layer {#multiple-databases-layer}

Considerable efforts have been executed on centralizing all SQL and making sure we could move more easily to other database systems. At the time of 1.10.0, this work was not yet complete, but is reaching completion slowly (but surely) and we hope to have a first version available in 2.0.

An temporary attempt was made to support the MySQLi driver in a previous version of Chamilo LMS. You can check it out inside main/inc/lib/database.mysqli.lib.php and you will see the effort is not too big from there.

However, a series of queries are still located in different Chamilo scripts, which prevent us from making sure it&#039;s completely portable without reviewing all of them.

When developing inside Chamilo now, try using the entities put at your disposal for all new queries. Check the select() and update() functions on these entities in main/inc/Entity/

#### Packaging for inclusion in other software {#packaging-for-inclusion-in-other-software}

Considerable efforts of re-structuring have been made and are still being made to improve the structure of Chamilo files in view of integrating it into other software, such as Linux distributions like Debian and others.

To do this, one important issue was the multiplication of directories with specific privileges, where the web server has to havedifferent privileges than for other directories. For example, the main/upload/users/ folder is where the users pictures go, while the main/default_course_documents/images/ folder has default files for courses but at the same time needs to accept new default files (and as such requires write access for the web server).

In both Claroline and Dokeos, these particular directories increased in number, and you now had to authorize writing for the web server in around 9 folders in total to get all the features of Chamilo.

This is being fixed in 1.10 by unifying these under the data/ directory and its subdirectories (for all data related to courses and users) and the log/ directory for system logs.

As such, the data/ folder must be included in all system backups, but the logs/ folder may be omitted. The rest of the Chamilo application should remain stable inside the other folders.

Finally, the data/ and log/ directories will be moveable through a simple configuration variable change and allow you to set these directories in other places.

[^4]: See https://support.chamilo.org/issues/6500 for details of its execution