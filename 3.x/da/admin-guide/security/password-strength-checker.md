# Adgangskodestyrkekontrol

Adgangskodestyrkekontrollen scanner aktive brugeres gemte adgangskodehashes mod en kort liste over almindeligt anvendte adgangskoder (`123456`, `password`, `qwerty123` og lignende). Den viser eller transmitterer aldrig selve adgangskoderne — kun om en brugers aktuelle adgangskode matcher en af de kendte svage kandidater.

## Adgang til adgangskodestyrkekontrollen

Fra administrationspanelet skal du klikke på **Sikkerhed > Adgangskodestyrkekontrol**.

## Kørsel af en scanning

![Siden Adgangskodestyrkekontrol med et felt til bruger-id'er, der skal scannes, og en knap til at køre scanningen](/.gitbook/assets/admin-security-password-strength.png)

* Lad **Bruger-id'er, der skal scannes** være tomt for at scanne alle aktive brugere, eller indtast en kommasepareret liste over bruger-id'er for at kontrollere et undersæt
* Klik på **Kør scanning af adgangskodestyrke**

Scanningen kører asynkront i baggrunden, så den ikke fryser siden, og viser live-fremskridt (verificerede brugere indtil videre, ud af det samlede antal, og hvor mange svage adgangskoder der er fundet). Fordi hver kandidatadgangskode skal tjekkes mod hver valgt brugers hash, kan scanning af alle brugere på en stor platform tage et stykke tid — kandidatlisten holdes bevidst kort for at begrænse denne omkostning.

## Handling på resultater

![De færdige scanningsresultater, der viser en markeret bruger med kolonnerne Navn, Brugernavn og E-mail samt handlinger pr. række til at anmode om adgangskodeændring eller tvinge en nulstilling af adgangskoden](/.gitbook/assets/admin-security-password-strength-results.png)

Når scanningen er færdig, vises markerede brugere med to tilgængelige handlinger, enten pr. bruger eller som en massehandling for alle valgte brugere:

* **Anmod om adgangskodeændring** (konvolutikon) — Sender brugeren en e-mail med anmodning om at ændre adgangskoden
* **Tving nulstilling af adgangskode** (nulstillingsikon) — Ugyldiggør straks brugerens aktuelle adgangskode og sender dem en ny via e-mail

Begge handlinger verificerer de valgte brugere igen mod listen over svage adgangskoder, før der handles, så en forældet eller manipuleret anmodning ikke kan bruges til at nulstille en konto, der ikke længere har en svag adgangskode.

## Anbefalet brug

* Kør denne scanning periodisk, især efter en masseimport af brugere (importerede konti leveres nogle gange med simple standardadgangskoder)
* Kombiner den med indstillingerne **Minimale syntakskrav til adgangskode** og **Interval for rotation af adgangskode** i [Sikkerhedsindstillinger](../platform-settings/security-settings.md) for at forhindre, at svage adgangskoder overhovedet sættes, frem for kun at fange dem bagefter