# Kundenspezifische SSO-Methoden

Wenn Sie Chamilo für Single Sign On mit einer Drittanbieterlösung verbinden, die keine Kompatibilität mit einer der unterstützten Methoden bietet, sollten Sie main/auth/sso/ und "extend" \(in PHP\) die sso.class.php \(wie das Beispiel für Drupal\) überprüfen.

Diese Dateien enthalten Erklärungen, was Sie Ihrer Datenbank hinzufügen müssen, um die benutzerdefinierte Methode zu unterstützen, und wie Sie sie aufrufen müssen.

Wenn Sie die Inspiration für Ihre Seite des SSO verpassen \(Drittanbieterlösung\), können Sie den [Drupal-Chamilo project](https://www.drupal.org/project/chamilo) -Code hier überprüfen: [http://cgit.drupalcode.org/chamilo/tree/chamilo.module\#n42](http://cgit.drupalcode.org/chamilo/tree/chamilo.module#n42)

Schließlich müssen Sie möglicherweise main/inc/local.inc.php für den "sso" Begriff einchecken, um herauszufinden, wo alles im Chamilo-Anmeldeprozess verwaltet wird.

