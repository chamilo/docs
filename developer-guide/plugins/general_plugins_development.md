# Algemene ontwikkeling van plug-ins

## Hooks

Plug-ins kunnen "hooks" gebruiken, die vergelijkbaar zijn met wat je in het Drupal CMS kunt vinden: plaatsen in de normale workflow van Chamilo waar plug-ins kunnen ingrijpen.

Het werkt in Chamilo door het normale proces te hebben, bijvoorbeeld om een gebruiker te verwijderen, een speciale functie aan te roepen die naar elke geïnstalleerde plug-in zoekt en die een specifieke methode implementeert.

De hooks zijn gedefinieerd in `main/inc/lib/hook/` en worden geïnstancieerd in de normale workflow. In `usermanager.lib.php` vinden we bijvoorbeeld dat de `UserManager :: create_user()` methode feitelijk het HookCreateUser-object instancieert en vervolgens een van zijn methoden aanroept:

```text
        $hook = HookCreateUser::create();
        if (!empty($hook)) {
            $hook->notifyCreateUser(HOOK_EVENT_TYPE_PRE);
        }
```

Hooks moeten ook in alle plug-ins worden gedefinieerd. Zie [https://github.com/chamilo/chamilo-lms/issues/1767](https://github.com/chamilo/chamilo-lms/issues/1767) voor een zeer korte opmerking over het probleem van het toevoegen van haken halverwege een secundaire versie, en over het bestaan van 3 functies \(`doWhenDeletingCourse`, `doWhenDeletingSession` en `doWhenDeletingUser`\) die nog niet als hooks zijn geïmplementeerd, maar die in 2.0.

