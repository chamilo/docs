# Het dashboard

At the moment we removed the dashboard from the teacher/student view because _some_ of the charts that show there are _very_ slow when you have a lot of data, and we believe it would be a bad idea to show it to all users.Recently, however, we started doing a small change to allow the platform admin to see one more chart than the other admins, so there is a start for doing role-based changes.

If you want to unlock completely the dashboard for all users, you can unlock the permissions at main/inc/lib/banner.lib.php, around line 319, where you have checks on api\_is\_platform\_admin\(\), api\_is\_drh\(\) and api\_is\_session\_admin\(\). Remove this line and you'll get it for students and teachers indifferently.

