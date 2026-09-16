# Wachtwoorden genereren

Het mechanisme om wachtwoorden te genereren in Chamilo is een beetje ingewikkeld, vooral met de bcrypt-methode, omdat deze volledig afwijkt van de andere methoden.

Voor alle eerste opties: 'none', 'md5' en 'sha1' (nu allemaal beschouwd als onveilige methoden), was de procedure aanvankelijk relatief eenvoudig: we krijgen het gewone wachtwoord, we transformeren het met behulp van het gegeven algoritme en... gedaan.

Maar toen we overwogen om een extra beveiligingslaag toe te voegen met bcrypt-wachtwoorden, hebben we besloten dit te doen via een Symfony-bundel genaamd Sonata (die helpt bij CMS-achtige functies) en dus werd het genereren van wachtwoorden aan die bundel gedelegeerd.

Dit is (in Chamilo 1.11) te vinden in vendor/sonata-project/user-bundle/Model/UserManager.php, in de updatePassword() methode, die de encoder (in dit geval bcrypt) controleert en roept zijn klasse aan in vendor/symfony/security/Core/Encoder/BCryptPasswordEncoder.php

Dit vertaalt zich in zoiets als dit (kan veranderen met de tijd en de implementatie van de beveiligingsbundel):

```text
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

Zoals je kunt zien, is het eindproces gewoon het gebruik van de password_hash() functie, maar met het wachtwoord en een reeks opties. Deze opties zijn in feite een "kosten" -parameter, die het aantal keren aangeeft dat we het wachtwoord willen "super-versleutelen".

Dit nummer moet worden teruggevoerd naar de constructor van de src/Chamilo/UserBundle/Security/Encoder.php class: ``` public function __construct($method) { $this->method = $method; switch ($this->method) { case 'none': $defaultEncoder = new PlaintextPasswordEncoder(); break; case 'bcrypt': $defaultEncoder = new BCryptPasswordEncoder(4); break; case 'sha1': case 'md5': $defaultEncoder = new MessageDigestPasswordEncoder($this->method, false, 1); break; } $this->defaultEncoder = $defaultEncoder; }

```text
Dus nu weten we dat we, om het wachtwoord te genereren, gewoon het aantal keren nodig hebben om het door password_hash(), en de salt, die gewoon een sha1(unique_id(true, true)) is, door te geven.

Dus om de generatie van het wachtwoord "tomaat" te "vervalsen", hoeven we alleen maar te bellen:
```

$salt = sha1(unique_id(true, true)); password_hash('tomato', PASSWORD_BCRYPT, ['cost' => 4, 'salt' => $salt]);

Dus wanneer u het wachtwoord van een gebruiker bewerkt, moet u ook de "salt"-kolom aanpassen aan de nieuw gegenereerde salt.

Zoals u kunt zien, gebruiken andere versleutelingsmethoden andere paden in de Encoder-constructor.
