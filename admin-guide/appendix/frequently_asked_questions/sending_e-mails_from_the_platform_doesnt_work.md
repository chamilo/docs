# Sending e-mails from the platform doesn't work

Under Windows, you are required to configure the _main/inc/conf/mail.conf.php_ file to use an SMTP server. The file is quite understandable. If you use an SMTP server with authentication, configure _smtp\_auth_ to _1_ and define a user and a password. If you use an open SMTP server, set _smtp\_auth_ to _0_.

Under GNU/Linux, you can choose to use an SMTP server like under Windows. Alternatively, if your browser allows it, you can use a local mails server. To configure one under Ubuntu, you can follow the documentation on the BeezNest blog: [http://beeznest.wordpress.com/?s=](http://beeznest.wordpress.com/?s=exim4)[exim4](http://beeznest.wordpress.com/?s=exim4)

