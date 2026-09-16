# Αρχιτεκτονική Προσθέτων

## Τοποθεσία Προσθέτων

Τα πρόσθετα αποθηκεύονται στο `public/plugin/`. Κάθε πρόσθετο έχει τον δικό του κατάλογο:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Δομή Προσθέτου

Ένας τυπικός κατάλογος προσθέτου περιέχει:

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## Κλάση Προσθέτου

Κάθε πρόσθετο επεκτείνει την βασική κλάση `Plugin` (`public/main/inc/lib/plugin.class.php`) και ακολουθεί το μοτίβο singleton:

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Βασικές Ιδιότητες Κλάσης

| Ιδιότητα | Τύπος | Αποτέλεσμα |
|----------|------|--------|
| `$isCoursePlugin` | bool | Καταχωρίζει το πρόσθετο ως εργαλείο μαθήματος |
| `$isAdminPlugin` | bool | Προσθέτει σελίδα διεπαφής διαχείρισης |
| `$isMailPlugin` | bool | Ενσωματώνεται στο σύστημα αλληλογραφίας |
| `$addCourseTool` | bool | Προσθέτει εικονίδιο στην αρχική σελίδα του μαθήματος |
| `$course_settings` | array | Ορίζει πεδία διαμόρφωσης ανά μάθημα |

## Κύκλος Ζωής Προσθέτου

1. **Εγκατάσταση** — Ο διαχειριστής ενεργοποιεί το πρόσθετο, το οποίο εκτελεί το `install.php`
2. **Διαμόρφωση** — Οι ρυθμίσεις ορίζονται και διαχειρίζονται μέσω του πίνακα διαχείρισης· αποθηκεύονται στο `access_url_rel_plugin` (υποστηρίζει multi-tenant)
3. **Εκτέλεση** — Το πρόσθετο εισάγει περιεχόμενο σε περιοχές εμφάνισης ή αντιδρά σε συμβάντα της πλατφόρμας
4. **Απενεργοποίηση** — Το πρόσθετο απενεργοποιείται αλλά τα δεδομένα του διατηρούνται
5. **Απεγκατάσταση** — Εκτελεί το `uninstall.php` για εκκαθάριση δεδομένων και πινάκων

## Περιοχές Εμφάνισης

Τα πρόσθετα εισάγουν HTML σε 18 προκαθορισμένες περιοχές του frontend Vue υπερκαλύπτοντας τη `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Διαθέσιμες περιοχές: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Ενσωμάτωση Symfony

### Event Subscribers

Αρχεία που τελειώνουν σε `EventSubscriber.php` και βρίσκονται μέσα στο `src/EventSubscriber/` καταχωρίζονται αυτόματα μέσω του `PluginEventSubscriberPass`. Υλοποιούν το `EventSubscriberInterface` και αντιδρούν σε συμβάντα που ορίζονται στο `src/CoreBundle/Event/Events.php`.

Επειδή η κλάση του προσθέτου (`MyPluginPlugin`) δεν είναι υπηρεσία Symfony, δεν μπορεί να γίνει autowire στον κατασκευαστή του subscriber. Χρησιμοποιήστε αντ’ αυτού το singleton `create()`:

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Οντότητες Doctrine

Οι οντότητες Doctrine που τοποθετούνται στο `src/Entity/` ανακαλύπτονται αυτόματα από το `PluginEntityPass`. Χρησιμοποιήστε attributes της PHP 8 για τη χαρτογράφηση. Ο χώρος ονομάτων πρέπει να ακολουθεί το `Chamilo\PluginBundle\{PluginName}`. Χρησιμοποιήστε μοναδικά προθέματα ονομάτων πινάκων (π.χ. `my_plugin_*`) για αποφυγή συγκρούσεων.

### Υπηρεσία PluginHelper

Για πρόσβαση στην κατάσταση προσθέτων από βασικές υπηρεσίες Symfony, κάντε inject το `PluginHelper` αντί να δημιουργείτε απευθείας στιγμιότυπο της κλάσης του προσθέτου:

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

Διαθέσιμες μέθοδοι:

| Μέθοδος | Σκοπός |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Έλεγχος αν ένα πρόσθετο είναι εγκατεστημένο και ενεργό για το τρέχον URL πρόσβασης |
| `loadLegacyPlugin(string $name): ?object` | Δημιουργία στιγμιοτύπου και επιστροφή του singleton του προσθέτου |
| `getPluginSetting(string $name, string $key): mixed` | Ανάγνωση μιας μεμονωμένης τιμής ρύθμισης προσθέτου |
| `getPluginOverrides(string $name): array` | Λήψη των υπερκαλύψεων `plugin.yaml` (προεπιλογές + ειδικές ανά URL πρόσβασης) για ένα πρόσθετο |

## Αναφορές βασικών αρχείων

| Αρχείο | Σκοπός |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Βασική κλάση προσθέτου |
| `public/main/inc/lib/plugin.lib.php` | Διαχειριστής προσθέτων |
| `src/CoreBundle/Entity/Plugin.php` | Οντότητα Doctrine του προσθέτου |
| `src/CoreBundle/Helpers/PluginHelper.php` | Υπηρεσία PluginHelper |
| `src/CoreBundle/Event/Events.php` | Σταθερές συμβάντων |
| `public/plugin/HelloWorld/` | Ελάχιστο παράδειγμα προσθέτου |
| `public/plugin/TopLinks/` | Απλό παράδειγμα προσθέτου |