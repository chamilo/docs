## Usable variables

Because we want this template system to be practical for us, and because we don't want to always be assigning all the common variables we'll need rightat the end of our scripts, Chamilo comes with a set of pre-defined variables and arrays you can use.

Here is a list of those variables and arrays... Not that it might not be exhaustive and that, at this time, we have no way of helping you list these, but you **could** hack into **_main/inc/lib/template.lib.php_** and search for all **_$this->assign('literal', $variable) ;_** calls to find out.

### The _u array

The **_u** array contains general information about the user. You could get the user's firstname to be printed inside any tpl by using the following syntax :

```
{{ _u.firstname }}
```

Here is a complete list of the values it contains, together with an example of the value you'll get from them. As you will see, some of these are duplicated under a slightly different name. We recommend always using the lowercase variables, as others should be cleaned out progressively in the future.

```
[complete_name] => John Doe
[complete_name_with_username] => John Doe (admin)
[firstname] => John 
[lastname] => Doe 
[firstName] => John 
[lastName] => Doe 
[mail] => john@example.com
[email] => john@example.com
[picture_uri] => 
[user_id] => 1 
[official_code] => ADMIN 
[status] => 1 
[auth_source] => platform
[active] => 1 
[username] => admin 
[theme] => 
[language] => english 
[last_login] => 2014-01-11 15:21:57
[lastLogin] => 2014-01-11 15:21:57
[avatar] => http://my.chamilo110.net/main/img/unknown.jpg
[avatar_sys_path] => /var/www/chamilo-lms/main/img/unknown.jpg
[avatar_small] => http://my.chamilo110.net/main/img/unknown_22.jpg
[logged] => 1 
[is_admin] => 1 
[messages_count] => 0
[messages_invitations_count] => 0
```

### The _p array

This array contains a list of different forms of paths that you might need at the template level, for example to link to other resources.

```
[web] => http://my.chamilo110.net/
[web_course] => http://my.chamilo110.net/courses/ 
[web_main] => http://my.chamilo110.net/main/ 
[web_css] => http://my.chamilo110.net/web/css/ 
[web_css_theme] => http://my.chamilo110.net/web/css/themes/chamilo/
[web_ajax] => http://my.chamilo110.net/main/inc/ajax/ 
[web_img] => http://my.chamilo110.net/main/img/ 
[web_plugin] => http://my.chamilo110.net/plugin/ 
[web_lib] => [http://my.chamilo110.net/main/inc/lib/](http://my.chamilo19.net/main/inc/lib/)// only since 1.9.8 or later
[web_upload] => http://my.chamilo110.net/app/upload/
[web_self] => [http://my.chamilo110.net/courses/ABC/index.php](http://my.chamilo19.net/courses/ABC/index.php)
[web_query_vars] => cidReq=ABC&amp;id_session=0
[web_self_query_vars] => [http://my.chamilo110.net/courses/ABC/index.php?cidReq=ABC&amp;id_session=0](http://my.chamilo19.net/courses/ABC/index.php?cidReq=ABC&id_session=0)
[web_cid_query] => cidReq=ABC&amp;id_session=0&amp;gidReq=0&amp;gradebook=0&amp;origin=...
```
You could get the basis of the courses directory to be printed inside any tpl by using the following syntax :

```
{{ _p.web_course }}
```

Note that system paths, although easily available otherwise in the PHP scripts, are not provided here, as they should never be shown to the final users (even in the HTML source code).

### The _s array

This array contains some system variables representing general platform information

```
[software_name] => Chamilo 
[system_version] => 1.11.6
[site_name] => My campus 
[institution] => My Organisation
[date] => Wednesday, January 31st 2018 // only available starting 1.10.0
[timezone] => Europe/Brussels
[gamification_mode] => true/false
```

i.e. you can get the site name (as configured in the global settings) to be printed inside any tpl by using the following syntax :

```
{{ _s.site_name }}
```

### The _c array

This array (only present starting from 1.9.8) contains information about the current course.

You can check if the current course is defined (i.e. if the user is inside a course right now) by using the _course_is_set_ variable :

```
{ % if course_is_set %}

… template elements

{ % endif %}
```

The _c array looks like this :

```
[id] => MODULE3 
[code] => MODULE3 
[title] => Module 3
[visibility] => 1
[language] => spanish 
[directory] => MODULE3 
[session_id] => 0// only since 1.9.8
[user_is_teacher] => true
[student_view] => false
```

As you can see, it also contains the session ID. Session ID is always 0 when we are **not** in a session at all.

You can also use, from the tpl, the `{{ course_code }}` variable, which is equivalent to `{{ _c.code }}`.

Although a bit more complex already, you could decide whether or not you'd want to show a link to a course by checking its visibility, like so:

```
{ % if _c.visibility == 1 %}
   <a class="pull-right"  href="{{ _s.web_course}}{{ _c.directory }}/index.php">{{ _c.title }}</a>
{% endif %}
```

As you can see, we combined several variables here, including one from the _s array, to write a condition that will show a full link to the course homepage to the user, only if the course has a visibility of « 1 ».

### Individual variables

Other variables are defined individually but are always available inside any template.

As for the previous groups, the list below should be self-explanatory through the example values provided. In some cases, we add a comment after a « // » sign to give you more info.

```
system_charset => utf-8
document_language => en
style => chamilo_red // the CSS used at this time, subfolder of main/css/
favico => [http://my.chamilo110.net/favicon.ico](http://my.chamilo19.net/favicon.ico)
logo => 
online_button => … //an HTML tag to show if another user is online
offline_button => … //an HTML tag to show if another user is offline
title_string => My portal – My organisation – Portal name
bug_notification_link => … //HTML tag representing the bug reporting icon
notification_menu => 
…menu => 
breadcrumb => 
profile_link => 
message_link => 
logout_link => [http://my.chamilo110.net/index.php?logout=logout&amp;uid=5](http://my.chamilo19.net/index.php?logout=logout&uid=5)
administrator_name => John Doe
teachers => Samuel Lee, Mark Hansen
header_extra_content => 
footer_extra_content => 
session_teachers => 
help_content => 
actions => 
show_footer => 
show_header => true //whether the header block should be shown or not
show_toolbar => 
css_file_to_string => 
css_style_print => 
js_file_to_string => 
extra_headers => 
show_course_shortcut => true or null //icons that appear if enabled
show_course_navigation_menu => true or null //icons that appear if enabled// since 1.9.8 only
css_styles => chamilo_red // disambig. of CSS/style vs theme vs template
template => default // disambiguation of CSS (*.css) vs template (*.tpl)
```

i.e. you can get the name of the current CSS in use (and so get elements from the images/ folder in there) simply by using the following syntax:

{{ style }}