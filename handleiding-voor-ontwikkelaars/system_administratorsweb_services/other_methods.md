# Andere methodes

Enkele van de andere beschikbare methoden, met een korte uitleg voor elk:

```text
function WSCreateUsers($params)
```

Maakt gebruikers in batches. Het wachtwoord wordt onversleuteld verwacht \(wat goed is op HTTPS, maar **anders niet**\).

```text
function WSCreateUser($params)
```

Creëert slechts één gebruiker.

```text
function WSCreateUsersPasswordCrypted($params)
```

Maakt gebruikers die er rekening mee houden dat hun wachtwoorden mogelijk zijn gecodeerd. Deze methode verwacht de volgende parameters:

```text
$params = array(
    'secret_key' => $finalKey,
    'users' => array(
        0 => array(
            'firstname' => '…',
            'lastname' => '…',
            'status' => 5,
            'email' => '',
            'loginname' => '',
            'password' => '',
            'encrypt_method' => '',
            'language' => '',
            'phone' => '',
            'expiration_date' => '',
            'official_code' => '',
            'original_user_id_name' => '',
            'original_user_id_value'=> '',
            'extra' => ''
        )
    )
);

function WSCreateUserPasswordCrypted($params)
```

Maakt slechts één gebruiker aan, rekening houdend met het mogelijk versleutelde wachtwoord

```text
function WSEditUserCredentials($params)
```

Bewerkt de inloggegevens van een gebruiker \(gebruikersnaam + wachtwoord\)

```text
function WSEditUsers($params)
```

Bewerk meerdere gebruikers in batch.

```text
function WSEditUser($params)
```

Bewerk slechts één gebruiker

```text
function WSEditUsersPasswordCrypted($params)
```

Etc.
