# Verwendbare Variablen

Da wir möchten, dass dieses Vorlagensystem für uns praktisch ist und wir am Ende unserer Skripte nicht immer alle gängigen Variablen zuweisen möchten, die wir am Ende unserer Skripte benötigen, enthält Chamilo eine Reihe vordefinierter Variablen und Arrays, die Sie verwenden können.

Hier ist eine Liste dieser Variablen und Arrays... Nicht, dass es vielleicht nicht erschöpfend wäre und wir Ihnen derzeit nicht helfen können, diese aufzulisten, aber Sie könnten **in**  _****_ ****main/inc/lib/template.lib.php _**hacken und nach allen**_ $this-&gt;assign \('wörtlich', $variable\); \*\*\_ Aufrufe, um es herauszufinden.

## Das\_u Array

Das Array **\_u** enthält allgemeine Informationen über den Benutzer. Sie könnten den Vornamen des Benutzers in jedem tpl drucken lassen, indem Sie die folgende Syntax verwenden:

```text
{{ _u.firstname }}
```

Hier ist eine vollständige Liste der enthaltenen Werte zusammen mit einem Beispiel für den Wert, den Sie von ihnen erhalten. Wie Sie sehen werden, werden einige davon unter einem etwas anderen Namen dupliziert. Wir empfehlen, die Variablen in Kleinbuchstaben immer zu verwenden, da andere in Zukunft schrittweise bereinigt werden sollten.

```text
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

## Das\_p Array

Dieses Array enthält eine Liste verschiedener Formen von Pfaden, die Sie möglicherweise auf Vorlagenebene benötigen, um beispielsweise mit anderen Ressourcen zu verknüpfen.

```text
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

Sie können die Grundlage für das Kursverzeichnis erhalten, das in jedem tpl gedruckt werden soll, indem Sie die folgende Syntax verwenden:

```text
{{ _p.web_course }}
```

Beachten Sie, dass Systempfade, obwohl sie sonst in den PHP-Skripten leicht verfügbar sind, hier nicht bereitgestellt werden, da sie den Endbenutzern \(auch nicht im HTML-Quellcode\) angezeigt werden sollten.

## Das\_s Array

Dieses Array enthält einige Systemvariablen, die allgemeine Plattforminformationen darstellen

```text
[software_name] => Chamilo 
[system_version] => 1.11.6
[site_name] => My campus 
[institution] => My Organisation
[date] => Wednesday, January 31st 2018 // only available starting 1.10.0
[timezone] => Europe/Brussels
[gamification_mode] => true/false
```

dh Sie können den Site-Namen \(wie in den globalen Einstellungen konfiguriert\) in jedem tpl drucken, indem Sie die folgende Syntax verwenden:

```text
{{ _s.site_name }}
```

## Das\_c Array

Dieses Array \(nur ab 1.9.8 vorhanden\) enthält Informationen über den aktuellen Kurs.

Sie können überprüfen, ob der aktuelle Kurs definiert ist \(dh wenn sich der Benutzer gerade in einem Kurs befindet\), indem Sie die Variable _course\_is\_set_ verwenden:

```text
{ % if course_is_set %}

… template elements

{ % endif %}
```

Das\_c Array sieht so aus:

```text
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

Wie Sie sehen, enthält es auch die Sitzungs-ID. Die Sitzungs-ID ist immer 0, wenn wir überhaupt nicht in einer Sitzung sind.

Sie können auch aus der tpl die `{{ course_code }}` -Variable verwenden, die `{{ _c.code }}` entspricht.

Obwohl es bereits etwas komplexer ist, könnten Sie entscheiden, ob Sie einen Link zu einem Kurs anzeigen möchten oder nicht, indem Sie dessen Sichtbarkeit überprüfen:

```text
{ % if _c.visibility == 1 %}
   <a class="pull-right"  href="{{ _s.web_course}}{{ _c.directory }}/index.php">{{ _c.title }}</a>
{% endif %}
```

Wie Sie sehen, haben wir hier mehrere Variablen kombiniert, darunter eine aus dem\_s-Array, um eine Bedingung zu schreiben, die dem Benutzer einen vollständigen Link zur Kurs-Homepage zeigt, nur wenn der Kurs eine Sichtbarkeit von « 1 » hat.

## Einzelne Variablen

Andere Variablen werden einzeln definiert, sind aber immer in jedem Template verfügbar.

Wie bei den vorherigen Gruppen sollte die folgende Liste durch die bereitgestellten Beispielwerte selbsterklärend sein. In einigen Fällen fügen wir nach einem « // » -Zeichen einen Kommentar hinzu, um Ihnen weitere Informationen zu geben.

```text
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

dh Sie können den Namen des aktuell verwendeten CSS abrufen \(und so Elemente aus dem Ordner images/dort abrufen\), indem Sie einfach die folgende Syntax verwenden:

