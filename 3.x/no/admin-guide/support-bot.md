# Supportbot (beslutningstre-assistent)

**Supportboten** er en konfigurerbar hjelpeassistent bygget fra et fast beslutningstre. Den ble implementert i [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) for [issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). Den er **ikke en generativ KI-chatbot**: administratorer skriver spørsmål og valgbare svar som leder brukere til en forklaring, en side eller en støttesak.

## Aktiver den

1. Under **Administrasjon > Konfigurasjonsinnstillinger > Saker** aktiverer du `ticket.ticket_support_bot_enabled` (deaktivert som standard).
2. Åpne **Administrasjon > Supportbot** og opprett et **utkast** til beslutningstre. Angi en tittel og minst én inngangsnode med alternativer.
3. Definer spørsmålet eller informasjonen i hver node, og knytt alternativene til neste handling.
4. Publiser et gyldig tre. Bare et publisert tre med en gyldig inngangsnode og valgbare alternativer er tilgjengelig for brukere.

Motoren velger det publiserte treet for gjeldende tilgangs-URL; tilgjengeligheten er derfor portalavgrenset. En administrator må ha `ROLE_ADMIN` for å administrere trær.

## Utform en støtteflyt

Hvert alternativ kan utføre én av fire handlinger:

| Handling | Resultat |
| --- | --- |
| **Gå til en annen node** | Fortsett samtalen ved et annet spørsmål i samme tre |
| **Åpne en lenke** | Lenke til en Chamilo-side med en relativ sti på samme nettsted, for eksempel `/tickets` |
| **Avslutt samtale** | Merk saken som løst, og vis eventuelt en avslutningsmelding |
| **Opprett støttesak** | Eskaler samtalen til sakssystemet |

For eskalering av saker velger du et **Standard saksprosjekt** og en kategori som tilhører det prosjektet. Kategorier som krever et kurs, kan ikke brukes for denne eskaleringen fra supportboten. Den opprettede saken inneholder brukerens transkripsjon av beslutningstreet, slik at støttepersonell kan se valgene som førte til eskaleringen.

Redigeringsverktøyet validerer trestrukturen før publisering. Versjonene **Publisert** og **Arkivert** er skrivebeskyttet; bruk **Dupliser** for å opprette et nytt redigerbart utkast. Publisering av en erstatning arkiverer den tidligere publiserte versjonen i samme omfang. Fra listen kan administratorer også importere eller eksportere et tre og gjennomgå samtaleloggen. Et publisert tre må arkiveres før sletting, og et tre med samtalelogg kan ikke slettes.

## Importere eksempler og gjennomgå samtaler

Åpne **Administrasjon > Supportbot** og velg **Importer**. Importdialogen tilbyr **Last ned JSON-eksempel** og **Last ned CSV-eksempel**. Last ned et eksempel, erstatt spørsmålene og alternativene med dine egne, velg deretter den redigerte `.json`- eller `.csv`-filen og importer den. Hvert importert tre starter som et **nytt utkast**; gjennomgå det og publiser det eksplisitt når det er klart.

Eksemplene krever ikke et eksisterende saksprosjekt. Hvis arbeidsflyten skal opprette saker, konfigurerer du det nødvendige prosjektet og en kvalifisert kategori etter import.

I trelisten bruker du **Vis samtaler** for å inspisere samtalelogger for et bestemt tre, inkludert trær der samtaleantallet er null. Samtalelogger forblir avgrenset til den relevante brukeren og portalen. Se [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Slik får brukerne tilgang

Når innstillingen er på og portalen har et gyldig publisert tre, ser innloggede brukere en **Supportbot**-kontakt i den dokkede chatten. De svarer ved å velge de tilbudte alternativene. Boten kan avslutte samtalen, åpne en side på samme nettsted eller opprette en sak og vise lenken til den. Brukere kan starte en ny samtale etter at en tidligere er avsluttet.

Dette er atskilt fra **KI-veilederen**, som svarer på åpne læringsspørsmål. Supportboten følger bare rutene og alternativene som er konfigurert av administratorer.

## Feilsøking og sikkerhet

* **Ingen bot i chatten:** kontroller saksinnstillingen, at et tre er publisert for gjeldende portal, og at inngangsnoden har alternativer.
* **Kan ikke publisere:** gjennomgå manglende noder, uløste målnoder og ugyldige handlinger i utkastet.
* **Sak kan ikke opprettes:** kontroller valgt saksprosjekt og kategori. Ikke bruk en sakskategori som krever kurs.
* **Eldre samtaler mangler:** administratorer kan gjennomgå samtaleloggen fra det tilhørende treet; samtaler er knyttet til en bruker og en tilgangs-URL.

For den relaterte innstillingen, se [Saksinnstillinger](platform-settings/ticket-settings.md).