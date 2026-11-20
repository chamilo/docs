# Akademiske karakterutskrifter

Chamilo kan produsere en **uoffisiell akademisk karakterutskrift** basert på en students fullførte, sertifiserte kurs, og la autorisert personale utstede en **offisiell signert karakterutskrift**. Denne funksjonen er atskilt fra et individuelt kurssertifikat eller den valgfrie verifiseringen på Sepolia-testnettet.

## Aktiver funksjonen

I **Administrasjon > Konfigurasjonsinnstillinger > Sertifikater** aktiverer du **Akademiske karakterutskrifter** (`certificate.transcript_enabled`). Funksjonen er deaktivert som standard. Gå gjennom de øvrige innstillingene for program, karakterskala, kurstimer, studentnummer, adresse og underskriver i [Innstillinger for sertifikater](../platform-settings/certificate-settings.md#transcript_enabled).

Karakterutskriften bruker sertifikater generert av **rotkategorien i karakterboken** for kvalifiserte kurs og sesjoner. Den inkluderer bare kurs innenfor gjeldende tilgangs-URL som studenten fortsatt er påmeldt. Et kurs uten et kvalifisert sertifikat bidrar ikke med en rad.

Den viste sluttkarakteren er et gjennomsnitt av de oppførte kursenes prosentpoeng; GPA er det uvektede gjennomsnittet av de tilordnede karakterpoengene. Begge avhenger av kursene som er inkludert på tidspunktet for visning eller utstedelse.

## Kolonner i karakterutskriften

| Kolonne | Innhold |
|--------|---------|
| **Kurs** | Kurskoden, eller avdelingsnavnet for kurset (`transcript_course_code_source`) |
| **Beskrivelse** | Kurstittelen, og sesjonstittelen for et kurs som er fulgt i en sesjon |
| **Påmelding** | Når studenten meldte seg på kurset eller sesjonen |
| **Påkrevde timer** | Verdien i kursets ekstra felt som er angitt i `transcript_hours_extra_field`, eller kursvarigheten |
| **Fullføringsdato** | Datoen for sertifikatet |
| **Fullførte timer** | Tiden studenten har brukt i kurset, eller de påkrevde timene når `transcript_completed_hours_are_required_hours` er aktivert |
| **Sluttkarakter** | Poengsummen for sertifikatet |
| **Karakter** | Bokstaven i `transcript_grading_scale` som samsvarer med den poengsummen |

## Åpne en students karakterutskrift

1. Gå til **Administrasjon > Brukere > Brukerliste** og finn studenten. Handlingen **Karakterutskrift** er tilgjengelig for autoriserte administratorer og sesjonsadministratorer når funksjonen er aktivert.
2. Alternativt kan du bruke handlingen **Karakterutskrift** fra detaljsiden for global rapportering for en kvalifisert student.
3. Gå gjennom studentens kursliste, karakterer, datoer, timer, sluttkarakter og GPA.
4. Velg **Last ned uoffisiell karakterutskrift** for en PDF som er bygget fra studentens gjeldende opplysninger.

Karakterutskriftssiden er også direkte tilgjengelig på `/transcript?userId=<user-id>` for noen som er autorisert til å få tilgang til den studentens opplysninger. Ikke behandle kjennskap til URL-en eller bruker-ID-en som tillatelse: tilgangen kontrolleres på serversiden.

En student kan se sin **egen** karakterutskrift, men kan ikke utstede eller tilbakekalle en offisiell. Autoriserte utstedere er:

* Plattform-/portaladministratorer som handler innenfor sitt forvaltede omfang for brukere/tilgangs-URL.
* HR-ledere for studenter de følger.
* Sesjonsadministratorer for studenter som er registrert i en sesjon de administrerer.

Disse tillatelsene vurderes per student; det å ha en personalrolle i seg selv gir ikke tilgang til alle karakterutskrifter.

![Karakterutskriften til en student sett av en administrator, med kursene, sluttkarakter, GPA og karakterskala, listen over offisielle karakterutskrifter og signaturbildeblokken](../../.gitbook/assets/admin-transcript-user.png)

## Utsted og verifiser en offisiell karakterutskrift

1. På karakterutskriftssiden for en autorisert student kontrollerer du kursene, karakterene og personopplysningene som vises.
2. Velg **Utsted offisiell karakterutskrift** og bekreft. Chamilo lagrer et signert øyeblikksbilde av opplysningene på det tidspunktet.
3. Den nye oppføringen vises under **Offisielle karakterutskrifter** med utstedelsesdato og utsteder.
4. Bruk **Last ned** for den offisielle PDF-en eller **Verifiser** for å åpne den offentlige verifiseringssiden.
5. Ved behov kan en autorisert utsteder **Tilbakekalle** den offisielle karakterutskriften. Verifiseringssiden vil da rapportere at den er tilbakekalt.

Hver utstedte karakterutskrift lagres separat: å utstede en nyere versjon omskriver ikke i det stille en tidligere signert registrering. Verifiseringslenker følger `/transcripts/verify/<token>` og eksponerer også et `.json`-svar. Noen med verifiseringslenken kan kontrollere gyldigheten uten å logge inn; hold disse lenkene under passende kontroll, fordi en gyldig verifisering eksponerer detaljer fra den signerte karakterutskriften. Ugyldige eller tilbakekalte registreringer presenteres ikke som gyldige dokumenter.

![Den offentlige verifiseringssiden for en gyldig offisiell karakterutskrift, med detaljer og kurs](../../.gitbook/assets/admin-transcript-verification.png)

En offisiell karakterutskrift signeres digitalt av Chamilo med institusjonens signeringsnøkkel. **Det er ikke en blokkjedetransaksjon**; Sepolia-funksjonen dokumenterer en separat prosess for legitimasjoner for karakterbokssertifikater.

## Signaturbilde og underskriverdetaljer

En plattformadministrator kan laste opp et **PNG- eller JPEG**-signaturbilde i delen **Signatur for offisielle karakterutskrifter** på en lærendes side for karakterutskrift. Bildet tilhører gjeldende tilgangs-URL og brukes i offisielle PDF-er. Underskriverens navn og tittel hentes fra `certificate.transcript_signatory_name` og `certificate.transcript_signatory_title`.

Kun plattformadministratorer administrerer signaturbildet; andre autoriserte utstedere av karakterutskrifter får ikke denne tillatelsen automatisk. Beskytt institusjonens signeringsnøkler og privat lagring av signaturbilder som en del av portalens prosedyrer for sikkerhetskopiering og tilgangskontroll. Begge oppbevares utenfor den offentlige nettmapen, i `var/certificate-issuer/`, sammen med nøkkelen som også signerer legitimasjon for karakterboksertifikater: inkluder denne mappen i [sikkerhetskopiene](../maintenance/backups.md), ellers kan hver allerede utstedte karakterutskrift og legitimasjon ikke lenger verifiseres.

## Feilsøking

* **Lenke til karakterutskrift mangler:** kontroller `certificate.transcript_enabled` og gjeldende brukers omfang.
* **Ingen fullførte kurs:** lærenden trenger et kvalifiserende rotsertifikat i karakterboken og en samsvarende gjeldende kurs-/øktpåmelding på denne tilgangs-URL-en.
* **Feil studentnummer, timer, karakterbokstaver eller programtittel:** gjennomgå de spesifikke innstillingene `certificate.transcript_*` før du utsteder en offisiell karakterutskrift.
* **Verifisering rapporterer et tilbakekalt eller ugyldig resultat:** ikke gjenbruk oppføringen som bevis på en gjeldende offisiell karakterutskrift; autorisert personale kan utstede en ny når det er hensiktsmessig.

Se også [Sertifikater og ferdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) og [Min karakterutskrift](../../student-guide/account-and-security/my-transcript.md).