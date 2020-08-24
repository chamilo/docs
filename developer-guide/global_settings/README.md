# Global settings

![](../../.gitbook/assets/images26%20%289%29.png)

Global settings in Chamilo are a way to configure some kind of system behaviour at the platform level, which will affect all courses and all users, if relevant.

All these settings are kept in one of 2 locations :

1. the configuration file, if we think this setting must be controlled by the system administrator but not by the Chamilo administrator \(a very small number of settings are kept there\)
2. the settings\_current \(and settings\_option\) table\(s\), when we want those settings to appear inside the platform settings page

As indicated in the first chapters, the database cannot change between minor versions of Chamilo, so when we develop an optional feature in a minor version, we often use the configuration file to store the setting until we get to the next major version.

To be completed…

