## Video-conference {#video-conference}

As previously indicated in the _plugins_ section of this guide (see chapter 4.1.16 on page 37), the video-conference tool is not delivered together with Chamilo. You can easily install it and link Chamilo to it thanks to the _BigBlueButton_ plugin, but this requires a dedicated server (or at least a server dedicated to something that is not critical).

To install the _BigBlueButton_ video-conference server, we recommend you follow the instructions from the project&#039;s homepage: [http://code.google.com/p/bigbluebutton/wiki/InstallationUbuntu](http://code.google.com/p/bigbluebutton/wiki/InstallationUbuntu)

Once the video-conference installed and functional, you will have to know the public URL (sometimes just an IP address) and the secret key.

You will find the secret key tp use in the Chamilo plugin configuration in /var/lib/tomcat6/webapps/bigbluebutton/WEB-INF/classes/bigbluebutton.properties (look for _Salt_) or using the bbb-conf script on the videoconference server.

Once these two pieces of information are in your possession, go to the Chamilo settings, _Plugins_ section. Enable the _BigBlueButton_ plugin and save. **Reload the page** so that the new “Extra” category of settings appears in the action bar on top of the page (a magic wand) and click on it. Enter your video-conference server&#039;s information. Now you only need to check the integration by going into a course and clicking the _Video-conference_ link.

![](../assets/images48.png)Illustration 84: The videoconference tool inside a course

Course teachers and coaches are the only ones who can **start** a video-conference room. They are also the only ones to have the moderator status inside the conference.

![](../assets/images62.png)Illustration 85: Videoconference tool&#039;s page with list of recordings

Learners cannot connect in video-conference if their teacher has previously started a room (otherwise, clicking on the video-conference link will just reload the course homepage).

If you want to enable recordings (which will use considerable space on your videoconference server), you will need to go to the course settings tool and enable the feature.

![](../assets/images63.png)Illustration 86: Videoconference course setting for recording

If you can&#039;t install it, don&#039;t hesitate to contact the Chamilo&#039;s official providers[^19] who will gladly rent you an access to their pre-configured video-conference servers.

Note: In Chamilo up to version 1.9.4, there was a bug in the plugin which prevented the use of audio. In subsequent versions up to 1.9.6, another minor bug prevented the videoconference to work for more than 30 minutes. This was fixed in version 1.9.8 and increased to 5 hours (search for “300” in plugin/bbb/lib/bbb.lib.php to customize).

[^19]: http://www.chamilo.org/en/providers