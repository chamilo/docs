# Anzeigeeinstellungen

Wie die Plattform für Benutzer angezeigt wird – Layout der Startseite, Gravatar, Menüs, Branding-Verhalten und ähnliche visuelle Präferenzen.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Anzeige** zu. Diese Kategorie enthält **24 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `accessibility_font_resize`

**Barrierefreiheitsfunktion zur Schriftgrößenanpassung**

Aktivieren Sie diese Option, um eine Reihe von Schriftgrößenanpassungsoptionen oben rechts auf Ihrem Campus anzuzeigen. Dies ermöglicht Sehbehinderten, ihre Kursinhalte leichter zu lesen.

*Standard: `false`*

### `display_categories_on_homepage`

**Kategorien auf der Startseite anzeigen**

Diese Option zeigt oder verbirgt Kurskategorien auf der Startseite des Portals.

*Standard: `false`*

### `enable_help_link`

**Hilfelink aktivieren**

Der Hilfelink befindet sich oben rechts auf dem Bildschirm.

*Standard: `true`*

### `gravatar_enabled`

**Gravatar-Benutzerbilder**

Aktivieren Sie diese Option, um im Gravatar-Repository nach Bildern des aktuellen Benutzers zu suchen, falls der Benutzer lokal kein Bild definiert hat. Dies ist ideal, um Bilder auf Ihrer Seite automatisch auszufüllen, insbesondere wenn Ihre Benutzer aktive Internetnutzer sind. Gravatar-Bilder können einfach über die E-Mail-Adresse eines Benutzers unter http://en.gravatar.com/ konfiguriert werden.

*Standard: `false`*

### `gravatar_type`

**Gravatar-Avatar-Typ**

Wenn die Gravatar-Option aktiviert ist und der Benutzer kein Bild auf Gravatar konfiguriert hat, können Sie mit dieser Option den Typ des Avatars auswählen, den Gravatar für jeden Benutzer generieren soll. Beispiele für Avatar-Typen finden Sie unter <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a>.

*Standard: `mm`*

### `hide_complete_name_in_whoisonline`

**Vollständigen Benutzernamen in 'Wer ist online' ausblenden**

Die Seite 'Wer ist online' (falls aktiviert) zeigt ein Bild und einen Namen für jeden derzeit online befindlichen Benutzer an. Aktivieren Sie diese Option, um die Namen auszublenden.

*Standard: `false`*

### `hide_logout_button`

**Abmeldebutton ausblenden**

Blenden Sie den Abmeldebutton aus. Dies ist normalerweise nur interessant, wenn eine externe An-/Abmeldemethode verwendet wird, beispielsweise bei der Nutzung von Single Sign-On.

*Standard: `false`*

### `hide_main_navigation_menu`

**Hauptnavigationsmenü ausblenden**

Wenn Sie Chamilo für einen spezifischen Zweck nutzen (wie eine umfangreiche Online-Prüfung), möchten Sie möglicherweise Ablenkungen weiter reduzieren, indem Sie das Seitenmenü entfernen.

*Standard: `false`*

### `hide_social_media_links`

**Links zu sozialen Medien ausblenden**

Einige Seiten ermöglichen es Ihnen, das Portal oder einen Kurs in sozialen Netzwerken zu bewerben. Aktivieren Sie diese Einstellung, um die Links zu entfernen.

*Standard: `false`*

### `order_user_list_by_official_code`

**Benutzer nach offiziellem Code sortieren**

Verwenden Sie den 'offiziellen Code', um die meisten Studentenlisten auf der Plattform zu sortieren, anstatt nach Nach- oder Vornamen.

*Standard: `false`*

### `pdf_logo_header`

**PDF-Header-Logo**

Ob das Bild unter var/themes/[Ihr-Theme]/images/pdf_logo_header.png als PDF-Header-Logo für alle PDF-Exporte verwendet werden soll (anstelle des normalen Portal-Logos).

### `show_admin_toolbar`

**Admin-Toolbar anzeigen**

Zeigt eine globale Toolbar oben auf der Seite für die zugewiesenen Benutzerrollen an. Diese Toolbar, ähnlich wie die von Wordpress und Google, kann komplizierte Aktionen beschleunigen und den verfügbaren Platz für Lerninhalte verbessern, könnte jedoch für einige Benutzer verwirrend sein.

*Standard: `do_not_show`*

### `show_back_link_on_top_of_tree`

**Rücklinks von Kategorien/Kursen anzeigen**

Zeigt einen Link an, um in der Kurshierarchie zurückzugehen. Ein Link ist ohnehin am unteren Ende der Liste verfügbar.

*Standard: `false`*

### `show_closed_courses`

**Geschlossene Kurse auf der Anmeldeseite und der Portal-Startseite anzeigen?**

Sollen geschlossene Kurse auf der Anmeldeseite und der Kurs-Startseite angezeigt werden? Auf der Portal-Startseite erscheint ein Symbol neben den Kursen, um sich schnell für jeden Kurs anzumelden. Dies wird nur auf der Startseite des Portals angezeigt, wenn der Benutzer angemeldet ist und noch nicht für das Portal angemeldet ist.

*Standard: `false`*

### `show_email_addresses`

**E-Mail-Adressen anzeigen**

E-Mail-Adressen für Benutzer anzeigen.

*Standard: `false`*

### `show_empty_course_categories`

**Leere Kurskategorien anzeigen**

Zeigt die Kurskategorien auf der Startseite an, auch wenn sie leer sind.

*Standard: `true`*

### `show_hot_courses`

**Beliebte Kurse anzeigen**

Die Liste der beliebten Kurse wird auf der Indexseite hinzugefügt.

*Standard: `true`*

### `show_number_of_courses`

**Anzahl der Kurse anzeigen**

Zeigt die Anzahl der Kurse in jeder Kategorie in den Kurskategorien auf der Startseite an.

*Standard: `false`*

---
### `show_tabs`

**Hauptmenüeinträge**

Wählen Sie die Einträge aus, die im Hauptmenü angezeigt werden sollen.

*Standard:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Hauptmenüeinträge pro Rolle**

Definieren Sie die Sichtbarkeit der Kopfzeilen-Tabs pro Rolle.

*Standard: `{}`*

### `showonline`

**Wer ist online**

Soll die Anzahl der Personen, die online sind, angezeigt werden?

*Standard: `world`*

### `table_default_row`

**Standardanzahl von Tabellenzeilen**

Wie viele Zeilen sollen standardmäßig in allen Tabellen angezeigt werden?

*Standard: `20`*

### `table_row_list`

**Standardmäßig angebotene Paginierungsnummern in Tabellen**

Legen Sie die Optionen fest, die in der Navigation um eine Tabelle angezeigt werden sollen, um weniger oder mehr Zeilen auf einer Seite anzuzeigen, z. B. [50, 100, 200, 500].

*Standard: `[10,20,50,100]`*

### `time_limit_whosonline`

**Zeitlimit für "Wer ist online"**

Dieses Zeitlimit definiert, wie viele Minuten nach der letzten Aktion ein Benutzer als *online* gilt.

*Standard: `30`*