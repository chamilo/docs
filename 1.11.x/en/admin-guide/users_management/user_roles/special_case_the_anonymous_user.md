# Special case: the anonymous user

| Description | The anonymous user is a very particular case: this user only exists to make the tracking possible for users who do not hold an account on the Chamilo portal. Thanks to this mechanism, the _anonymous_ user can do most operations a learner can do, but only within courses marked as _public._ |
| :--- | :--- |
| Permissions in a public course | By default, he can : |
| Global permissions | By default, he can : |

There are a few special things you should also know about the aonymous user:

* it is the only role with an ID of 6 \(if you search for anonymous users in your database, it's easy to find\)
* anonymous users are shared by the anonymous people connecting to your portal.
* if you need public courses with tracking and it seems all your users are seeing weird live results when taking tests, this might be due to many anonymous users using the same entry in the database. You can reduce the impact of the number of users upon that tracking by creating more anonymous users. Just create them as student through the admin interface and set status=6 in the database

