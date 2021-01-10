# Modifikatoren

Schließlich gibt es Möglichkeiten, bei denen Sie möchten, dass die Vorlage etwas für Sie tut, das nicht sehr kompliziert ist, aber auf einer Art Verarbeitung beruht. Dafür gibt es Modifikatoren.

Zum Beispiel und wahrscheinlich der gebräuchlichste Modifikator in vorhandenen tpl-Dateien: get\_lang, nimmt den angegebenen Wert und verwendet die interne Prozedur von Chamilo, um ihn zu übersetzen und die Übersetzung als Ergebnis anzuzeigen, wo das Tag genau dort platziert wurde.

Zum Beispiel könnten Sie einen Abschnitt wie diesen haben, der einen Teil des Headers darstellt:

```text
{{"Home"|get_lang}}
```

In diesem Fall wird der Begriff « Home » von Chamilos get\_lang\(\) Funktion übersetzt, bevor er auf dem Bildschirm angezeigt wird. Der resultierende Code für diesen tpl-Block unter Berücksichtigung früherer Beispiele auf Französisch würde ungefähr so aussehen:

```text
Accueil
```

Wenn Sie Sprachbegriffe mit mehreren einzufügenden Variablen verwenden \(zum Beispiel « DateFromXToY »\), müssen Sie zwei Modifikatoren kombinieren:

```text
{{ 'DateFromXToY' | get_lang | format(dateX, dateY) }}
```

Wo DateX und DateY Variablen sind, die Sie zuvor « assigned » zu Ihrem Template haben.

Beispiele hierfür finden Sie in main/template/default/skill/skill\_info.tpl.

## Verwenden des Modifikators „get\_lang“ mit Plugins

Bei der Entwicklung von Plugins mit .tpl \(was empfohlen wird\) ist der Anwendungsfall etwas anders. Wenn Sie Variablen verwenden, die **nur** im Ordner lang/ des Plugins definiert wurden \(siehe Abschnitt Sprachvariablen auf Seite 50\) und um sicherzustellen, dass auch die Elternsprachen berücksichtigt werden \(falls die Benutzer Ihres Plugins eine Untersprache verwenden - siehe "Sub-languages" für verwandte Informationen\), müssen Sie verwende den modifizierer get\_plugin\_lang.

Dieser Modifikator verwendet jedoch einen zusätzlichen Parameter, den Namen des Plugins **Klasse**. Wenn wir also einen der vorherigen Fälle wiederverwenden und sagen, dass wir an einem Plugin arbeiten, das einen Ordner namens plugins/homepage-looks/ enthält, aber darin heißt die Hauptklasse HomepageLockupGin:

```text
Accueil
```

... und beschließe, dass der französische Begriff “Accueil” \(“Home”, in einem Webkontext\) durch Plugin-spezifische Übersetzungen übersetzt werden soll, dann wäre unsere erste Reaktion, dies zu tun:

```text
{{ “Home” | get_lang }}
```

Dies wird jedoch bei Untersprachen keine Plugin-spezifischen Übersetzungen berücksichtigen. Tun Sie das stattdessen:

```text
{{ “Home” | get_plugin_lang('HomepageLooksPlugin') }}
```

Auf diese Weise wird Chamilo speziell nach einer im Plugin definierten Übersetzung suchen, und wenn keine Übersetzung für die vom Benutzer erstellte Untersprache gefunden wird, sucht es nach einer übergeordneten Sprache, die es verwenden kann, und wird schließlich auf Englisch gesetzt, wenn keiner dieser beiden Schritte funktioniert.

Zusammenfassend sollten alle Ihre Plugins den Modifikator _get\_plugin\_lang_ anstelle des Modifikators get\_lang verwenden, wenn eine Übersetzung speziell im Plugin definiert ist.

