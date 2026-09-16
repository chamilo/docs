# Benutzer einschreiben

Bevor Sie einen Lernenden bewerten können, muss dieser in Ihren Kurs eingeschrieben sein. Chamilo bietet vier Wege, jemanden aufzunehmen, abhängig davon, wer die Einschreibung vornimmt und ob die Person bereits ein Plattformkonto besitzt.

| Methode | Wer führt sie aus | Bestehendes Konto erforderlich? |
|--------|-------------|------------------------------|
| [Einschreibung durch den Administrator](#administrator-enrollment) | Plattformadministrator | Ja |
| [Selbsteinschreibung über den Kurskatalog](#self-enrollment-via-the-course-catalog) | Der Lernende selbst | Ja |
| [Manuelle Einschreibung über das Werkzeug Benutzer](#manual-enrollment-via-the-users-tool) | Lehrende (oder Kursadministrator) | Ja |
| [Benutzer per E-Mail einladen](#inviting-users-by-email) | Lehrende (oder Kursadministrator) | **Nein** |

## Einschreibung durch den Administrator

Ein Plattformadministrator kann jeden bestehenden Benutzer direkt aus dem Administrationsbereich in jeden Kurs einschreiben — nützlich für die Masseneinschreibung (z. B. Import einer Klassenliste) oder wenn eine Lehrperson nicht die Rechte hat, die Einschreibung selbst zu verwalten. Siehe den Abschnitt [Kurse](../../admin-guide/courses/README.md) im Administrationshandbuch.

## Selbsteinschreibung über den Kurskatalog

Wenn die [Sichtbarkeit](../creating-your-course/course-settings.md#course-visibility) Ihres Kurses es zulässt, können sich Lernende mit einem Plattformkonto selbst einschreiben, indem sie Ihren Kurs unter **Weitere Kurse entdecken** finden und beitreten — von Ihrer Seite ist keine Aktion erforderlich. Ob dies verfügbar ist und ob ein Passwort erforderlich ist, wird über die **Einschreibungseinstellungen** in den [Kurseinstellungen](../creating-your-course/course-settings.md#enrollment-settings) gesteuert.

## Manuelle Einschreibung über das Werkzeug Benutzer

Um jemanden einzuschreiben, der bereits ein Plattformkonto hat, aber nicht selbst beigetreten ist, öffnen Sie das Werkzeug **Benutzer** Ihres Kurses und klicken Sie auf das Symbol **Benutzer hinzufügen** <img src="/.gitbook/assets/icons/mdi-account-plus.svg" alt="Benutzer hinzufügen" data-size="line">.

1. Suchen Sie die Person nach Name, Benutzername, E-Mail oder offiziellem Code
2. Klicken Sie in ihrer Zeile auf **Einschreiben**, oder wählen Sie mehrere mit den Kontrollkästchen aus und nutzen Sie das Menü **Aktion**, um alle auf einmal einzuschreiben

![Suchergebnisse im Bildschirm Benutzer in den Kurs einschreiben, mit einem passenden Lernenden und einer Schaltfläche Einschreiben](/.gitbook/assets/course-users-subscribe-search.png)

In den Ergebnissen erscheinen nur Benutzer, die noch nicht in den Kurs eingeschrieben sind.

> Dieses Symbol steht Lehrenden standardmäßig zur Verfügung. Ein Plattformadministrator kann es über die Einstellung **Einschreibung von Benutzern in Kurse durch Kursadministrator zulassen** (`allow_user_course_subscription_by_course_admin`) auf Administratoren beschränken — wenn Sie das Symbol **Benutzer hinzufügen** nicht sehen, wenden Sie sich an Ihren Administrator.

## Benutzer per E-Mail einladen

Die drei oben genannten Methoden setzen voraus, dass die Person bereits ein Plattformkonto hat. **Kurseinladungen** decken den Fall ab, dass sie keines hat: Sie senden eine Einladung an eine E-Mail-Adresse, und Chamilo schickt dieser Person einen einmaligen Link. Beim Öffnen des Links können sie ein Konto anlegen, und sobald die Registrierung abgeschlossen ist, sind sie automatisch in Ihren Kurs eingeschrieben — ein gesonderter Einschreibungsschritt entfällt.

### Zugriff auf das Werkzeug

Öffnen Sie das Werkzeug **Benutzer** Ihres Kurses und klicken Sie in der Symbolleiste neben **Benutzer hinzufügen** auf das Symbol **Per E-Mail einladen** <img src="/.gitbook/assets/icons/mdi-email-outline.svg" alt="Per E-Mail einladen" data-size="line">:

![Die Symbolleiste des Werkzeugs Benutzer mit dem Symbol Benutzer hinzufügen und dem Symbol Per E-Mail einladen](/.gitbook/assets/course-users-invite-icon.png)

Dadurch öffnet sich die Seite **Kurseinladungen**.

### Wer Einladungen senden kann

* Plattformadministratoren, immer.
* In einem einfachen Kurs (nicht in einer Session geöffnet): Lehrende und andere Benutzer mit Bearbeitungsrechten am Kurs.
* In einer Session: der allgemeine Coach der Session oder ein Session-Administrator — nicht der weitere Kreis der Kurs-Coaches, da das Senden einer Einladung hier in die *gesamte Session* einschreibt, nicht nur in diesen einen Kurs.

### Eine Einladung senden

1. Geben Sie die E-Mail-Adresse des Empfängers im Formular **Per E-Mail einladen** ein
2. Klicken Sie auf **Einladung senden**

![Die Seite Kurs-Einladungen: das Formular „Per E-Mail einladen“ und eine Tabelle der gesendeten Einladungen mit ihrem Status](/.gitbook/assets/course-invitations-list.png)

Jede Einladung, die Sie für diesen Kurs gesendet haben, erscheint unter dem Formular mit ihrem Status:

| Status | Bedeutung |
|--------|---------|
| **Pending** | Gesendet, noch nicht verwendet. Noch innerhalb der Gültigkeitsdauer. |
| **Accepted** | Der Empfänger hat sich registriert und wurde eingeschrieben. |
| **Revoked** | Sie haben sie storniert, bevor sie verwendet wurde. |

Für eine noch ausstehende Einladung bietet die Spalte **Aktionen**:

* **Kopieren** <img src="/.gitbook/assets/icons/mdi-content-copy.svg" alt="Kopieren" data-size="line"> — kopiert den Einladungslink, falls Sie ihn lieber selbst weitergeben möchten (Chat, persönlich), statt sich auf die E-Mail zu verlassen.
* **Widerrufen** <img src="/.gitbook/assets/icons/mdi-account-cancel.svg" alt="Widerrufen" data-size="line"> — storniert die Einladung sofort; der Link funktioniert nicht mehr. Eine bereits angenommene Einladung kann nicht widerrufen werden.

> **Die eingeladene E-Mail-Adresse darf auf dieser Plattform noch kein Konto haben.** Falls doch, schlägt das Senden der Einladung fehl mit einer Meldung, die Sie auffordert, diesen bestehenden Benutzer stattdessen direkt einzuschreiben — über [Manuelle Einschreibung über das Werkzeug Benutzer](#manual-enrollment-via-the-users-tool) oben.

### Einladungen in einer Session

Wenn Sie das Werkzeug Benutzer aus einem Kurs öffnen, der innerhalb einer Session läuft, zeigt die Seite einen Hinweis, dass die Einladung für die gesamte Session gilt, nicht nur für diesen Kurs:

> *Dieser Kurs ist in einer Session geöffnet. Das Senden einer Einladung hier schreibt den Empfänger in die gesamte Session ein, nicht nur in diesen Kurs.*

Das entspricht der Einschreibung an anderen Stellen in Chamilo: Sie schreiben jemanden in eine Session als Ganzes oder in einen eigenständigen Kurs ein, aber nie in „diesen einen Kurs innerhalb dieser Session“ als separate Aktion.

### Was die eingeladene Person sieht

Die E-Mail enthält einen Link zur Registrierungsseite. Beim Öffnen:

* Wird das E-Mail-Feld vorausgefüllt und gesperrt auf die Adresse, die Sie eingeladen haben — sie können sich mit diesem Link nicht unter einer anderen Adresse registrieren.
* Können sie die Registrierung **abschließen, auch wenn die Selbstregistrierung plattformweit derzeit deaktiviert ist** — sofern Ihr Administrator die Einstellung **Registrierung über Kurs-Einladungslinks zulassen** aktiviert hat (siehe unten). Ohne diese Einstellung hilft ein Einladungslink nur, wenn die Selbstregistrierung anderweitig geöffnet ist.
* Werden sie nach dem Absenden des Formulars sofort in Ihren Kurs (oder die Session) eingeschrieben und angemeldet.

Der Link ist einmalig verwendbar und läuft nach 7 Tagen ab. Wenn er abläuft oder die zugehörige Einladung widerrufen wird, verhält sich das Öffnen so, als hätte der Link nie existiert.

> Die plattformweite Einstellung **Registrierung über Kurs-Einladungslinks zulassen** (`registration.allow_invitation_registration`) steuert, ob Ihr Einladungslink die Registrierung öffnen kann, wenn die allgemeine Selbstregistrierung ausgeschaltet ist. Fragen Sie Ihren Administrator, wenn Einladungen auf einer ansonsten geschlossenen Plattform nicht zu funktionieren scheinen.

## Tipps

* **Passen Sie die Methode an die Situation an** — Administrator oder Selbst-Einschreibung für Personen, die die Plattform bereits nutzen, manuelle Einschreibung für einen bekannten bestehenden Benutzer, Einladungen für externe Gäste, Gutachter oder alle, die noch kein Konto haben.
* **Widerrufen Sie Einladungen, die Sie nicht mehr benötigen** — eine alte ausstehende Einladung ist weiterhin ein gültiger, ungenutzter Link; widerrufen Sie sie, wenn der vorgesehene Empfänger keinen Zugang mehr braucht oder wenn Sie unsicher sind, ob sie ihn erreicht hat.
* **Klären Sie mit Ihrem Administrator, wenn eine Methode nicht verfügbar scheint** — mehrere dieser Abläufe (manuelle Einschreibung, Einladungen, Selbst-Einschreibung) können plattformweit eingeschränkt oder deaktiviert sein.