# Last installation settings

Once Chamilo is installed, the success message also brings a short warning message

« **Security hint**: To protect your site, please change permissions on main/inc/conf/configuration.php and main/install/index.php \(not their directories\) to read-only \(CHMOD 444\). »

![](../../../.gitbook/assets/dernier-parametre%20%283%29.png)

_Illustration: Installation – Installation report_

It is preferable, in fact, to remove the _main/install/_ directory completely \(the confirmation text is not really accurate about this\):

user@server:/var/www/chamilo$ sudo rm -rf main/install/

This will prevent anybody \(except the _root_ user\) to see this directory, and thus to use it.

For the _configuration.php_ file, **0444** are the appropriate permissions to assign:

user@server:/var/www/chamilo/$ cd main/inc/conf/

user@server:/var/www/chamilo/main/inc/conf$ sudo chmod 0444 configuration.php

When this operation is completed, using Chamilo can begin safely clicking on the _Go to the newly created portal_ link.

