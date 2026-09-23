# Administration af plugins

## Adgang til plugin-administratoren

![Plugin-administratoren viser en liste over tilgængelige plugins med aktiveringskontakter og konfigurationsmuligheder](../../.gitbook/assets/admin-plugin-manager.png)

Fra administrationspanelet skal du klikke på **Manage plugins** for at se listen over tilgængelige plugins.

## Plugin-tilstande

Hvert plugin har én af to tilstande:

* **Active** — Pluginnet er aktiveret, og dets funktioner er tilgængelige på platformen
* **Inactive** — Pluginnet er installeret, men deaktiveret

## Aktivering af et plugin

1. Find pluginnet på listen
2. Klik på **Install**, og derefter **Enable**, eller slå det til
3. Konfigurer pluginnets indstillinger (hvis relevant, find knappen **Configure**)
4. Gem
5. Hvis det anbefales i README, skal du aktivere det i et specifikt **region**

Nogle plugins tilføjer værktøjer til kurser, nye sider til platformen eller yderligere funktionalitet til eksisterende funktioner.

## Konfiguration af et plugin

Mange plugins har konfigurationsmuligheder. Efter aktivering af et plugin:

1. Klik på knappen **Configure** ved siden af pluginnet
2. Udfyld den påkrævede konfiguration (API-nøgler, URL'er, indstillinger osv.)
3. Gem

## Deaktivering af et plugin

1. Find pluginnet på listen
2. Klik på **Disable**, eller slå det fra
3. Pluginnets funktioner fjernes med det samme fra platformen, men pluginnet er stadig installeret og bevarer sin konfiguration, indtil du klikker på **Uninstall**

Deaktivering af et plugin sletter ikke dets data. Hvis du aktiverer det senere, er dataene stadig tilgængelige.

## Tips

* **Aktiver kun det, du har brug for** — Hvert aktivt plugin medfører et vist overhead. Hold ubrugte plugins deaktiverede.
* **Test før produktion** — Aktiver nye plugins i et testmiljø først
* **Tjek kompatibilitet** — Efter opgradering af Chamilo skal du kontrollere, at alle aktive plugins stadig fungerer korrekt