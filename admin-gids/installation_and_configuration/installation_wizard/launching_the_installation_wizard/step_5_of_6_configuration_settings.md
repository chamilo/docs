# Stap 5 van 6: Configuratie-instellingen

Every setting of this step can be modified after the installation through theChamilo _Administration_ page, **except** for the _Encryption method_ and the _Portal URL._

_Encryption method_ is almost impossible to change afterwards as it would imply re-generating new passwords for all users and sending them by e-mail. The default option is always the most secure, so we recommend you **leave it** as it is.

_Portal URL_ could be updated but only through the configuration file, which could prove tricky. Please select these two wisely.

* _Main language :_ default language on your portal.
* _Chamilo URL :_ URL of your Chamilo portal \(locally : [http://localhost/chamilo](http://localhost/chamilo); remotely : [http://www.mydomain.com/chamilo](http://www.mydomain.com/chamilo)\).
* _Admin's e-mail :_ portal administrator's e-mail contact address \(or support team\)
* _Admin's first name and last name :_ will be shown in the footer as the link to the admin's e-mail address. You can put any information there, like “Support team” as an example.
* _Admin's login and password :_ **IMPORTANT** – will allow you to connect to your portal as administrator later on. One option is to set a global functional admin account here \(named “admin”\) and have multiple people use that account. It is, however, recommended to create a more personalized account for each administrator \(so this first one should be yours\), to be able to keep track of all actions taken by other administrators.
* _Portal's name and organisation's short name :_ will be visible, only in specific visual themes, in the top left corner of the page \(on all pages\).
* _Encryption method :_ hashing and cryptographic functions that will be used to secure the users passwords in your database. We recommend \(and select by default\) the most secure one available in Chamilo: SHA1.
* _Self registration :_ will allow user to register alone; set to _No_ for a private portal.
* _Self registration as teacher :_ will allow user to register alone as a teacher; only taken into account if the previous setting is set to _Yes_. This will allow new users to register as teachers, and thus to create new courses.

**Note** : The user defined on this screen will have full administration permissions. He will be able to update the settings on this page afterwards.

