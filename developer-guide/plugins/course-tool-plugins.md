# Plugin per Strumenti del Corso

I plugin per strumenti del corso aggiungono nuovi strumenti alla homepage del corso insieme agli strumenti integrati come Documenti, Esercizi e Forum.

## Come Funzionano i Plugin per Strumenti del Corso

Quando un plugin si registra come strumento del corso:

1. Appare nella griglia degli strumenti sulla homepage del corso
2. I docenti possono mostrarlo o nasconderlo come qualsiasi altro strumento
3. Cliccando sullo strumento si apre l'interfaccia del plugin all'interno del contesto del corso

## Registrazione come Strumento del Corso

Nella classe del tuo plugin, imposta `$isCoursePlugin = true`. Per aggiungere automaticamente un'icona dello strumento alla homepage del corso, imposta anche `$addCourseTool = true`:

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

## Impostazioni per Corso

Definisci i campi di configurazione a livello di corso tramite la proprietà `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Questi appaiono nel pannello delle impostazioni del corso e possono essere validati sovrascrivendo `validateCourseSetting(string $variable)` (restituisci `false` per rifiutare un valore) o gestiti tramite `course_settings_updated(array $values)`.

## Installazione e Disinstallazione

Per registrare i campi del plugin in tutti i corsi esistenti durante l'installazione:

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

## Punti di Integrazione

I plugin per strumenti del corso si integrano tramite:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registra il plugin come strumento nel corso
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Determina quali strumenti (inclusi i plugin) appaiono sulla homepage del corso
* Lo strumento appare nella collezione `CTool` per il corso

## Contesto del Corso

Quando un apprendente clicca sullo strumento del tuo plugin, il codice del plugin viene eseguito nel contesto del corso. Puoi accedere a:

* Il corso corrente (tramite `api_get_course_id()` o il negozio di richieste CID)
* La sessione corrente (se applicabile)
* L'utente corrente
* Le impostazioni del plugin a livello di corso

## Esempi

Plugin per strumenti del corso integrati:

* **BigBlueButton** (`Bbb/`) — Videoconferenza all'interno dei corsi
* **Zoom** (`Zoom/`) — Riunioni Zoom all'interno dei corsi
* **OnlyOffice** (`Onlyoffice/`) — Modifica di documenti all'interno dei corsi