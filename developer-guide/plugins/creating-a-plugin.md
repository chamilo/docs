# Δημιουργία Plugin

Αυτός ο οδηγός περιγράφει βήμα-βήμα τη δημιουργία ενός βασικού plugin του Chamilo. Για επιπλέον λεπτομέρειες, δείτε τη [σελίδα wiki ανάπτυξης Plugin](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Βήμα 1: Δημιουργία Καταλόγου Plugin

Δημιουργήστε έναν κατάλογο στο `public/plugin/`. Το όνομα του καταλόγου πρέπει να ταιριάζει με τον αναγνωριστή του plugin σας:

```
public/plugin/MyPlugin/
```

## Βήμα 2: Ορισμός Κλάσης Plugin

Δημιουργήστε το `src/MyPluginPlugin.php`. Η κλάση επεκτείνει την `Plugin` και ακολουθεί το μοτίβο singleton:

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Διαθέσιμοι Τύποι Ρυθμίσεων

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

Για ρυθμίσεις `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Πρόσβαση στις ρυθμίσεις κατά την εκτέλεση:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Βήμα 3: Δημιουργία plugin.php

Το `plugin.php` στη ρίζα του plugin είναι **απαιτούμενο**. Πρέπει να εκχωρεί το `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Βήμα 4: Δημιουργία Scripts Εγκατάστασης και Απεγκατάστασης

`install.php`:

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPluginPlugin::create()->uninstall();
```

Εφαρμόστε την πραγματική δημιουργία/διαγραφή σχήματος μέσα στην κλάση χρησιμοποιώντας το `SchemaTool` του Doctrine.

## Βήμα 5: Προσθήκη Μεταφράσεων

Δημιουργήστε αρχεία γλώσσας στο `lang/` χρησιμοποιώντας κωδικούς τοπικής ρύθμισης (π.χ. `en_US.php`, `fr_FR.php`, `es_ES.php`). Το fallback είναι το `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Πρόσβαση στις μεταφράσεις μέσω `$plugin->get_lang('key')`.

## Βήμα 6: Εισαγωγή Περιεχομένου μέσω Περιοχών Εμφάνισης

Τα plugin μπορούν να εισάγουν HTML σε 18 προκαθορισμένες περιοχές του frontend Vue. Αντικαταστήστε το `renderRegion()` στην κλάση σας:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Διαθέσιμες περιοχές: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Βήμα 7: Αντίδραση σε Γεγονότα Πλατφόρμας (Προαιρετικό)

Τα plugin μπορούν να αντιδρούν σε γεγονότα πλατφόρμας χρησιμοποιώντας event subscribers του Symfony. Δημιουργήστε ένα αρχείο που τελειώνει σε `EventSubscriber.php` μέσα στο `src/EventSubscriber/` — καταχωρείται αυτόματα μέσω του `PluginEventSubscriberPass`.

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Plugin classes are not Symfony services — use the create() singleton.
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // your logic here
    }
}
```

Δείτε το `src/CoreBundle/Event/Events.php` για την πλήρη λίστα διαθέσιμων γεγονότων (χρήστης, μάθημα, συνεδρία, LP, άσκηση, portfolio, εμπειρογνωμοσύνη, και άλλα).
---

---
## Βήμα 8: Συνδέσμοι κύκλου ζωής

Προσαρμόστε αυτές τις μεθόδους στην κλάση του πρόσθετου σας για να ανταποκριθείτε σε ενέργειες της πλατφόρμας:

| Μέθοδος | Ενεργοποιείται όταν |
|--------|---------------------|
| `install()` | Το πρόσθετο ενεργοποιείται |
| `uninstall()` | Το πρόσθετο αφαιρείται |
| `performActionsAfterConfigure()` | Ο διαχειριστής αποθηκεύει τη φόρμα διαμόρφωσης |
| `course_settings_updated(array $values)` | Αλλάζουν οι ρυθμίσεις επιπέδου μαθήματος |
| `validateCourseSetting(string $variable)` | Αποθηκεύεται ρύθμιση μαθήματος (επιστρέψτε `false` για απόρριψη) |
| `doWhenDeletingUser(int $userId)` | Διαγράφεται ένας χρήστης |
| `doWhenDeletingCourse(int $courseId)` | Διαγράφεται ένα μάθημα |
| `doWhenDeletingSession(int $sessionId)` | Διαγράφεται μια συνεδρία |

## Βήμα 9: Ενεργοποίηση

Συνδεθείτε ως διαχειριστής, μεταβείτε στο **Διαχείριση πρόσθετων**, βρείτε το πρόσθετό σας και κάντε κλικ στο **Ενεργοποίηση**.

## Συμβουλές

* **Ακολουθήστε υπάρχοντα πρόσθετα ως παραδείγματα** — `public/plugin/HelloWorld/` και `public/plugin/TopLinks/` είναι καλά απλά παραδείγματα
* **Χρησιμοποιήστε μεταφράσεις** — Πάντα χρησιμοποιήστε το σύστημα `lang/` για κείμενα που βλέπουν οι χρήστες
* **Καθαρίστε κατά την απεγκατάσταση** — Αφαιρέστε πίνακες βάσης δεδομένων και ρυθμίσεις στο σενάριο απεγκατάστασης
* **Ελέγξτε την κατάσταση ενεργοποίησης** — Σε συνδρομητές συμβάντων, πάντα καλέστε `$this->plugin->isEnabled()` πριν εκτελέσετε λογική