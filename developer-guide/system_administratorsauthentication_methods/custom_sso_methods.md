# Custom SSO methods

Whenever connecting Chamilo for Single Sign On to a third-party solution that doesn't offer compatibility with any of the supported methods, you will want to check main/auth/sso/ and "extend" \(in PHP\) the sso.class.php \(like the example for Drupal\).

These files contain explanations of what you need to add to your database to support the custom method, and how you need to call it.

If you miss inspiration for your side of the SSO \(third-party solution\), you can check the [Drupal-Chamilo project](https://www.drupal.org/project/chamilo) code here: [http://cgit.drupalcode.org/chamilo/tree/chamilo.module\#n42](http://cgit.drupalcode.org/chamilo/tree/chamilo.module#n42)

Finally, you might need to check in main/inc/local.inc.php for the "sso" term to find where it all gets managed in the Chamilo login process.

