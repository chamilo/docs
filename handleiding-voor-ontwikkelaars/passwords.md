# Wachtwoorden genereren

The mechanism to generate passwords in Chamilo is a bit complex, in particular with the bcrypt method, as it diverges completely from the other methods.

For all the first options: 'none', 'md5' and 'sha1' \(all now considered insecure methods\), the procedure was relatively easy initially: we get the plain password, we transform it using the given algorithm and... done.

But at the time we considered adding an extra layer of security with bcrypt passwords, we decided to do it through a Symfony bundle called Sonata \(which helps with CMS-style features\) and so the password generation was delegated to that bundle.

This can be found \(in Chamilo 1.11\) in vendor/sonata-project/user-bundle/Model/UserManager.php, in the updatePassword\(\) method, which checks the encoder \(bcrypt in this case\) and calls its class in vendor/symfony/security/Core/Encoder/BCryptPasswordEncoder.php

This translates into something like this \(might change with time and the implementation of the security bundle\):

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

As you can see, the end process is simply to use the password\_hash\(\) function, but with the password and a set of options. These options are basically a "cost" parameter, that represents the amount of times we want to "super-encrypt" the password.

This number has to be traced back to the constructor of the src/Chamilo/UserBundle/Security/Encoder.php class: \`\`\` public function \_\_construct\($method\) { $this-&gt;method = $method; switch \($this-&gt;method\) { case 'none': $defaultEncoder = new PlaintextPasswordEncoder\(\); break; case 'bcrypt': $defaultEncoder = new BCryptPasswordEncoder\(4\); break; case 'sha1': case 'md5': $defaultEncoder = new MessageDigestPasswordEncoder\($this-&gt;method, false, 1\); break; } $this-&gt;defaultEncoder = $defaultEncoder; }

```text
So now we know that, to generate the password, we simply need the number of times
to pass it through password_hash(), and the salt, which is simply a sha1(unique_id(true, true))..

So to "fake" the generation of the password "tomato", we would simply need to call:
```

$salt = sha1\(unique\_id\(true, true\)\); password\_hash\('tomato', PASSWORD\_BCRYPT, \['cost' =&gt; 4, 'salt' =&gt; $salt\]\);

\`\`\` So whenever editing a user's password, you will also need to edit its "salt" column to the newly-generated salt.

As you can see, other encryption methods use other paths in the Encoder constructor.

