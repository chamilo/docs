# Generierung von Pass

Der Mechanismus zum Generieren von Passwörtern in Chamilo ist insbesondere bei der bcrypt-Methode etwas komplex, da er vollständig von den anderen Methoden abweicht.

Für alle ersten Optionen: „none“, „md5“ und „sha1“ \(alle werden jetzt als unsichere Methoden angesehen\) war das Verfahren anfangs relativ einfach: Wir erhalten das einfache Passwort, wir transformieren es mit dem angegebenen Algorithmus und... fertig.

Aber zu der Zeit, als wir überlegten, eine zusätzliche Sicherheitsebene mit bcrypt-Passwörtern hinzuzufügen, haben wir uns entschlossen, dies über ein Symfony-Bundle namens Sonata zu tun \(was bei CMS-Funktionen hilft\), und so wurde die Passwortgenerierung an dieses Bündel delegiert.

Dies kann \(in `Chamilo 1.11`\) in `vendor/sonata-project/user-bundle/Model/UserManager.php` gefunden werden, in der `updatePassword()`-Methode, die den Encoder \(bcrypt in diesem Fall\) überprüft und seine Klasse in `vendor/symfony/security/Core/Encoder/BCryptPasswordEncoder.php` aufruft

Dies führt zu so etwas \(könnte sich mit der Zeit und der Implementierung des Sicherheitspakets ändern\):

```php
public function encodePassword($raw, $salt)
{
    if ($this->isPasswordTooLong($raw)) {
        throw new BadCredentialsException('Invalid password.');
    }

    $options = array('cost' => $this->cost);

    if ($salt) {
        @trigger_error('Passing a $salt to '.__METHOD__.'() is deprecated since Symfony 2.8 and will be ignored in 3.0.', E_USER_DEPRECATED);

        $options['salt'] = $salt;
    }

    return password_hash($raw, PASSWORD_BCRYPT, $options);
}
```

Wie Sie sehen, besteht der Endprozess einfach darin, die Funktion `password_hash()` zu verwenden, jedoch mit dem Passwort und einer Reihe von Optionen. Diese Optionen sind im Grunde ein "cost" -Parameter, der die Häufigkeit angibt, mit der wir das Kennwort mit "super-encrypt" erreichen möchten.

Diese Nummer muss auf den Konstruktor der `src/Chamilo/UserBundle/Security/Encoder.php`-Klasse zurückgeführt werden:

```php
public function__construct ($method) {

    $this->method = $method;

    switch ($this->method) {
        case 'none':
            $defaultEncoder = new PlaintextPasswordEncoder();
            break;

        case 'bcrypt':
            $defaultEncoder = new BCryptPasswordEncoder(4);
            break;

        case 'sha1':
        case 'md5':
            $defaultEncoder = new MessageDigestPasswordEncoder($this->method, false, 1);
            break;
    }

    $this->defaultRecoder = $defaultRecoder;}
```

Jetzt wissen wir, dass wir zur Erstellung des Passworts einfach die Anzahl der Male benötigen
um es durch `password_hash()` und das Salz zu geben, das einfach ein `sha1` ist `sha1(unique_id(true, true))..`

Um also die Generierung des Passworts „Tomate“ zu „fälschen“, müssten wir folgendes anrufen:

```php
$salt = sha1(unique_id(true, true)); password_hash('tomato', PASSWORD_BCRYPT, ['cost' => 4, 'salt' => $salt]);
```

Wenn Sie also das Kennwort eines Benutzers bearbeiten, müssen Sie auch seine "salt"-Spalte in das neu generierte Salz bearbeiten.

Wie Sie sehen, verwenden andere Verschlüsselungsmethoden andere Pfade im Encoder-Konstruktor.