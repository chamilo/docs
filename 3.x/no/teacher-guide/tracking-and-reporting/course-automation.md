# Kursautomatisering (manuelle utløsere)

**Automatisering**-delen av kursrapportering lar autoriserte lærere konfigurere handlinger for starten og slutten av et kurs. I den nåværende Chamilo 3.1-implementeringen **utløses handlingene manuelt**: ikke anta at de kjøres automatisk på en kalenderdato eller via cron.

## Konfigurer handlinger

1. Åpne et kurs som lærer eller som en annen bruker med tillatelse til å administrere kursrapportering.
2. Åpne **Rapportering** og finn delen **Automatisering**.
3. Velg hendelsen (**Kurset åpner nå** eller **Kurset avsluttes nå**) og en handlingstype.
4. Angi målet som handlingen krever, og velg deretter **Legg til handling**.
5. Gå gjennom listen **Konfigurerte handlinger**; fjern en uønsket oppføring med handlingen **Slett**.

Støttede handlinger omfatter publisering eller skjuling av kursressurser, sending av invitasjoner til spørreundersøkelser, utstedelse av eksisterende sertifikater og endring av kurssynlighet. Tilgjengelige ressurser, spørreundersøkelser, Gradebook-alternativer og synlighetsverdier avhenger av kurset og den aktuelle brukerens tillatelser.

## Kjør den konfigurerte hendelsen

Velg **Kurset åpner nå** eller **Kurset avsluttes nå** og bekreft operasjonen. Kontroller det rapporterte resultatet. Chamilo registrerer fullførte kjøringer, hindrer dupliserte konfigurasjoner og hopper over handlinger som allerede er fullført med suksess ved senere kjøringer. Et nytt klikk skal ikke betraktes som en måte å sende en fullført handling på nytt.

For utstedelse av sertifikater må du først forberede og teste det aktuelle sertifikatet. For invitasjoner til spørreundersøkelser må du kontrollere at spørreundersøkelsen er konfigurert, og at de tiltenkte deltakerne tilhører gjeldende kurs- eller øktkontekst.

## Viktige begrensninger

- Dette grensesnittet gir **manuell kjøring**, ikke planlagt automatisering.
- Handlinger utføres innenfor gjeldende kurs-/øktkontekst; test tilgang og mål for begge kontekster der det er relevant.
- Handlinger som er fullført med suksess, gjentas ikke automatisk ved senere kjøringer.
- På tidspunktet for funksjonens PR var utstedelse av sertifikater, endringer av kurssynlighet og øktspesifikk kjøring kodegjennomgått, men ikke funksjonelt verifisert i den PR-en. Test dem på installasjonen din før du stoler på dem i drift.

Se [Kursrapporter](course-reports.md) og [Sertifikater og ferdigheter](certificates-and-skills.md). Implementering: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).