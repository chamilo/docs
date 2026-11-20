# Konfidensiell rapportering

Chamilo inkluderer en valgfri arbeidsflyt for **konfidensiell rapportering** for å sende inn bekymringer om en annen bruker til autoriserte etterforskere. Dette er ikke det vanlige verktøyet for brukerstøttesaker eller et offentlig diskusjonsforum.

## Aktiver funksjonen

Åpne **Administrasjon > Konfigurasjonsinnstillinger > Sikkerhet** og konfigurer:

| Innstilling | Standard | Formål |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Aktiver arbeidsflyten for konfidensiell rapportering |
| `security.confidential_reporting_min_reporters` | `2` | Minste antall ulike rapportører (2–10) før en undersøkelse blir synlig |
| `security.confidential_reporting_attachments_enabled` | `true` | Tillat vedlegg som bevis |
| `security.confidential_reporting_notifications_enabled` | `false` | Vis interne indikatorer for kvalifiserte undersøkelser (ingen e-poster) |

Distribusjonen krever også at serverens kryptering og private lagring for konfidensiell rapportering er klare. Chamilo bruker de kryptografiske PHP Sodium-funksjonene og en privat krypteringsnøkkel; **behold og sikkerhetskopier nøkkelen på en sikker måte**. Hvis den går tapt, kan lagrede rapporter bli uleselige. Ikke kopier nøkkelen til et Git-repositorium. Ikke aktiver funksjonen før du har verifisert at lagring av privat nøkkel og de nødvendige databasemigrasjonene er operative.

## Sende inn en rapport

1. Logg inn direkte i Chamilo og åpne **Konfidensiell rapportering** (når den er aktivert for portalen).
2. Velg personen det gjelder, skriv inn et emne og beskriv hendelsen.
3. Legg til bevis hvis vedlegg er aktivert.
4. Bestem om etterforskere kan se **navn og e-post** for denne spesifikke rapporten. Denne tillatelsen kan trekkes tilbake senere.
5. Send rapporten. Bruk **Mine konfidensielle rapporter** for å følge saken og utveksle meldinger med en etterforsker.

Rapportørens identitet **vises ikke for etterforskere som standard**. Dette er en konfidensialitetskontroll, ikke et løfte om absolutt anonymitet overfor systemets operatører.

## Undersøkelsestillatelser og terskler

Undersøkelser krever den dedikerte tillatelsen `welfare:investigate` og en kvalifisert administrator- eller HR-rolle. En sak blir tilgjengelig for undersøkelse først etter at det konfigurerte antallet **ulike rapportører** er nådd for samme mål. En etterforsker kan ikke undersøke en rapport om seg selv. HR-tilgang er begrenset til brukerne som HR-ansvarlig følger.

Etterforskere åpner **Konfidensielle undersøkelser** for å se kvalifiserte saker, gjennomgå bevis og utveksle meldinger. Saker under terskelen eller uautoriserte saker eksponeres ikke gjennom undersøkelses-API-en. Administrativ **etterligning** gir ikke tilgang til konfidensiell rapportering.

## Personvern og operasjonell aktsomhet

Rapporter og vedlagte bevis inneholder sensitive personopplysninger. Begrens etterforskeres tillatelser, begrens tilgang til sikkerhetskopier, definer en hensiktsmessig organisatorisk oppbevaringspolicy, og test arbeidsflyten med separate kontoer for rapportør, mål og etterforsker. Unngå å kopiere fullstendige rapporter til tekniske logger eller saksporingsverktøy.

Implementering: [Konfidensiell rapportering #9310](https://github.com/chamilo/chamilo-lms/pull/9310).