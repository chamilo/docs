# Δημιουργία ενός Plugin

Αυτός ο οδηγός περιγράφει τη δημιουργία ενός βασικού plugin του Chamilo. Για περισσότερες λεπτομέρειες, δείτε τη [σελίδα wiki ανάπτυξης Plugin](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Βήμα 1: Δημιουργία του καταλόγου του Plugin

Δημιουργήστε έναν κατάλογο στο `public/plugin/`. Το όνομα του καταλόγου πρέπει να αντιστοιχεί στο αναγνωριστικό του plugin σας:

```
public/plugin/MyPlugin/
```

## Βήμα 2: Ορισμός της κλάσης του Plugin

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

### Διαθέσιμοι τύποι ρυθμίσεων

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

## Βήμα 3: Δημιουργία του plugin.php

Το `plugin.php` στη ρίζα του plugin είναι **υποχρεωτικό**. Πρέπει να αναθέτει την `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Βήμα 4: Δημιουργία σεναρίων εγκατάστασης και απεγκατάστασης

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

Υλοποιήστε την πραγματική δημιουργία/διαγραφή σχήματος μέσα στην κλάση χρησιμοποιώντας το `SchemaTool` του Doctrine.

## Βήμα 5: Προσθήκη μεταφράσεων

Δημιουργήστε αρχεία γλώσσας στο `lang/` χρησιμοποιώντας κωδικούς τοπικών ρυθμίσεων (π.χ. `en_US.php`, `fr_FR.php`, `es.php`). Η εναλλακτική είναι το `en_US.php`.

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

## Βήμα 6: Έγχυση περιεχομένου μέσω περιοχών εμφάνισης

Τα plugin μπορούν να εγχύσουν HTML σε 18 προκαθορισμένες περιοχές της διεπαφής. Ο μηχανισμός που αποδίδει μια περιοχή εξαρτάται από το ποια είναι:

* Η **`course_tool_plugin`** είναι η μόνη περιοχή που αποδίδεται με υπερκάλυψη της `renderRegion(string $region): string` στην κλάση του plugin σας. Καλείται (μέσω του `PluginRegionController`) μόνο για plugin με εμβέλεια μαθήματος (`is_course_plugin`) ενώ είναι ανοιχτή μια σελίδα μαθήματος:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **Οι 16 γενικές περιοχές** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — αποδίδονται με συμπερίληψη του δικού του `index.php` του plugin, όχι μέσω `renderRegion()`. Το πλαίσιο ορίζει την `$plugin_info['current_region']` πριν συμπεριλάβει αυτό το αρχείο, ώστε να μπορεί είτε να κάνει `echo` HTML απευθείας για εκείνη την περιοχή είτε να δηλώσει πρότυπα Twig προς απόδοση μέσω `$plugin_info['templates']`:

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  Το `public/plugin/HelloWorld/index.php` είναι ένα πλήρες λειτουργικό παράδειγμα — το HelloWorld δεν υπερκάλυπτει καθόλου την `renderRegion()`· κάθε περιοχή που γεμίζει περνάει από το `index.php`.

* Η **`menu_administrator`** είναι ειδική περίπτωση που προορίζεται για συνδέσμους μόνο για διαχειριστές που εμφανίζονται στον παλαιού τύπου πίνακα διαχείρισης, όχι στους δύο παραπάνω μηχανισμούς. Τα `Dashboard` και `CleanDeletedFiles` είναι πραγματικά plugin που τη χρησιμοποιούν.

Όποιον μηχανισμό και αν χρησιμοποιήσετε, ένας διαχειριστής πρέπει ακόμη να ενεργοποιήσει την/τις περιοχή(-ές) για το plugin σας από το κουμπί **Regions** δίπλα του στη σελίδα **Manage plugins** (δείτε [Βήμα 9](#step-9-activate)) — ένα plugin δεν αποδίδει τίποτα σε περιοχή που δεν έχει ενεργοποιηθεί ρητά εκεί.

## Βήμα 7: Αντίδραση σε συμβάντα της πλατφόρμας (προαιρετικό)

Τα πρόσθετα μπορούν να αντιδρούν σε συμβάντα της πλατφόρμας χρησιμοποιώντας συνδρομητές συμβάντων του Symfony. Δημιουργήστε ένα αρχείο που τελειώνει σε `EventSubscriber.php` μέσα στο `src/EventSubscriber/` — καταχωρίζεται αυτόματα μέσω του `PluginEventSubscriberPass`.

Δύο απαιτήσεις, διαφορετικά ο συνδρομητής παραλείπεται σιωπηλά: η κλάση πρέπει να βρίσκεται στον **καθολικό χώρο ονομάτων** (το pass την επιλύει από το όνομα αρχείου) και πρέπει να εκτελέσετε `composer dump-autoload` μετά την προσθήκη της (`public/plugin` είναι καταχώριση classmap). Ελέγξτε το αποτέλεσμα με `php bin/console debug:event-dispatcher <event.name>`.

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

Δείτε το `src/CoreBundle/Event/Events.php` για την πλήρη λίστα διαθέσιμων συμβάντων (χρήστης, μάθημα, συνεδρία, LP, άσκηση, χαρτοφυλάκιο, αυθεντικοποίηση και άλλα).

### Εκκαθάριση όταν διαγράφεται μάθημα, συνεδρία ή χρήστης

Αν το πρόσθετό σας αποθηκεύει γραμμές με κλειδί μάθημα, συνεδρία ή χρήστη, εγγραφείτε στα `Events::COURSE_DELETED`, `Events::SESSION_DELETED` ή `Events::USER_DELETED`. Αυτοί είναι ο μόνος τρόπος εκκαθάρισης — οι παλιές μέθοδοι `doWhenDeleting*` δεν υπάρχουν πλέον. Ισχύουν τρεις κανόνες για αυτούς τους ακροατές:

* **Ενεργήστε στο `AbstractEvent::TYPE_PRE`** — το συμβάν πυροδοτείται πριν αφαιρεθεί η γραμμή, τη μοναδική στιγμή που το ξένο κλειδί σας εξακολουθεί να επιλύεται και τα δεδομένα είναι ακόμη αναγνώσιμα. Το `USER_DELETED` πυροδοτείται επίσης ως `TYPE_POST`, επομένως ο έλεγχος δεν είναι προαιρετικός εκεί.
* **Φυλάξτε με βάση την εγκατάσταση, όχι την ενεργοποίηση** — χρησιμοποιήστε `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Οι γραμμές σας επιβιώνουν όταν το πρόσθετο απενεργοποιείται ή όταν είναι ενεργοποιημένο μόνο σε άλλο URL πρόσβασης, και το ξένο κλειδί τους εμποδίζει τη διαγραφή και στις δύο περιπτώσεις.
* **Στο `USER_DELETED`, ελέγξτε `$event->isHardDelete()`** — μια μαλακή διαγραφή διατηρεί τον χρήστη ανακτήσιμο, επομένως τα δεδομένα του πρέπει να επιβιώσουν.

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

Το πρόσθετο `StudentFollowUp` αποτελεί την αναφορά για χρήστες· τα `Bbb`, `BuyCourses` και `EmbedRegistry` φέρουν τα αντίστοιχα για μάθημα και συνεδρία.

## Βήμα 8: Άγκιστρα κύκλου ζωής

Παρακάμψτε αυτές τις μεθόδους στην κλάση του προσθέτου σας για να ανταποκρίνεστε σε ενέργειες της πλατφόρμας:

| Μέθοδος | Πυροδοτείται όταν |
|--------|----------------|
| `install()` | Το πρόσθετο ενεργοποιείται |
| `uninstall()` | Το πρόσθετο αφαιρείται |
| `performActionsAfterConfigure()` | Ο διαχειριστής αποθηκεύει τη φόρμα ρυθμίσεων |
| `course_settings_updated(array $values)` | Αλλάζουν οι ρυθμίσεις επιπέδου μαθήματος |
| `validateCourseSetting(string $variable)` | Αποθηκεύεται ρύθμιση μαθήματος (επιστρέψτε `false` για απόρριψη) |

Οι `doWhenDeletingUser()`, `doWhenDeletingCourse()` και `doWhenDeletingSession()` αφαιρέθηκαν, μαζί με το έναυσμα `AppPlugin::performActionsWhenDeletingItem()` που τις καλούσε — η παράκαμψή τους πλέον δεν κάνει τίποτα. Χρησιμοποιήστε τα συμβάντα διαγραφής από το [Βήμα 7](#cleaning-up-when-a-course-session-or-user-is-deleted) αντί αυτών.

## Βήμα 9: Ενεργοποίηση

Συνδεθείτε ως διαχειριστής και μεταβείτε στο μπλοκ **Πλατφόρμα** του πίνακα διαχείρισης, έπειτα **Πρόσθετα** — ανοίγει η σελίδα **Διαχείριση προσθέτων**. Βρείτε το πρόσθετό σας και κάντε κλικ στο **Εγκατάσταση**· μόλις εγκατασταθεί, κάντε κλικ στο **Ενεργοποίηση** για να το ενεργοποιήσετε (ένα ενεργοποιημένο πρόσθετο εμφανίζει κουμπί **Απενεργοποίηση** αντί αυτού).

## Συμβουλές

* **Ακολουθήστε υπάρχοντα πρόσθετα ως παραδείγματα** — τα `public/plugin/HelloWorld/` και `public/plugin/TopLinks/` είναι καλά απλά σημεία αναφοράς
* **Χρησιμοποιήστε μεταφράσεις** — Χρησιμοποιείτε πάντα το σύστημα `lang/` για κείμενο προς τον χρήστη
* **Εκκαθαρίστε κατά την απεγκατάσταση** — Αφαιρέστε πίνακες βάσης δεδομένων και ρυθμίσεις στο σενάριο απεγκατάστασης
* **Ελέγξτε την κατάσταση ενεργοποίησης** — Στους συνδρομητές συμβάντων, καλέστε `$this->plugin->isEnabled()` πριν εκτελέσετε λογική. Εξαίρεση είναι η εκκαθάριση κατά τη διαγραφή: φυλάξτε με βάση την εγκατάσταση, καθώς οι γραμμές επιβιώνουν της απενεργοποίησης του προσθέτου