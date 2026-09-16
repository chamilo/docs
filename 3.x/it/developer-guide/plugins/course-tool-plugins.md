# Plugin degli strumenti del corso

I plugin degli strumenti del corso aggiungono nuovi strumenti alla homepage del corso, accanto agli strumenti integrati come Documenti, Esercizi e Forum.

## Come funzionano i plugin degli strumenti del corso

Quando un plugin si registra come strumento del corso:

1. Compare nella griglia degli strumenti della homepage del corso
2. I docenti possono mostrarlo/nasconderlo come qualsiasi altro strumento
3. Facendo clic sullo strumento si apre l'interfaccia del plugin nel contesto del corso

## Registrazione come strumento del corso

Nella classe del plugin, impostare `$isCoursePlugin = true`. Per aggiungere automaticamente un'icona dello strumento alla homepage del corso, impostare anche `$addCourseTool = true`:

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## Impostazioni per corso

Definire i campi di configurazione a livello di corso tramite la proprietà `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Questi campi compaiono nel pannello delle impostazioni del corso e possono essere convalidati sovrascrivendo `validateCourseSetting(string $variable)` (restituire `false` per rifiutare un valore) oppure gestiti tramite `course_settings_updated(array $values)`.

## Installazione e disinstallazione

Per registrare i campi del plugin in tutti i corsi esistenti in fase di installazione:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Per installare in un singolo corso (ad esempio, quando viene creato un nuovo corso):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Per rimuovere i campi da un corso specifico:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Punti di integrazione

I plugin degli strumenti del corso si integrano tramite:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registra il plugin come strumento nel corso
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Determina quali strumenti (inclusi gli strumenti dei plugin) compaiono nella homepage del corso
* Lo strumento compare nella collezione `CTool` del corso

## Contesto del corso

Quando un discente fa clic sullo strumento del plugin, il codice del plugin viene eseguito nel contesto del corso. È possibile accedere a:

* Il corso corrente (tramite `api_get_course_id()` o lo store della richiesta CID)
* La sessione corrente (se applicabile)
* L'utente corrente
* Le impostazioni del plugin a livello di corso

## Esempi

Plugin integrati degli strumenti del corso:

* **BigBlueButton** (`Bbb/`) — Videoconferenza all'interno dei corsi
* **Zoom** (`Zoom/`) — Riunioni Zoom all'interno dei corsi
* **OnlyOffice** (`Onlyoffice/`) — Modifica dei documenti all'interno dei corsi