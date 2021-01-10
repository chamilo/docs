# Plugins

![](../../.gitbook/assets/images33%20%288%29.png)

Plugins in Chamilo existieren, um es Dritten zu ermöglichen, \[relativ einfach\) neue Komponenten in Chamilo zu integrieren, und werden entweder als « staging » -Plattform angesehen, um in zukünftigen Versionen neue Funktionen in den Kern von Chamilo aufzunehmen, oder als eine « buffer », bei der wir Code residieren können, die wir nicht wirklich integrieren möchten an Chamilo \(normalerweise aus ethischen oder lizenzrechtlichen Gründen\), aber von dem wir wissen, dass es unserer Community insgesamt zugute kommen könnte.

Für Integratoren ist es eine großartige Möglichkeit, neuen Code in Chamilo einzufügen, ohne auf die nächste Hauptversion warten zu müssen, um Datenbankänderungen zu integrieren, da die Plugins ihren eigenen Installer/Deinstallationsprogramm haben können.

Plugins können in zwei Kategorien unterteilt werden: visuelle Plugins und Backend-Plugins. Back-End-Plugins wirken im Hintergrund \(du hättest es erraten\) und benötigen viel weniger Arbeit \(normalerweise\) von der Seite des visuellen Designs. Visuelle Plugins müssen sorgfältig erstellt werden, damit sie sich nahtlos in das Chamilo-Layout integrieren lassen.

Obwohl dies die Hauptabteilung ist, werden wir im folgenden Abschnitt keine Unterscheidung zwischen diesen treffen. Wenn Sie ein Backend-Plugin entwickeln, ignorieren Sie einfach den Display-Teil.

Wir werden jedoch zwischen den allgemeinen Plugins \(alle außer einem zu diesem Zeitpunkt\) und dem Dashboard-Plugin unterscheiden, da dieses letzte einen bestimmten Fall darstellt, der als Tabelleneintrag für das Hauptmenü angezeigt wird und nur Administratoren erlaubt ist.

