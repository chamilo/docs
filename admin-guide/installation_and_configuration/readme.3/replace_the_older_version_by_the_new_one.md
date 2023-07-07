# Replace the older version by the new one

Before applying a more recent version “on top of” your current Chamilo version, you might want to apply a few changes to the package “just in case”. For example, the following directories could be removed from the Chamilo package **before** you copy them over your current installation:
Old structure
* ~~home/~~
* ~~courses/~~
* ~~main/inc/conf/~~
* ~~main/upload/users/~~
* ~~main/searchdb/~~

New Structure
* app/home/
* app/courses/
* app/config/
* app/upload/
* main/search/

  
These directories are all supposed to be about the same in the new version, and might all have been altered by your use of Chamilo through the web interface, so to avoid any file clash, just remove them from the Chamilo package, then continue...

There is only one recommended way to update your Chamilo version for now:

1. Don't delete the previous folder, otherwise the older configuration files will be lost.
2. Simply copy the new Chamilo directory over the old one.
   * if you use a GNU/Linux distribution, you'll have to copy the entire new directory to the old one, i.e.:

| user@server: sudo cp -r chamilo-1.9.4/\* /var/www/chamilo/ |
| :--- |


1. Then go through the steps from _«**2.2.2**Last installation settings\_\_»_.
2. Connect to your site and check that everything is there.

