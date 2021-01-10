# Die Lösung

Wir nennen diese Lösung _Multi-URL_. Indem Sie Multi-URL aktivieren, aktivieren Sie den folgenden Mechanismus:

* du verwendest den gleichen Quellcode \(also weniger Wartung\)
* Sie benutzen die gleiche Datenbank \(also weniger Duplizierung von Daten\)
* Ein “master” -Portal \(das nicht direkt von Ihren Kunden genutzt wird\) ermöglicht es Ihnen, “slave” Portale zu definieren
* Jeder Kurs wird in einem “slave” -Portal erstellt und ist nur in diesem Slave-Portal sichtbar
* Jeder Benutzer wird in einem “slave” -Portal erstellt, ist nur innerhalb dieses Portals sichtbar und hat nur Zugriff auf dieses Portal
* Jedes Slave-Portal verwendet einen anderen Domain-Namen \(oder eine andere Subdomäne\)
* jedes Portal kann seinen eigenen Grafikstil verwenden
* jedem Slave-Portal kann ein \(oder mehr\) Administrator zugewiesen werden. Dieser Administrator hat keinen Zugriff auf globale Einstellungen, auch nicht auf die Benutzer und Kurse anderer Portale
* Eine Sitzung kann einen globalen Kurs verwenden, aber jede Sitzung existiert nur in einem einzigen Portal

Mit der gleichen Datenbank profitieren Sie von diesen “extra features”:

* Ein Kurs kann “global” gemacht werden und über Sitzungen auf allen Slave-Portalen verwendet werden
* Ein Benutzer \(Lernender, Lehrer oder Administrator\) kann vom globalen Administrator Zugriff auf andere Portale erhalten

