# The solution

We call this solution _multi-URL_. By enabling multi-URL, you enable the following mechanism:

* you use the same source code \(so less maintenance\)
* you use the same database \(so less duplication of data\)
* one “master” portal \(which is not used directly by your customers\) allows you to define “slave” portals
* each course is created inside a “slave” portal, and is only visible inside this slave portal
* each user is created inside a “slave” portal, is only visible inside this portal and has only access to this portal
* each slave portal uses a different domain name \(or a different sub-domain\)
* each portal can use its own graphic style
* one \(or more\) administrator can be assigned to each slave portal. This administrator doesn't have access to global settings, neither to the users and courses of other portals
* one session can use a global course, but each session only exists in one and only one portal

Using the same database, you benefit from these “extra features”:

* one course can be made “global” and be used through sessions on all slave portals
* one user \(learner, teacher or administrator\) can be given access to other portals by the global administrator

