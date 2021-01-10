# Erweitern des Icons Sets

Seit Version 1.9 enthält Chamilo eine wenig bekannte Funktion, mit der benutzerdefinierte Symbole, die in Ihrem CSS-Thema platziert sind, die vordefinierten Symbole von Chamilo ersetzen können.

Dies funktioniert jedoch nur für Icons, die normalerweise aus dem main/img/icons/ -Verzeichnis geladen werden. Nicht die, die an der Wurzel von main/img/. stehen

Um Icons zu ersetzen, müssen Sie in Ihrem eigenen CSS-Theme-Ordner \(zum Beispiel app/Resources/public/css/themes/chamili/\) einen Unterordner namens “icons/” erstellen, in dem die Struktur des normalen _main/img/icons/_ Ordners wiedergegeben wird.

Wenn Sie beispielsweise das Symbol edit\_profile.png im linken Menü ersetzen möchten, das sich normalerweise in

* main/img/icons/22/edit\_profile.png

du müsst schaffen

* app/Resources/public/css/themes/chamili/icons/22/edit\_profile.png

![](../../.gitbook/assets/image11%20%289%29.png)

![](../../.gitbook/assets/image12%20%289%29.png)

Dies ist ein kurzes Beispiel dafür, welche Art von Stiländerung Sie einfach durch Erstellen eines neuen Ordners in Ihrem CSS generieren könnten.

Denken Sie daran, dass die neuen Symbole die gleiche Größe haben sollten wie die vorherigen. Dies wurde im obigen Beispiel nicht durchgeführt, weshalb die Inbox- und Compose-Icons auf der rechten Seite etwas getrimmt sind. Alternativ können Sie das Stylesheet auch aktualisieren, um sicherzustellen, dass das Trimmen nicht stattfindet, dies wird jedoch wahrscheinlich viel Zeit in Anspruch nehmen.

Denken Sie daran, dass Sie bei “flush” entweder einen neuen CSS-Ordner im ZIP-Format über das Admin-Panel hochladen oder direkt auf den Server hochladen müssen \(in app/Resources/public/css/themes/\[style\]/\). Wenn Sie jedoch Letzteres tun, müssen Sie die "Cache cleanup" -Option auf der Admin-Seite verwenden, andernfalls bleibt Ihr Stil in app/ und wird nicht nach web/css/ in “published” gesetzt, wie es benötigt wird.

Die tatsächliche Verwendung dieser Funktion besteht darin, zu vermeiden, dass Sie den main/img/ -Ordner in irgendeiner Weise ändern müssen, wenn Sie bedenken, dass dies mit jeder neuen Version der Software überschrieben wird.

Die Verwendung eines eigenen CSS-Ordners gewährleistet die Unabhängigkeit des wichtigsten Chamilo-Codes.

