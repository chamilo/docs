# Sprachvariablen

Plugins können auch die globale get\_lang\(\) -Funktion verwenden, die im Rest des Codes von Chamilo verfügbar ist, aber sie müssen eine Variante verwenden: get\_plugin\_lang\(\), für die Sie den Namen des Plugins angeben müssen, in dem es verwendet wird.

Sprachvariablen müssen sich in einer lang/ \[language\] .php-Datei befinden. ZB befindet sich die grundlegende Plugin-Sprachdatei für das Plugin « abc » im Unterordner des Plugins « lang »: /plugin/abc/lang/english.php

Die Datei selbst muss das folgende Format verwenden:

```text
/* Plugin's language variables */

$strings['plugin_title'] = 'ABC';
$strings['plugin_comment'] = 'Plugin for managing the … website';
$strings['SelectASession'] = 'Select a session';
```

Wie Sie sehen, muss das Format als Array namens « $strings » festgelegt werden.

Die beiden ersten Array-Elemente sind obligatorisch. Sie ermöglichen es Administratoren, den Plugin-Namen und eine kurze Beschreibung in ihrer eigenen Sprache zu sehen.

Um die Variablen aus dem Plugin zu verwenden, in einer Vorlagendatei \(.tpl\)... \(muss abgeschlossen werden\)