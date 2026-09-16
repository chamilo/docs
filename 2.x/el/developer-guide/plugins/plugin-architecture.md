# Αρχιτεκτονική Plugin

## Τοποθεσία Plugin

Τα plugins αποθηκεύονται στο `public/plugin/`. Κάθε plugin έχει τον δικό του κατάλογο:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Δομή Plugin

Ένας τυπικός κατάλογος plugin περιέχει:

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

## Κλάση Plugin

Κάθε plugin επεκτείνει τη βασική κλάση `Plugin` (`public/main/inc/lib/plugin.class.php`) και ακολουθεί το μοτίβο singleton:

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

| Ιδιότητα | Τύπος | Επίδραση |
|----------|------|----------|
| `$isCoursePlugin` | bool | Καταχωρεί το plugin ως εργαλείο μαθήματος |
| `$isAdminPlugin` | bool | Προσθέτει σελίδα διεπαφής διαχειριστή |
| `$isMailPlugin` | bool | Ενσωματώνεται με το σύστημα αλληλογραφίας |
| `$addCourseTool` | bool | Προσθέτει εικονίδιο στην αρχική σελίδα του μαθήματος |
| `$course_settings` | array | Ορίζει πεδία διαμόρφωσης ανά μάθημα |

## Κύκλος Ζωής Plugin

1. **Εγκατάσταση** — Ο διαχειριστής ενεργοποιεί το plugin, το οποίο εκτελεί το `install.php`
2. **Διαμόρφωση** — Οι ρυθμίσεις ορίζονται και διαχειρίζονται μέσω του πίνακα διαχείρισης· αποθηκεύονται στο `access_url_rel_plugin` (υποστηρίζει multi-tenant)
3. **Εκτέλεση** — Το plugin εγχέει περιεχόμενο σε περιοχές εμφάνισης ή αντιδρά σε γεγονότα της πλατφόρμας
4. **Απενεργοποίηση** — Το plugin απενεργοποιείται αλλά τα δεδομένα του διατηρούνται
5. **Απεγκατάσταση** — Εκτελεί το `uninstall.php` για καθαρισμό δεδομένων και πινάκων

## Περιοχές Εμφάνισης

Τα plugins εγχέουν HTML σε 18 προκαθορισμένες περιοχές του frontend Vue υπερισχύοντας της `renderRegion()`:

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

Αρχεία που τελειώνουν σε `EventSubscriber.php` τοποθετημένα μέσα στο `src/EventSubscriber/` καταχωρούνται αυτόματα μέσω του `PluginEventSubscriberPass`. Υλοποιούν το `EventSubscriberInterface` και αντιδρούν σε γεγονότα που ορίζονται στο `src/CoreBundle/Event/Events.php`.

Επειδή η κλάση plugin (`MyPluginPlugin`) δεν είναι υπηρεσία Symfony, δεν μπορεί να autowired στο constructor του subscriber. Χρησιμοποιήστε το singleton `create()`:

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

### Doctrine Entities

Doctrine entities τοποθετημένα στο `src/Entity/` εντοπίζονται αυτόματα από το `PluginEntityPass`. Χρησιμοποιήστε PHP 8 attributes για το mapping. Το namespace πρέπει να ακολουθεί το `Chamilo\PluginBundle\{PluginName}`. Χρησιμοποιήστε μοναδικά πρόθεματα ονομάτων πινάκων (π.χ. `my_plugin_*`) για αποφυγή συγκρούσεων.

---
### Υπηρεσία PluginHelper

Για την πρόσβαση στην κατάσταση του plugin από βασικές υπηρεσίες Symfony, εγχύστε το `PluginHelper` αντί να δημιουργήσετε απευθείας την κλάση του plugin:

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

| Method | Purpose |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Έλεγχος αν ένα plugin είναι εγκατεστημένο και ενεργό για το τρέχον access URL |
| `loadLegacyPlugin(string $name): ?object` | Δημιουργία και επιστροφή του singleton του plugin |
| `getPluginSetting(string $name, string $key): mixed` | Ανάγνωση μιας μεμονωμένης τιμής ρύθμισης plugin |
| `getPluginOverrides(string $name): array` | Λήψη των overrides του `plugin.yaml` (προεπιλογές + ειδικά για access URL) για ένα plugin |

## Βασικές Αναφορές Αρχείων

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Βασική κλάση plugin |
| `public/main/inc/lib/plugin.lib.php` | Διαχειριστής plugin |
| `src/CoreBundle/Entity/Plugin.php` | Οντότητα Doctrine Plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Υπηρεσία PluginHelper |
| `src/CoreBundle/Event/Events.php` | Σταθερές συμβάντων |
| `public/plugin/HelloWorld/` | Ελάχιστο παράδειγμα plugin |
| `public/plugin/TopLinks/` | Απλό παράδειγμα plugin |