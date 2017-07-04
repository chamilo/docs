## Usable variables {#usable-variables}

Because we want this templating system to be practical for us, and because we don&#039;t want to always be assigning all the common variables we&#039;ll need rightat the end of our scripts, Chamilo comes with a set of pre-defined variables and arrays you can use.

Here is a list of those variables and arrays... Not that it might not be exhaustive and that, at this time, we have no way of helping you list these, but you **could** hack into **_main/inc/lib/template.lib.php_** and search for all **_$this-&gt;assign(&#039;literal&#039;, $variable) ;_** calls to find out.

### The _u array {#the-u-array}

The **_u** array contains general information about the user. You could get the user&#039;s firstname to be printed inside any tpl by using the following syntax :

```
{{ _u.firstname }}
```

Here is a complete list of the values it contains, together with an example of the value you&#039;ll get from them. As you will see, some of these are duplicated under a slightly different name. We recommend always using the lowercase variables, as others should be cleaned out progressively in the future.

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

### The _p array {#the-p-array}

This array contains a list of different forms of paths that you might need at the template level, for example to link to other resources.

```
[web] =&gt; http://my.chamilo110.net/
[web_course] =&gt; http://my.chamilo110.net/courses/ 
[web_main] =&gt; http://my.chamilo110.net/main/ 
[web_css] =&gt; http://my.chamilo110.net/web/css/ 
[web_css_theme] =&gt; http://my.chamilo110.net/web/css/themes/chamilo/
[web_ajax] =&gt; http://my.chamilo110.net/main/inc/ajax/ 
[web_img] =&gt; http://my.chamilo110.net/main/img/ 
[web_plugin] =&gt; http://my.chamilo110.net/plugin/ 
[web_lib] =&gt; [http://my.chamilo110.net/main/inc/lib/](http://my.chamilo19.net/main/inc/lib/)// only since 1.9.8 or later
[web_upload] =&gt; http://my.chamilo110.net/app/upload/
[web_self] =&gt; [http://my.chamilo110.net/courses/ABC/index.php](http://my.chamilo19.net/courses/ABC/index.php)
[web_query_vars] =&gt; cidReq=ABC&amp;id_session=0
[web_self_query_vars] =&gt; [http://my.chamilo110.net/courses/ABC/index.php?cidReq=ABC&amp;id_session=0](http://my.chamilo19.net/courses/ABC/index.php?cidReq=ABC&id_session=0)
[web_cid_query] =&gt; cidReq=ABC&amp;id_session=0&amp;gidReq=0&amp;gradebook=0&amp;origin=...
```
You could get the basis of the courses directory to be printed inside any tpl by using the following syntax :

```
{{ _p.web_course }}
```

Note that system paths, although easily available otherwise in the PHP scripts, are not provided here, as they should never be shown to the final users (even in the HTML source code).

### The _s array {#the-s-array}

This array contains some system variables representing general platform information

```
[software_name] => Chamilo 
[system_version] => 1.10.0
[site_name] => My campus 
[institution] => My Organisation
[date] => Tuesday, March 31st 2015 // only available starting 1.10.0
[timezone] => 
[gamification_mode] => true/false
```

You could get the site name (as configured in the global settings) to be printed inside any tpl by using the following syntax :

```
{{ _s.site_name }}
```

### The _c array {#the-c-array}

This array (only present starting from 1.9.8) contains information about the current course.

You can check if the current course is defined (i.e. if the user is inside a course right now) by using the _course_is_set_ variable :

```
{ % if course_is_set %}

… template elements

{ % endif %}
```

The _c array looks like this :

```
[id] =&gt; MODULE3 
[code] =&gt; MODULE3 
[title] =&gt; Module 3
[visibility] =&gt; 1
[language] =&gt; spanish 
[directory] =&gt; MODULE3 
[session_id] =&gt; 0// only since 1.9.8
[user_is_teacher] =&gt; true
[student_view] =&gt; false
```

As you can see, it also contains the session ID. Session ID is always 0 when we are **not** in a session at all.

You can also use, from the tpl, the `{{ course_code }}` variable, which is equivalent to `{{ _c.code }}`.

Although a bit more complex already, you could decide whether or not you&#039;d want to show a link to a course by checking its visibility, like so:

```
{ % if _c.visibility == 1 %}
   <a class="pull-right"  href="{{ _s.web_course}}{{ _c.directory }}/index.php">{{ _c.title }}</a>
{% endif %}
```

As you can see, we combined several variables here, including one from the _s array, to write a condition that will show a full link to the course homepage to the user, only if the course has a visibility of « 1 ».

### Individual variables {#individual-variables}

Other variables are defined individually but are always available inside any template.

As for the previous groups, the list below should be self-explanatory through the example values provided. In some cases, we add a comment after a « // » sign to give you more info.

```
system_charset =&gt; utf-8
document_language =&gt; en
style =&gt; chamilo_red // the CSS used at this time, subfolder of main/css/
favico =&gt; [http://my.chamilo110.net/favicon.ico](http://my.chamilo19.net/favicon.ico)
logo =&gt; 
online_button =&gt; … //an HTML tag to show if another user is online
offline_button =&gt; … //an HTML tag to show if another user is offline
title_string =&gt; My portal – My organisation – Portal name
bug_notification_link =&gt; … //HTML tag representing the bug reporting icon
notification_menu =&gt; 
…menu =&gt; 
breadcrumb =&gt; 
profile_link =&gt; 
message_link =&gt; 
logout_link =&gt; [http://my.chamilo110.net/index.php?logout=logout&amp;uid=5](http://my.chamilo19.net/index.php?logout=logout&uid=5)
administrator_name =&gt; John Doe
teachers =&gt; Samuel Lee, Mark Hansen
header_extra_content =&gt; 
footer_extra_content =&gt; 
session_teachers =&gt; 
help_content =&gt; 
actions =&gt; 
show_footer =&gt; 
show_header =&gt; true //whether the header block should be shown or not
show_toolbar =&gt; 
css_file_to_string =&gt; 
css_style_print =&gt; 
js_file_to_string =&gt; 
extra_headers =&gt; 
show_course_shortcut =&gt; true or null //icons that appear if enabled
show_course_navigation_menu =&gt; true or null //icons that appear if enabled// since 1.9.8 only
css_styles =&gt; chamilo_red // disambig. of CSS/style vs theme vs template
template =&gt; default // disambiguation of CSS (*.css) vs template (*.tpl)
```

You could get the name of the current CSS in use (and so get elements from the images/ folder in there) simply by using the following syntax:

{{ style }}