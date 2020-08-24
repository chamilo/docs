# Installation wizard

Download the source from [Chamilo](http://www.chamilo.org/en/download)'s download pageand unpack it \(with a tool such as 7-zip under Windows or _tar_ under Linux/MacOS\).

* If it is a remote server \(i.e. you are not directly connected to the computer by a keyboard and a screen\), send the archive through FTP \(or [SSH](http://fr.wikipedia.org/wiki/Secure_Shell)\) to the online space \(we recommend you send the file and then unzip it on the server, this will be much faster and secure, but you can also send all the files you find under the _chamilo_ directory _–_ beware, sometimes the FTP transfer is interrupted and the installation cannot be completed safely – make sure all files have been transferred by checking the log and sending them a second time, checking the option _Don't overwrite existing files_ in your FTP client\).
* If it is a local installation, just copy the files in the root web folder on your server \(on Ubuntu, that is, inside /var/www\).

Ex.: user@server:\(sudo\) mv /home/_user_/Desktop/chamilo /var/www

**Note** : You might want to rename the directory to something more convenient once unpacked.

Chamilo can be installed to whichever directory you like. Choose the root directory of the site so that the platform is directly accessible through the « [http://www.mydomain.com/](http://www.mydomain.com/) » address, for example.

The directory where the files are copied must be writeable by the same system user running the web server \(i.e. _www-data_ on Ubuntu, or _httpd_ or _nobody_ on some other UNIX-based operating systems\). Remotely, you must be able to change the permissions on the files and folders through [FTP](http://fr.wikipedia.org/wiki/FileZilla), [SSH](http://fr.wikipedia.org/wiki/Secure_Shell) or any other type of access.

