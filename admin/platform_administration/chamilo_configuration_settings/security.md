### Security {#security}

![](../../assets/graficos11.png)This category will allow you to configure a few things that have to do with security. The default settings are... acceptable, but you might want to restrict a few things to improve it.

**Type of filtering on document uploads** there are two different filtering types:

*   Blacklist is a way to prevent files with a specific extension. That allows you to say, for example, that you don&#039;t want executable files to be uploaded (i.e. “.exe” files). This is considered the weakest filtering method though.

*   White list is a way to say “I only want files which match my authorized extensions”, so it is really safe: no funny file will surprise you here. Case (upper-case or lower-case) doesn&#039;t matter here. This is the safest option, but it is somewhat limited.

**Permissions for new directories** sets which access permissions new directories will have. This is mostly an option for Linux-based systems, and allows you to increase security against pirates.

**_Warning_**_:_ the default value is « 0777 » following a series of problems found by users with more restrictive permissions. This value guarantees greater portability, not greater security, and it sometimes needs to be modified if the Linux-based system you&#039;re installing it on requires a strict security policy. If this is the case, you will receive a server error when trying to enter a course you have just created. In this case, try to update this value to 0777, 0775, 0755 and 0750 alternatively, and create a new course each time. You can always delete the failed courses afterwards.

**OpenID authentication** enables the OpenID feature. You will also need to enable the OpenID field in the user profiling fields in order for this feature to provide the desire functionality. Be aware that, at this time, it does not allow for several identities combined, and you still have to paste your entire identity URL inside the OpenID box. We hope to improve this feature in the future.

**Extend rights for coaches** will let teachers edit the contents of courses inside the session context (modify documents, learning paths, exercises, links, etc.). See chapter Chapter 7\. Sessions management on page 64.

Allow User Course Subscription By Course Admininistrator allows the teacher to subscribe users to his course. This option is enabled by default, but if you want to prevent this from happening, you know where to look...

Single Sign On enables the connection without login, based on a sister website which already processes the login (an intranet, for example). This feature requires a bit of customizing and you should really hire a developer with experience in Single Sign On methodologies to do that quickly. If lucky, this might work out of the box, though. Just make sure you check the other settings and the main/auth/sso/ directory for more information.

Filter terms allows you to automatically filter all given words by *** in forums and e-mails.