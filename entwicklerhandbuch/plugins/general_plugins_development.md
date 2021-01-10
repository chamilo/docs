# Allgemeine Plugins Entwicklung

## Haken

Plugins können "hooks" verwenden, was dem ähnlich ist, was im Drupal CMS zu finden ist: platziert im normalen Workflow von Chamilo, wo Plugins eingreifen können.

Es funktioniert in Chamilo, indem es den normalen Prozess hat, zum Beispiel um einen Benutzer zu löschen, eine spezielle Funktion aufruft, die nach einem installierten Plugin sucht und eine bestimmte Methode implementiert.

Die Hooks sind in `main/inc/lib/hook/` definiert und werden im normalen Workflow instanziiert. Zum Beispiel stellen wir in `usermanager.lib.php` fest, dass die `UserManager::create_user()` -Methode das HookCreateUser-Objekt tatsächlich instanziiert und dann eine ihrer Methoden aufruft:

```text
        $hook = HookCreateUser::create();
        if (!empty($hook)) {
            $hook->notifyCreateUser(HOOK_EVENT_TYPE_PRE);
        }
```

Hooks müssen auch in allen Plugins definiert werden. Siehe [https://github.com/chamilo/chamilo-lms/issues/1767](https://github.com/chamilo/chamilo-lms/issues/1767) für eine sehr kurze Notiz zum Thema Hinzufügen von Hooks auf halbem Weg zu einer Nebenversion und zur Existenz von 3 Funktionen \(`doWhenDeletingCourse`, `doWhenDeletingSession` und `doWhenDeletingUser`\), die noch nicht implementiert sind, aber das sollten in 2.0 sein.

