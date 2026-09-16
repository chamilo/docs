# Versiecontrole

Versiecontrole vertelt u of uw Chamilo-installatie up-to-date is, en — als u zich aanmeldt — registreert uw platform bij het Chamilo-project zodat het kan worden meegeteld in geaggregeerde gebruiksstatistieken.

## Twee niveaus van controle

**Niet-geregistreerd (standaardtoestand):** Chamilo probeert nog steeds contact te maken met `version.chamilo.org` om uw geïnstalleerde versie te vergelijken met de nieuwste release, waarbij niets meer dan het verzoek zelf wordt gebruikt — er worden geen platformgegevens verzonden. Het blok toont een registratieformulier dat uitlegt wat registreren extra oplevert, plus een knop **"Versiecontrole inschakelen"** en een selectievakje **"Campus verbergen in de lijst van openbare platforms"**.

**Geregistreerd:** Op **"Versiecontrole inschakelen"** klikken wijzigt alleen twee lokale instellingen — het verzendt op zichzelf niets. Vanaf dat moment stuurt uw platform telkens wanneer dit dashboardblok wordt geladen een verzoek naar `version.chamilo.org` dat het volgende bevat:

| Verzonden gegevens | Vermeld doel |
|-----------|-----------------|
| URL en sitenaam van uw platform | Identificeert welk portaal zich aanmeldt |
| E-mailadres van de beheerder | Uitdrukkelijk zodat het Chamilo-team beheerders kan bereiken over kritieke beveiligingsproblemen |
| Geïnstalleerde versie | Om te bepalen of u up-to-date bent |
| Aantallen cursussen, gebruikers, actieve gebruikers en sessies | Samengevoegd tot niet-persoonlijke geaggregeerde statistieken op `stats.chamilo.org` |
| Organisatienaam en interfacetaal | Alleen demografische aggregatie |
| Naam van de beheerder | Wordt verzonden, hoewel het doel daarvan in de code zelf niet duidelijk is gedocumenteerd |
| IP-adres van uw server | Wordt gebruikt om de locatie van uw platform bij benadering te bepalen voor een wereldkaart van installaties |
| Vlag "Campus niet vermelden", packager en een unieke instance-ID | Bepaalt of u in de openbare directory verschijnt, en identificeert herhaalde check-ins van dezelfde installatie |

Als u **"Campus verbergen in de lijst van openbare platforms"** uitgevinkt laat, verschijnt uw platform ook in de openbare communitylijst op `version.chamilo.org/community.php`.

## Versiecontrole openen

Dit blok verschijnt rechtstreeks op het beheerdersdashboard — er is geen aparte pagina om te bezoeken.

## Moet u het inschakelen?

Dit is een expliciete opt-in, en de afweging is eenvoudig: in ruil voor het delen van de bovenstaande gegevens krijgt u een automatische melding wanneer een nieuwe versie (inclusief beveiligingspatches) beschikbaar is, en draagt u bij aan de openbare adoptiestatistieken van Chamilo. Als u liever geen platformgegevens deelt, klikt u gewoon niet op "Versiecontrole inschakelen" — de basale up-to-datecontrole blijft zonder registratie werken. Als u de updatemelding wilt maar niet de openbare vermelding, registreert u zich en vinkt u "Campus verbergen in de lijst van openbare platforms" aan.