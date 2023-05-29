# Database structure

If you are interested in the database structure for Chamilo 1.*, please check our wiki for the 
full schematics: [https://github.com/chamilo/chamilo-lms/wiki/Database-structure](https://github.com/chamilo/chamilo-lms/wiki/Database-structure). 
Just know that there are around 180 tables, with a lot of interconnections, so make sure you 
get it right before trying to tamper with it. There are different mechanisms to develop plugins 
based on the current structure, without modifying it. Please contact the developers through Slack
or through [https://github.com/chamilo/chamilo-lms/issues](https://github.com/chamilo/chamilo-lms/issues) 
if you feel lost.

![](../../.gitbook/assets/images51%20%281%29.png)

_Illustration: Chamilo LMS 1.9 database structure_

The database structure has changed dramatically between Dokeos or Chamilo LMS 1.8 and Chamilo LMS 1.9. 
We moved everything into one single database with no table replication, which is giving us a series of 
new opportunities for inter-courses mash-ups now.

It is important to note that **the database structure does not change between Chamilo LMS minor versions**. 
Not a bit. This comes from a difficult-to-manage but very useful decision taken at the developers level 
to make sure users can easily upgrade from one version to another without risks of causing data losses 
or degradation.

So, if you have a Chamilo LMS 1.9.0 install, you can upgrade to 1.9.2, 1.9.4 or 1.9.6 easily, and your 
database structure will not change at all.

Upgrading to 1.10 and 1.11 are larger step (major version upgrades) but are also possible. Just don't try
to upgrade directly from 1.9 to 1.11 (do that in two steps), always keep a backup, check the supported PHP
version of the *destination* version, and know that, depending on
the amount of data you have stored, the major version upgrades can take several hours to complete.