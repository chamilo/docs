
# Säubern des Cache

Wenn Sie Vorlagen ändern möchten, müssen Sie eines wissen und sich daran erinnern: Nachdem Sie Ihre Änderungen geschrieben haben und bevor Sie sie testen, müssen Sie den Inhalt des `app/cache/twig/` -Verzeichnisses löschen.

Andernfalls bleibt der Cache in der Nähe und Sie werden keine \(oder Sie werden nur einige\ sehen) Ihrer Änderungen sehen, was Sie glauben lassen könnte, dass sie nicht wirksam werden.

Diese Bereinigung wird auch ausgeführt, wenn Sie die "Archive/Cache cleanup" -Option auf dem Hauptadministrationsbildschirm Ihres Chamilo-Portals verwenden \("System" -Block\).

Alternativ können Sie Chash \(ein Befehlszeilentool für Chamilo\) mit dem folgenden Befehl verwenden:

```text
chash files:clean_temp_folder
```

Das heißt, wenn Sie Chash [6](https://github.com/chamilo/chash) installiert haben.