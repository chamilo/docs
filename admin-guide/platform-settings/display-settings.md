# Display Settings

How the platform is displayed to users — homepage layout, gravatar, menus, branding behaviour and similar visual preferences.

Access these settings under **Administration > Configuration settings > Display**. This category contains **24 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `accessibility_font_resize`

**Font resize accessibility feature**

Enable this option to show a set of font resize options on the top-right side of your campus. This will allow visually impaired to read their course contents more easily.

*Default: `false`*

### `display_categories_on_homepage`

**Display categories on home page**

This option will display or hide courses categories on the portal home page

*Default: `false`*

### `enable_help_link`

**Enable help link**

The Help link is located in the top right part of the screen

*Default: `true`*

### `gravatar_enabled`

**Gravatar user pictures**

Enable this option to search into the Gravatar repository for pictures of the current user, if the user hasn't defined a picture locally. This is great to auto-fill pictures on your site, in particular if your users are active internet users. Gravatar pictures can be configured easily, based on the e-mail address of a user, at http://en.gravatar.com/

*Default: `false`*

### `gravatar_type`

**Gravatar avatar type**

If the Gravatar option is enabled and the user doesn't have a picture configured on Gravatar, this option allows you to choose the type of avatar that Gravatar will generate for each user. Check <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> for avatar types examples.

*Default: `mm`*

### `hide_complete_name_in_whoisonline`

**Hide the complete username in 'who is online'**

The 'who is online' page (if enabled) will show a picture and a name for each user currently online. Enable this option to hide the names.

*Default: `false`*

### `hide_logout_button`

**Hide logout button**

Hide the logout button. This is usually only interesting when using an external login/logout method, for example when using Single Sign On of some sort.

*Default: `false`*

### `hide_main_navigation_menu`

**Hide main navigation menu**

When using Chamilo for a specific purpose (like one massive online exam), you might want to reduce distraction even more by removing the side menu.

*Default: `false`*

### `hide_social_media_links`

**Hide social media links**

Some pages allow you to promote the portal or a course on social networks. Enable this setting to remove the links.

*Default: `false`*

### `order_user_list_by_official_code`

**Order users by official code**

Use the 'official code' to sort most students list on the platform, instead of their lastname or firstname.

*Default: `false`*

### `pdf_logo_header`

**PDF header logo**

Whether to use the image at var/themes/[your-theme]/images/pdf_logo_header.png as the PDF header logo for all PDF exports (instead of the normal portal logo)

### `show_admin_toolbar`

**Show admin toolbar**

Shows a global toolbar on top of the page to the designated user roles. This toolbar, very similar to Wordpress and Google's black toolbars, can really speed up complicated actions and improve the space you have available for the learning content, but it might be confusing for some users

*Default: `do_not_show`*

### `show_back_link_on_top_of_tree`

**Show back links from categories/courses**

Show a link to go back in the courses hierarchy. A link is available at the bottom of the list anyway.

*Default: `false`*

### `show_closed_courses`

**Display closed courses on login page and portal start page?**

Display closed courses on the login page and courses start page? On the portal start page an icon will appear next to the courses to quickly subscribe to each courses. This will only appear on the portal's start page when the user is logged in and when the user is not subscribed to the portal yet.

*Default: `false`*

### `show_email_addresses`

**Show email addresses**

Show email addresses to users

*Default: `false`*

### `show_empty_course_categories`

**Show empty courses categories**

Show the categories of courses on the homepage, even if they're empty

*Default: `true`*

### `show_hot_courses`

**Show hot courses**

The hot courses list will be added in the index page

*Default: `true`*

### `show_number_of_courses`

**Show courses number**

Show the number of courses in each category in the courses categories on the homepage

*Default: `false`*

### `show_tabs`

**Main menu entries**

Check the entrie you want to see appear in the main menu

*Default:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Main menu entries per role**

Define header tabs visibility per role.

*Default: `{}`*

### `showonline`

**Who's Online**

Display the number of persons that are online?

*Default: `world`*

### `table_default_row`

**Default number of table rows**

How many rows should be shown in all tables by default.

*Default: `20`*

### `table_row_list`

**Default offered pagination numbers in tables**

Set the options you want to appear in the navigation around a table to show less or more rows on one page. e.g. [50, 100, 200, 500].

*Default: `[10,20,50,100]`*

### `time_limit_whosonline`

**Time limit on Who Is Online**

This time limit defines for how many minutes after his last action a user will be considered *online*

*Default: `30`*
