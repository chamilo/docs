# Bruikbare variabelen

Omdat we willen dat dit sjabloonsysteem praktisch voor ons is, en omdat we niet altijd alle gangbare variabelen willen toewijzen die we nodig hebben aan het einde van onze scripts, wordt Chamilo geleverd met een set vooraf gedefinieerde variabelen en arrays je kunt gebruiken.

Hier is een lijst met die variabelen en arrays... Niet dat het misschien niet volledig is en dat we je op dit moment niet kunnen helpen om deze op te sommen, maar je kunt _**main/inc/lib/template.lib.php**_ en zoek naar alle _**$this->assign\('literal', $variable\);**_ calls om erachter te komen.

## De \_u array

De **\_u** array bevat algemene informatie over de gebruiker. U kunt de voornaam van de gebruiker in elke tpl laten afdrukken door de volgende syntaxis te gebruiken:

```text
{{ _u.firstname }}
```

Hier is een volledige lijst met de waarden die het bevat, samen met een voorbeeld van de waarde die u ervan krijgt. Zoals u zult zien, zijn sommige hiervan onder een iets andere naam gedupliceerd. We raden aan om altijd de variabelen in kleine letters te gebruiken, omdat andere in de toekomst geleidelijk moeten worden opgeschoond.

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

## Het \_p array

Deze array bevat een lijst met verschillende vormen van paden die u mogelijk nodig heeft op sjabloonniveau, bijvoorbeeld om te linken naar andere bronnen.

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

U kunt de basis van de cursusmap die moet worden afgedrukt in elke tpl krijgen door de volgende syntaxis te gebruiken:

```text
{{ _p.web_course }}
```

Merk op dat systeempaden, hoewel ze anders gemakkelijk beschikbaar zijn in de PHP-scripts, hier niet worden gegeven, aangezien ze nooit aan de eindgebruikers mogen worden getoond (zelfs niet in de HTML-broncode).

## Het \_s array

Deze array bevat enkele systeemvariabelen die algemene platforminformatie vertegenwoordigen

```text
[software_name] => Chamilo 
[system_version] => 1.11.6
[site_name] => My campus 
[institution] => My Organisation
[date] => Wednesday, January 31st 2018 // only available starting 1.10.0
[timezone] => Europe/Brussels
[gamification_mode] => true/false
```

d.w.z. u kunt de sitenaam \(zoals geconfigureerd in de algemene instellingen\) binnen elke tpl laten afdrukken door de volgende syntaxis te gebruiken:

```text
{{ _s.site_name }}
```

## Het \_c array

Deze array \(alleen aanwezig vanaf 1.9.8\) bevat informatie over de huidige cursus.

Je kunt controleren of de huidige cursus is gedefinieerd \(d.w.z. of de gebruiker zich momenteel in een cursus bevindt\) door de variabele _course\_is\_set_ te gebruiken:

```text
{ % if course_is_set %}

… template elements

{ % endif %}
```

De \_c array ziet er als volgt uit:

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

Zoals u kunt zien, bevat het ook de sessie-ID. Sessie-ID is altijd 0 als we helemaal **niet** in een sessie zijn.

U kunt ook vanuit de tpl de variabele '{{course_code}}' gebruiken, die gelijk is aan '{{_c.code}}'.

Hoewel het al wat ingewikkelder is, kun je als volgt beslissen of je een link naar een cursus wilt weergeven door de zichtbaarheid ervan te controleren:

```text
{ % if _c.visibility == 1 %}
   <a class="pull-right"  href="{{ _s.web_course}}{{ _c.directory }}/index.php">{{ _c.title }}</a>
{% endif %}
```

Zoals je kunt zien, hebben we hier verschillende variabelen gecombineerd, waaronder een uit de \_s array, om een voorwaarde te schrijven die een volledige link naar de startpagina van de cursus aan de gebruiker laat zien, alleen als de cursus een zichtbaarheid van «1» heeft.

## Individuele variabelen

Andere variabelen worden afzonderlijk gedefinieerd, maar zijn altijd beschikbaar in elk sjabloon.

Net als voor de vorige groepen, zou de onderstaande lijst voor zichzelf moeten spreken door de gegeven voorbeeldwaarden. In sommige gevallen voegen we een opmerking toe na een «//» teken om u meer informatie te geven.

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

d.w.z. je kunt de naam krijgen van de huidige CSS die in gebruik is \(en dus elementen uit de images/ map daarin\) krijgen door simpelweg de volgende syntaxis te gebruiken:
