# Plugins

![](../assets/images33.png)

Plugins in Chamilo exist to allow third party to (relatively easily) integrate new components in 
Chamilo, and are viewed either as a « staging » platform to include new features in the core of
Chamilo in future versions, or as a « buffer » where we can make some code reside that we don't 
really **want** to integrate to Chamilo (usually for ethical or licensing reasons) but that we 
know might benefit our community at large.

For integrators, it is a great way to insert new code into Chamilo without having to wait for the 
next major version in order to incorporate database changes, as the plugins can have their own 
installer/uninstaller.

Plugins can be split in 2 categories : visual plugins, and back-end plugins. Back-end plugins act
in the background (you'd have guessed) and require much less work (usually) from the visual 
design side. Visual plugins need to be crafted carefully so they integrate seamlessly into the 
Chamilo layout.

Although this is the major division, we won't make any distinction in the following section between
 these. If you develop a back-end plugin, just ignore the display part.

We will, however, differentiate between the general plugins (all but one at this time) and the 
dashboard plugin, as this last one represents a specific case that appears as a top menu 
tabulation entry and is only allowed to administrators.