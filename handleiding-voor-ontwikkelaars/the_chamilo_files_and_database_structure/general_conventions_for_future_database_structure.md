# Algemene conventies voor toekomstige databasestructuur

If you are starting a new plugin or some kind of feature that requires database modifications, and although you can find most of this information in the coding conventions \(next section\), please keep the following rules in mind :

* All tables MUST have a unique identifier based on one single columns. If the table already contains an `id` that is dependent on a `c_id` column, the new column MUST be named `iid`
* All tables referring to courses MUST use the integer ID of the course and call the corresponding column `c_id`
* All tables referring to sessions MUST use the integer ID of the session and call the corresponding column `session_id` \(and NOT `id_session`\)
* All tables representing the relationship between to other tables \(namely a n-m or 1-n relationship\) SHOULD bear a name with a central « rel » term, where the two table names are expressed in alphabetical order, unless this is counter intuitive. For example, linking users with courses bears the table name `course_rel_user`.
* If specifically defining a table index to speed things up, this index SHOULD follow the order of the fields that is used in the corresponding queries. For example, for a table containing at least the three fields `user_id`, `c_id` and `session_id`, an index on those three fields should be based on the queries that are made to this table. If a query works like this : `SELECT id FROM table WHERE c_id = 3 AND user_id = 872 AND session_id = 32` then the index should be created in this order: `ALTER TABLE table ADD INDEX idx_tcus (c_id, user_id, session_id)`
* Translations of terms are managed outside of the database. All table, column and index names MUST be written in CORRECT English language for better understandability by other developers around the world.

