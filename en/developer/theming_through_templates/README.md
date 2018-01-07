# Theming through templates

![](../assets/images14.png) ![](../assets/images13.png) ![](../assets/images15.png)
Chamilo, since version 1.10, uses the Twig templating engine for most (and in the future all) of its interface.

To update the template in Chamilo, you can one of two things: redefine some template files in `main/template/override/` OR copy the `default` folder and modify a line in `app/config/configuration.php`, following this procedure :

```
cd main/template/
cp -r default newtemplate
cd newtemplate
// edit the new template to your heart's contempt
vim ../../app/config/configuration.php
// Find the $_configuration['default_template'] setting and replace
// 'default' by 'newtemplate', then uncomment it (remove the // prefix)
// Finally, refresh the archives (find the « Archive cleanup » option on
// the admin page
```

This way, you can edit anything in your new template, while keeping the original template available, and you also avoid your template being overwritten during your next Chamilo upgrade.

However, it is important to understand that any custom template will have to be maintained: if a new .tpl file is created in the default/ template in Chamilo, then this new .tpl file will have to be added to your custom template.
In the case of the override/ folder, although it is not necessary to create the corresponding file, it is still necessary to make sure that no new information added to the default/ .tpl file that would otherwise not appear in the override.
These changes can be tracked through the history of changes in the default/ directory on Github: https://github.com/chamilo/chamilo-lms/commits/1.11.x/main/template/default

Inside the _default_ directory, you&#039;ll find the following directories, which we explain when needed (most of them are self-explanatory).

 - admin
 - agenda
 - auth → all stuff related to authentication forms and processes
 - course_description
 - create_course
 - export
 - form
 - glossary
 - index → homepage for anonymous users and announcements
 - layout → header, footer, banner and more are stored here
 - learnpath 
 - link 
 - mail_editor
 - notebook
 - pages
 - social
 - skill
 - userportal → list courses in « My courses » tab
 - work

