# Aktivitetsrevision

Rapporten Aktivitetsrevision giver dig mulighed for at gennemse vigtige administrative og platformaktiviteter, filtreret efter hændelsestype. Det er den samme underliggende rapport, som tidligere kunne nås fra **Tracking > Administrative activity auditing**; den er nu også knyttet direkte fra blokken Sikkerhed, da den primært er et værktøj til sikkerhed og ansvarlighed.

## Adgang til Aktivitetsrevision

Fra administrationspanelet skal du klikke på **Security > Activities audit**.

## Hvad den viser

![Siden Aktivitetsrevision, der viser kategorier af hændelsestyper som Course, Session, User, Social, Message, Resource, Wiki og Other, som hver kan udvides til individuelle hændelsestyper](/.gitbook/assets/admin-security-activities-audit.png)

Hændelser er grupperet i kategorier:

* **Course** — Oprettelse, sletning og indstillingsændringer for kurser
* **Session** — Oprettelse, sletning og tilmeldingsændringer for sessioner og sessionskategorier
* **User** — Oprettelse og sletning af konti, adgangskodeopdateringer, feltændringer og mere
* **Social** — Oprettelse, sletning og medlemskabsændringer for sociale grupper
* **Message** — Ændringer og sletninger af beskeddata
* **Resource** — Oprettelse og sletning af ressourcer og ressource-links
* **Wiki** — Visninger af wikisider
* **Other** — Alt andet, herunder plugin-aktivitet, låsning af karakterbog, sletning af øvelsesforsøg, tvungne login-forsøg og ændringer af platformindstillinger

Klik på en chip for en hændelsestype (for eksempel **Attempted Forced Login**) for at filtrere rapporten ned til en tabel med matchende poster. Du kan også søge direkte efter nøgleord ved hjælp af feltet **Search** over listen over hændelsestyper.

## Anvendelsestilfælde

* Undersøg, hvem der slettede et kursus, en session eller en brugerkonto, og hvornår
* Bekræft, om en specifik administrativ ændring (en indstillingsopdatering, en plugin-installation) blev foretaget af en forventet administrator
* Følg op på hændelser af typen **Attempted Forced Login** sammen med rapporten [Login Attempts](login-attempts.md)