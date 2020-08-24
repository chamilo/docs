## Web services {#web-services}

Chamilo LMS offers a series of web services, which have been extended over time. Although the current basis is not well organized, you should be able to find what you&#039;re looking for easily in the main/webservices/ directory.

More details about all our web services are available on our wiki: [http://support.chamilo.org/projects/chamilo-18/wiki/Web_services](http://support.chamilo.org/projects/chamilo-18/wiki/Web_services)

Between others, the current SOAP web services (but we also have some REST and XML-RPC services available) allow you to:

*   create, edit, enable, disable and delete users

*   create, edit, enable, disable and delete courses

*   create and edit courses&#039; descriptions

*   create, edit, enable, disable and delete sessions

*   subscribe or unsubscribe users to courses or sessions

*   subscribe courses to sessions

*   get a list of courses

The services already implemented also allow you to easily extend and build your own. Check the main/webservices/registration.soap.php file for a starting point. More structured scripts are around, but registration.soap.php is the one implementing the highest number of features at this point.

If you happen to develop new services, please consider sharing them with us at [http://support.chamilo.org/projects/chamilo-18/issues](http://support.chamilo.org/projects/chamilo-18/issues) (open an issue and file a _Feature_ suggestion with your code – we will “credit” you for this).

The _testip.php_ script will allow you to identify your own IP for the setup procedure described on the wiki.