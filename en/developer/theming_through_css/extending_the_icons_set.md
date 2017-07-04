## Extending the icons set {#extending-the-icons-set}

Chamilo 1.9 and 1.10 include a little-known feature by which custom icons, placed inside your CSS theme, can replace the pre-defined icons of Chamilo.

This, however, only works for icons that are normally loaded from the main/img/icons/ directory. Not the ones at the root of main/img/.

To replace icons, you will have to create, inside your own CSS theme folder (for example app/Resources/public/css/themes/chamili/) a subfolder called “icons/”, inside which the structure of the normal _main/img/icons/_ folder is reproduced.

For example, if you want to replace the edit_profile.png icon on the left menu, normally located in

main/img/icons/22/edit_profile.png

you would have to create

app/Resources/public/css/themes/chamili/icons/22/edit_profile.png

![](../assets/image11.png)

![](../assets/image12.png)

This is a short example of what type of style change you could generate just by creating a new folder in your CSS.

Remember that, to “flush” your style change, you either have to upload a new CSS folder in the ZIP format through the admin panel, OR to upload them directly to the server (in app/Resources/public/css/themes/[style]/). But if you do the latter, you will need to execute the _composer install_ command, otherwise your style will remain into app/ and will not be “flushed” into web/css/ as it needs to.

The real use of this feature is to avoid you having to modify the main/img/ folder in any way, considering this gets overwritten with each new version of the software.

Using your own CSS folder ensures independence of the main Chamilo code.