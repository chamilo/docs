# Undersøkelsesmaler

Administratorer kan bygge gjenbrukbare spørreskjemaer for undersøkelser og tilby dem til lærere eller tilordne dem direkte til kurs og økter. Denne funksjonen ble implementert i [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) for [sak #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Opprett og vedlikehold maler

1. I administrasjonspanelet åpner du **Undersøkelsesmaler** og velger **Opprett**.
2. Angi en tittel og en valgfri undertittel; konfigurer anonymitet, spørsmålsoppsett, omstokking, varighet, innledning og takketekst.
3. Lagre og legg til eller rediger de gjenbrukbare spørsmålene i malens spørsmålsredigerer.
4. Aktiver **Synlig som mal** hvis lærere skal kunne se og gjenbruke den. En usynlig mal forblir tilgjengelig for administratoren.

Maler tilhører gjeldende tilgangs-URL. Bare plattformadministratorer kan opprette, redigere eller slette hovedmalen. Lærere kan bruke synlige maler, men kan ikke endre hoveddefinisjonen deres.

## Gjenbruk en mal i et kurs eller en økt

I et autorisert kurs eller en autorisert økt kan en lærer velge en synlig mal når vedkommende oppretter en ny undersøkelse. Resultatet er en undersøkelse i den kurskonteksten, ikke en endring av den gjenbrukbare hovedmalen. Læreren kan gjennomgå spørsmålene og følge den vanlige publiserings- og invitasjonsarbeidsflyten.

Fra administrasjonens malliste kan en administrator i stedet tilordne en mal direkte til et valgt **kurs** og, valgfritt, en av det kursets **økter**. Chamilo kontrollerer at kurset tilhører gjeldende portal, og at den valgte økten faktisk inneholder kurset. Lærergrensesnittet kan ikke brukes til å tilordne en mal til en annen persons kurs eller økt.

Den nye undersøkelsen publiseres ikke automatisk bare fordi den ble opprettet fra en mal; gjennomgå den før du inviterer deltakere. Se [Undersøkelser](../teacher-guide/assessing-learners/surveys.md) for den standard arbeidsflyten for undersøkelser.

## Skjul sensitive resultater for lærere eller veiledere

Når en faktisk undersøkelse redigeres, kan en plattformadministrator aktivere **Resultater skjult for lærer/veileder**. Denne begrensningen per undersøkelse er ment for sensitive spørreskjemaer, for eksempel evalueringer av undervisningspersonale. Lærere og veiledere kan fortsatt se antall svar og sende påminnelser, men **kan ikke åpne rapporteringsvisninger eller eksportere resultatene**. Plattformadministratorer beholder rapporteringstilgang, underlagt andre plattforminnstillinger.

Dette alternativet skiller seg fra det vanlige feltet **Resultatsynlighet** og fra den plattformomfattende innstillingen **Skjul rapporteringsknapp for undersøkelser**. Bare en administrator kan endre flagget for begrensede resultater.

## Tillatelser og omfang

* **Administrator:** administrere maler, angi malsynlighet, tilordne til kvalifiserte kurs/økter og kontrollere begrenset resultatstilgang.
* **Lærer / øktlærer:** se og instansiere bare synlige maler innenfor sin autoriserte kurskontekst.
* **Tilgangs-URL-er:** malkatalogen og tilordningen håndhever gjeldende tilgangs-URL; maler fra andre portaler kan ikke instansieres på tvers av grensen.

Hvis maler ikke vises for lærere, kontroller **Synlig som mal** og deres kurs-/øktkontekst. Hvis en mal ikke kan instansieres, kontroller de globale begrensningene for opprettelse av undersøkelser og det tiltenkte målkurset eller -økten.