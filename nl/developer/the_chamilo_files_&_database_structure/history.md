## History

![](../assets/images19.png)![](../assets/images22.png)

To understand the Chamilo LMS files structure today, you need a bit of history.

The Chamilo code kind of started, actually, in 2001, as a project called _Claroline_. Claroline grew to be a popular free software project, in particular in the academical world, and distinguished itself from other projects like _Moodle_, _WebCT_ and _Ilias_ (between others) by its ease of use, a characteristic tha Chamilo maintained throughout the years.

In 2004, the Claroline project suffered a _fork_ (a disturbance in _the force_) between the initial project (which later died in 2014 and gave birth to the _Claroline Connect_ project) and the _Dokeos_ project, more focused on bringing the tool to the corporate world.

In 2010, the Dokeos project suffered another fork, between Dokeos (still exists today) and Chamilo, provoked by the very unsensitive behaviour of the Dokeos company manager, with little understanding of the value of the community in such a project.

These 2 large project splits were mostly philosophical in the _Chamilo_ project history, but they did come with their amount of changes in structure (both at the database level and at the files level), and we'll try to cover these shortly here.

An important note to conclude this short time-travel with, is that Chamilo LMS 1.10 and 1.11 came with additional critical new changes that greatly improved readability and reusability of the Chamilo system. Chamilo 2.0, currently under development, will bring some more changes mostly focused on extensibility.

So, let's see what notable changes have happened in Chamilo over the years...

### 2001-2003

During this period, _Claroline_ starts as an aggregate of simple teacher tools and a relatively loose central core. The project developers earned our respect for drawing the first draft of what didn't exist in the free software world, using nothing but the PHP basis to build a cathedral, but they did a considerable amount of technical errors as well, which still have an impact on Chamilo today.

#### Separation of courses databases

Arguably the biggest mistake in the whole structure of the system was to separate the data of each course into its individual database.

This meant that, to have 20 active courses in your platform, you had to have 20 databases + 1 main database + 1 users database + 1 tracking database. And if you wanted more courses, you had to create more databases, forcing your MySQL user to have weird permissions on all databases with the same prefix, like so :

```
GRANT ALL PRIVILEGES ON `clarodb\_ %`.* to 'clarodb'@'localhost' identified by 'abcde' ;
```

Where '%' means any character string.

This had the direct impact that users wanting to install Claroline on a shared hosting services couldn't, because they had to get permissions on more than one database, which usually hosting services at this time didn't allow.

An attempt at mildly reducing the impact of this measure made things even worst, as the idea went from having one database per course (with ~50 tables each) to having one single database but maintaining the prefix system (this time for tables), which caused a 20-courses platform to actually require one database with 1,000 tables. You then had a clarodb\_course1\_document, a clarodb\_course2\_document, etc just to manage the documents tool for all courses.

#### Separation of responsibilities : one developer per tool

Somehow, this is not as much of a design mistake than an open-contributions-with-limited-management problem. The problem was that, after a few years of development, each tool had developed a different standard. The coding conventions were not respected strictly enough, no template was provided to develop new tools, and the dropbox tool ended up being completely different in code styling and name conventions than the documents tool, for example.

This had dramatic consequences, which were somehow found later, in _Dokeos_, as well : security flaws were found in one tool for a feature that was pretty similar to another, unflawed, feature in another tool.

Furthermore, the development of separate tools in a relatively uncontrolled manner generate code replication. A lot of code was found in different tools at the same time, generating more work to maintain and less traceability of changes.

#### Course code as literal

A final issue was the use of a literal (string) as a course identifier. This means that, for all joins between tables where the course is important, we have several searches on the course code, meaning we need expensive indexes in place to speed up the searches, while an integer would make things much faster.

It also reduces portability a little, as querying a string comes with uppercase vs lowercase issues as well as escaping characters (' vs " vs integer) which are not always similar between different database systems.

To date, in 2017 (16 years later) we still didn't get rid of this issue completely as some tables (very few actually, mostly gradebook stuff) still make use of the litteral course code. This will be (finally) completely gone in Chamilo 2.0.

#### Multiple writeable folders

An issue starting to appear right before 2004, and after that, was the multiplication of writeable folders. A writeable folder is a folder to which the web server requires write access in order to provide the complete features of Chamilo. Having several folders like this implies changing permissions **and** watching for security attacks in all of these, as well as taking backups of only part of these, etc. In short : a series of complications for such a small interest point for final users.

In 1.11.x, this has been significantly improved by moving _most_ of these writeable directories into the _app/_ folder. However, a few additional "optional" directories remain, like _web/css/_ and _main/lang/_ (and in some cases some plugin folders). A list of these folders can be found in the _documentation/security.html_ file in any Chamilo installation.

### 2004-2010

The split between Claroline and Dokeos could have been handled in a smarter way, to say the least. The main issue here was that the separation did not separate the development team (the Claroline team remained while a new team was created for Dokeos). It mainly was a management split.

This meant that Dokeos, while being a great innovative view of how an e-learning platform could also help the business world, did not maintain its technical lineage and lost a lot of know-how in the process. The separation was rather brutal as well (with very little preventing a legal battle), so communication with the previous technical team was not really welcome, and the new developers starting to work on Dokeos had to fill the gaps as well as possible, with a market that was clearly different and a lot of technical changes to be done.

Nevertheless, the Dokeos team maintained, improved and extended the software in an impressive way. But the structure issues from Claroline were maintained, never reaching a point with sufficient (economical) ressources to fix the flaws, but working slowly on getting them fixed progressively.

#### Tracking for learning paths

One mistake increased the damage a little, though, and was mostly due to a lack of experience of the original author of this guide (i.e. me): the tracking for the learning path tool (completely re-written in Dokeos to support SCORM 1.2) was stored inside the main database (which is alright thinking in the long-term of bringing all data under the same database, but not in comparison with all other tracking tables), provoking some confusion within the developers team as all other tracking ressources are generally located in tables prefixed with *track\_e\_*. This is still a bit confusing today, as `lp_view` and `lp_item_view` tables contain user tracking information, but it will remain like that until a proper renaming and re-structuring of the tracking tables can be executed without risking our users' data.

Some tracking is also kept in gradebook and student\_publication tables.

#### The item\_property table

Another mistake, which we're not clear whether it was already present in Claroline or appeared in the very early stages of Dokeos, is that there is an item\_property tool which holds some item properties (as the name suggests) but **also** stores time information of when these properties have changed.

The practicality of this meant that some developers started using this table as a **tracking** table (for reporting of who deleted or created this or that), which meant that we also started keeping stale (old) data of objects already deleted there which, in turn, meant that this table kept growing and growing until it became clogged with data that is very hard to parse.

At the moment, for example, it might be necessary to go through all records for a specific item to know what its current visibility is, which requires a lot of unnecessary resources to execute.

Furthermore, the item\_property table keeps a reference to object of many other tables. And this reference is using a literal tool code as a discriminator instead of an integer number, which has further performance impact.

### 2010-2014

#### Single database and InnoDB

At the very beginning of the Chamilo project, a major labour was undertaken to get rid of the multiple-databases issue.

The first stable version to come with a single database was version 1.9.0, released in 2012. It came shipped with a fully-automated upgrade process from earlier versions, which changes the database structure from multiple-databases to a single database on-the-fly and leaves you with an upgraded and much more efficient.

This issue was now completely solved as of Chamilo 1.9.4, as the little remaining details were progressively fixed in the versions following directly 1.9.0.

However, the change to a single database was made with little performance details to be improved. For example, the (relatively quick) mixing of several tables implied the discrimination of elements through a course code or a course ID combined with the original element ID, instead of redefining a new global ID.

For example, for an `id` field in the `document` table in database `chamilodb_course1`, we now have (whenever a global ID has not been set yet) a `c_id` **and** an `id` field in the `c_document` table in the single `chamilodb` database. Or to put it in SQL terms, two queries like these :

```
select * from chamilodb_course1.document where id = 5;
select * from chamilodb_course2.document where id = 5;
```

Now become:

```
select * from chamilodb.c_document where id = 5 and c_id = 1;
select * from chamilodb.c_document where id = 5 and c_id = 2;
```

As such, the primary key for table `c_document` is not `id` anymore, but rather a combination of `c_id+id`, which prevented the tables still using this structure to use the InnoDB engine in MySQL, which prevented further database efficiency improvements.

Fixing these meant adding an additional, global, ID that is worth for all courses combined, which has been implementeded for all tables in version 1.10 of Chamilo LMS, released in 2015. However, the `cid+id` fields were maintained to guarantee maximum stability for a while. These are still present in Chamilo 1.11, but are scheduled for removal in 2.0 (the `id` field, not necessarily the `c_id` field).

Once this step is completed, Chamilo will be completely optimized for very high load portals. In the meantime, handling thousands of transactions per second on several database servers in a load balanced infrastructure should be done with care, possibly using only a few tools (like the exercises tool in Chamilo 1.11, which has already been implemented in such a structure in production).

#### Multiple databases layer

Considerable efforts have been executed on centralizing all SQL and making sure we could move more easily to other database server management systems (PostgreSQL, Oracle, etc). At the time of 1.11.0, this work was not yet complete, but is reaching completion slowly (but surely) and we hope to have a first version available in 3.0 (not 2.0 as initially planned as this has become a lower priority with time with Oracle being the owner of MySQL and MariaDB launching on its own).

However, a series of queries are still located in different Chamilo scripts, which prevent us from making sure it's completely portable without reviewing all of them.

When developing inside Chamilo now, try using the entities (and their ORM relationship) put at your disposal for all new queries. Check the select() and update() functions on these entities in `src/Chamilo/*/Entity/`.

#### Packaging for inclusion in other software

Considerable efforts of re-structuring have been made and are still being made to improve the structure of Chamilo files in view of integrating it into other software, such as Linux distributions like Debian and others.

To do this, one important issue was the multiplication of directories with specific privileges, where the web server has to have different privileges than for other directories. For example, the `app/upload/users/` folder is where the users pictures go, while the `main/default_course_documents/images/` folder has default files for courses but at the same time needs to accept new default files (and as such requires write access for the web server).

In both Claroline and Dokeos, these particular directories increased in number, and you now had to authorize writing for the web server in around 9 folders in total to get all the features of Chamilo.

This has been fixed in 1.10 by unifying many under the `app/` directory and its subdirectories (for all data related to courses and users).

As such, the `app/` folder must be included in all system backups. The rest of the Chamilo application should remain stable inside the other folders.

