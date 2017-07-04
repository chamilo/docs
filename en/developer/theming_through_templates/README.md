# Theming through templates {#theming-through-templates}

![](../assets/images14.png)

![](../assets/images13.png)Chamilo 1.10 uses the Twig templating engine for part of its interface.

![](../assets/images15.png)As much as we&#039;d like to be able to use it everywhere, this is not the type of things that you would do in a few hours, so right now there&#039;s only localized support for templates.

This being said, we probably cover all the very important part : headers, footers and general layout are covered almost everywhere (to the notable exception of learning paths).

To update the template in 1.10.x, you can copy the default folder and modify a line in app/config/configuration.php, following this procedure :

cd main/template/cp -r default newtemplatecd newtemplate// edit the new template to your heart&#039;s contemptvim ../../app/config/configuration.php// Find the $_configuration[&#039;default_template&#039;] setting and replace// &#039;default&#039; by &#039;newtemplate&#039;, then uncomment it// Finally, refresh the archives (find the « Archive cleanup » option on// the admin page

This way, you can edit anything in your new template, while keeping the original template available, and you also avoid your template being overwritten during your next Chamilo upgrade.

Inside the _default_ directory, you&#039;ll find the following directories, which we explain when needed (most of them are self-explanatory).

admin /agenda /auth /course_description /create_course /export /form /glossary/ index /→ homepage for anonymous users and announcementslayout /→ header, footer, banner and more are stored herelearnpath/ link /mail_editor /notebook /pages /social /skill /userportal / → list courses in « My courses » tabwork/