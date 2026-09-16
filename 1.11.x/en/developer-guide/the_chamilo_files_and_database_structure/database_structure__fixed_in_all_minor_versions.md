# Database structure : fixed in all minor versions

One important change in Chamilo \(in comparison with its ancestors\) is that we do **not allow neither database nor file structure changes** between minor versions. On the developer side, this means that, if you have to develop a new feature with new data to be stored, you will have to work through plugins or extra fields \(more about these later\) until they can be included in the next major version.

If a major version \(1.9.0, 1.10.0, 1.11.0, etc\) is released without your changes in it, then they will not be included until the next major version. This is why you **have to** ensure that you contact us \(info@chamilo.org or through a Pull Request on [https://github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)\) for inclusion before we enter the alpha stage of a new major version if you want your code to be included.

On the administrator's side, this means that all upgrades will be done smoothly, without change to their data, meaning they can rest assured that no issue will appear that would require moving back to a previous backup. In fact, if the upgrade from 1.9.2 to 1.9.4 were to fail, he could simply overwrite the new files with files from version 1.9.2 again, and things will start working again \(the only directory to save is the `home/` directory if everything has been done according to the installation manual\).

