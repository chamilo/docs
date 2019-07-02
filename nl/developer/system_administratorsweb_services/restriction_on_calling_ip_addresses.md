## Restriction on calling IP addresses

Other scripts might not follow this, but registration.soap.php allows you to define restrictions 
on the IP addresses that can call the webservices it contains.

This is made possible by the following snippet of code inside the WSHelperVerifyKey() function

```
// Check if a file that limits access from webservices exists
// and contains the restraining check 
if (is_file('webservice-auth-ip.conf.php')) {
    include 'webservice-auth-ip.conf.php';
    if ($debug) {
        error_log("webservice-auth-ip.conf.php file included");
    }

    if (!empty($ws_auth_ip)) {
        $check_ip = true;
        $ip_matches = api_check_ip_in_range($ip, $ws_auth_ip);
        if ($debug) {
            error_log("ip_matches: $ip_matches");
        }
    }
}
```    

As you'll have understood, you need to create a file called « webservice-auth-ip.conf.php » inside
 the same folder as registration.soap.php and add a list of IP addresses (or ranges) inside the
  file itself. Only those IP addresses which match the ranges will be accepted.

When using this method, the algorithm we saw earlier about building the security key will have
 to be modified, as we will not require the IP address anymore :

```
$finalKey = sha1($key) ;
```

For portals where security is very important, it is a good idea to use this method.