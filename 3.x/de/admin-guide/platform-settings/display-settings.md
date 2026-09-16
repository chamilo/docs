# Anzeigeeinstellungen

Wie die Plattform den Nutzern angezeigt wird — Layout der Startseite, Gravatar, Menüs, Branding-Verhalten und ähnliche visuelle Präferenzen.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Anzeige**. Diese Kategorie enthält **28 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Settings-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `accessibility_font_resize`

**Barrierefreie Schriftgrößenanpassung**

Aktivieren Sie diese Option, um oben rechts auf Ihrem Campus eine Reihe von Optionen zur Schriftgrößenanpassung anzuzeigen. Dadurch können sehbehinderte Personen ihre Kursinhalte leichter lesen.

*Standard: `false`*

### `display_categories_on_homepage`

**Kategorien auf der Startseite anzeigen**

Diese Option blendet Kurskategorien auf der Portal-Startseite ein oder aus

*Standard: `false`*

### `enable_help_link`

**Hilfe-Link aktivieren**

Der Hilfe-Link befindet sich oben rechts auf dem Bildschirm

*Standard: `true`*

### `gravatar_enabled`

**Gravatar-Benutzerbilder**

Aktivieren Sie diese Option, um im Gravatar-Repository nach Bildern des aktuellen Benutzers zu suchen, sofern der Benutzer lokal kein Bild definiert hat. Das ist ideal, um Bilder auf Ihrer Site automatisch zu füllen, insbesondere wenn Ihre Nutzer im Internet aktiv sind. Gravatar-Bilder lassen sich einfach anhand der E-Mail-Adresse eines Benutzers unter http://en.gravatar.com/ konfigurieren.

*Standard: `false`*

### `gravatar_type`

**Gravatar-Avatar-Typ**

Wenn die Gravatar-Option aktiviert ist und der Benutzer auf Gravatar kein Bild konfiguriert hat, können Sie mit dieser Option den Typ des Avatars wählen, den Gravatar für jeden Benutzer erzeugt. Beispiele für Avatar-Typen finden Sie unter <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a>.

*Standard: `mm`*

### `hide_complete_name_in_whoisonline`

**Vollständigen Benutzernamen in „Wer ist online“ ausblenden**

Die Seite „Wer ist online“ (falls aktiviert) zeigt für jeden aktuell online befindlichen Benutzer ein Bild und einen Namen. Aktivieren Sie diese Option, um die Namen auszublenden.

*Standard: `false`*

### `hide_home_top_when_connected` **v3**

**Oberen Inhalt auf der Startseite ausblenden, wenn angemeldet**

Auf der Plattform-Startseite können Sie mit dieser Option den Einführungsblock ausblenden (um beispielsweise nur die Ankündigungen zu belassen), und zwar für alle bereits angemeldeten Benutzer. Der allgemeine Einführungsblock erscheint weiterhin für Benutzer, die noch nicht angemeldet sind.

*Standard: `false`*

### `hide_logout_button`

**Abmelde-Schaltfläche ausblenden**

Die Abmelde-Schaltfläche ausblenden. Das ist in der Regel nur interessant, wenn eine externe Anmelde-/Abmeldemethode verwendet wird, beispielsweise bei einer Art Single Sign-On.

*Standard: `false`*

### `hide_main_navigation_menu`

**Hauptnavigationsmenü ausblenden**

Wenn Sie Chamilo für einen bestimmten Zweck nutzen (etwa eine große Online-Prüfung), möchten Sie Ablenkung möglicherweise noch weiter reduzieren, indem Sie das Seitenmenü entfernen.

*Standard: `false`*

### `hide_social_media_links`

**Links zu sozialen Medien ausblenden**

Einige Seiten ermöglichen es, das Portal oder einen Kurs in sozialen Netzwerken zu bewerben. Aktivieren Sie diese Einstellung, um die Links zu entfernen.

*Standard: `false`*

### `order_user_list_by_official_code`

**Benutzer nach offiziellem Code sortieren**

Verwenden Sie den „offiziellen Code“, um die meisten Studierendenlisten auf der Plattform zu sortieren, anstelle von Nachname oder Vorname.

*Standard: `false`*

### `pdf_logo_header`

**PDF-Kopfzeilenlogo**

Ob das Bild unter var/themes/[your-theme]/images/pdf_logo_header.png als PDF-Kopfzeilenlogo für alle PDF-Exporte verwendet werden soll (anstelle des normalen Portal-Logos)

### `show_admin_toolbar`

**Admin-Symbolleiste anzeigen**

Zeigt den vorgesehenen Benutzerrollen oben auf der Seite eine globale Symbolleiste. Diese Symbolleiste, sehr ähnlich den schwarzen Symbolleisten von Wordpress und Google, kann komplizierte Aktionen erheblich beschleunigen und den für Lerninhalte verfügbaren Platz verbessern, könnte aber für einige Benutzer verwirrend sein

*Standard: `do_not_show`*

### `show_administrator_data` **v3**

**Informationen zum Plattformadministrator in der Fußzeile**

Die Informationen zum Plattformadministrator in der Fußzeile anzeigen?

*Standard: `true`*

### `show_back_link_on_top_of_tree`

**Zurück-Links von Kategorien/Kursen anzeigen**

Einen Link anzeigen, um in der Kurshierarchie zurückzugehen. Ein Link ist ohnehin am unteren Ende der Liste verfügbar.

*Standard: `false`*

### `show_closed_courses`

**Geschlossene Kurse auf der Anmeldeseite und der Portal-Startseite anzeigen?**

Geschlossene Kurse auf der Anmeldeseite und der Kursstartseite anzeigen? Auf der Portal-Startseite erscheint neben den Kursen ein Symbol, um sich schnell für die jeweiligen Kurse einzuschreiben. Dies erscheint auf der Portal-Startseite nur, wenn der Benutzer angemeldet ist und wenn der Benutzer noch nicht für das Portal eingeschrieben ist.

*Standard: `false`*

### `show_email_addresses`

**E-Mail-Adressen anzeigen**

E-Mail-Adressen für Benutzer anzeigen

*Standard: `false`*

### `show_empty_course_categories`

**Leere Kurskategorien anzeigen**

Die Kurskategorien auf der Startseite anzeigen, auch wenn sie leer sind

*Standard: `true`*

### `show_hot_courses`

**Beliebte Kurse anzeigen**

Die Liste der beliebten Kurse wird auf der Indexseite hinzugefügt

*Standard: `true`*

### `show_number_of_courses`

**Anzahl der Kurse anzeigen**

Die Anzahl der Kurse in jeder Kategorie in den Kurskategorien auf der Startseite anzeigen

*Standard: `false`*

### `show_tabs`

**Einträge im Hauptmenü**

Die Einträge auswählen, die im Hauptmenü erscheinen sollen

*Standard:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Einträge im Hauptmenü je Rolle**

Die Sichtbarkeit der Kopfzeilen-Registerkarten je Rolle festlegen.

*Standard: `{}`*

### `show_teacher_data` **v3**

**Lehrerinformationen in der Fußzeile anzeigen**

Die Lehrerangabe (Name und E-Mail, sofern verfügbar) in der Fußzeile anzeigen?

*Standard: `true`*

### `show_tutor_data` **v3**

**Daten des Tutors der Sitzung werden in der Fußzeile angezeigt.**

Die Angabe des Sitzungstutors (Name und E-Mail, sofern verfügbar) in der Fußzeile anzeigen?

*Standard: `true`*

### `showonline`

**Wer ist online**

Die Anzahl der Personen anzeigen, die online sind?

*Standard: `world`*

### `table_default_row`

**Standardanzahl der Tabellenzeilen**

Wie viele Zeilen in allen Tabellen standardmäßig angezeigt werden sollen.

*Standard: `20`*

### `table_row_list`

**Standardmäßig angebotene Paginierungszahlen in Tabellen**

Legen Sie die Optionen fest, die in der Navigation um eine Tabelle herum erscheinen sollen, um weniger oder mehr Zeilen auf einer Seite anzuzeigen. z. B. [50, 100, 200, 500].

*Standard: `[10,20,50,100]`*

### `time_limit_whosonline`

**Zeitlimit für „Wer ist online“**

Dieses Zeitlimit legt fest, wie viele Minuten nach seiner letzten Aktion ein Benutzer als *online* gilt

*Standard: `30`*