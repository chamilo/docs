
# Chamilo Rapid

Die Umwandlung von PowerPoint® - oder Impress® -Präsentationen in Lernpfade ist relativ komplex, um richtig zu installieren. Es gibt nur eine bekannte Abkürzung: Installieren Sie eine OpenOffice.org oder LibreOffice Version 3 und den Befehl _screen_.

$ sudo apt-get install libreoffice bildschirm

Dann starte die folgenden Befehle

$ Bildschirm

_$_ _sudo soffice -accept=**“ **socket, host=**127.0.0.1**, port = 2002, tcpnoDelay=1; urp;“ _ _-kopflose -nodefault_ _-nofirststartwizard_ _-nolockcheck -nologo_ _-norestore_ _&_

Strg-A + Strg-D

Jede feinere Erklärung würde größtenteils außerhalb des Kontextes dieses Leitfadens stehen, aber dieses Rezept funktioniert gut auf dem Ubuntu-Server.

**Hinweis**: Die Installation des Videokonferenzservers beinhaltet bereits die Installation des _OpenOffice.org_ Servers auf Port 8100. Wenn Sie ihn also installiert haben, benötigen Sie den obigen Befehl nicht. Konfigurieren Sie einfach Chamilo, um den Präsentationskonvertierungsserver von Port 8100 aus zu verwenden.

Einmal konfiguriert und ausgeführt, können Sie PPT aus den Lernpfad-Tools Ihrer Kurse konvertieren.

![](../../.gitbook/assets/images66%20%282%29.png)Illustration 87: Symbol für schnelle Konvertierung im Lernpfad-Tool

![](../../.gitbook/assets/images67%20%282%29.png)Illustration 88: Lernpfad Import PPT-Bildschirm

Nach dem Import auf diese Weise wird eine PowerPoint- oder Impress-Präsentation in einen vollständigen Lernpfad umgewandelt, der weiter bearbeitet und strukturiert und dann den Lernenden veröffentlicht wird.

Wenn Sie mit der Installation dieses Dienstes nicht weiterkommen, zögern Sie nicht, einen unserer offiziellen Anbieter zu bitten, Ihnen zu helfen oder Ihnen einen seiner vorkonfigurierten Server zu mieten.