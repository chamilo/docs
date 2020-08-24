# Database structure

If you are interested in the database structure for Chamilo 1.9, please check our wiki for the full schematics: [http://support.chamilo.org/projects/chamilo-18/wiki/Database\_schema](http://support.chamilo.org/projects/chamilo-18/wiki/Database_schema). Just know that there are around 180 tables, with a lot of interconnections, so make sure you get it right before trying to tamper with it. There are different mechanisms to develop plugins based on the current structure, without modifying it. Please contact the developers through IRC \(see our website's footer\) or though [http://support.chamilo.org/projects/chamilo-18](http://support.chamilo.org/projects/chamilo-18) if you feel lost.

![](../../.gitbook/assets/images51%20%281%29.png)Illustration 93: Chamilo LMS 1.9 database structure

The database structure has changed dramatically between Dokeos or Chamilo LMS 1.8 and Chamilo LMS 1.9. We moved everything into one single database with no table replication, which is giving us a series of new opportunities for inter-courses mash-ups now.

It is important to note that **the database structure does not change between Chamilo LMS minor versions**. Not a bit. This comes from a difficult-to-manage but very useful decision taken at the developers level to make sure users can easily upgrade from one version to another without risks of causing data losses or degradation.

So, if you have a Chamilo LMS 1.9.0 install, you can upgrade to 1.9.2, 1.9.4 or 1.9.6 easily, and your database structure will not change at all.

