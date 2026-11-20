# Akademiske udskrifter

Chamilo kan udarbejde et **uofficielt akademisk udskrift** ud fra en kursists gennemførte, certificerede kurser og give autoriseret personale mulighed for at udstede et **officielt underskrevet udskrift**. Denne funktion adskiller sig fra et individuelt kursuscertifikat eller dets valgfrie Sepolia-testnetverifikation.

## Aktivér funktionen

Under **Administration > Konfigurationsindstillinger > Certifikater** skal du aktivere **Akademiske udskrifter** (`certificate.transcript_enabled`). Funktionen er deaktiveret som standard. Gennemgå de yderligere indstillinger for program, karakterskala, kursustimer, studienummer, adresse og underskriver i [Certifikatindstillinger](../platform-settings/certificate-settings.md#transcript_enabled).

Udskriftet anvender certifikater, der er genereret af **rodkategorien i karakterbogen** for berettigede kurser og sessioner. Det omfatter kun kurser inden for den aktuelle adgangs-URL, som kursisten stadig er tilmeldt. Et kursus uden et berettiget certifikat bidrager ikke med en række.

Den viste endelige karakter er et gennemsnit af de anførte kursers procentpoint; GPA er det uvægtede gennemsnit af de tilknyttede karakterpoint. Begge afhænger af de kurser, der er medtaget på tidspunktet for visning eller udstedelse.

## Udskriftskolonner

| Kolonne | Indhold |
|--------|---------|
| **Kursus** | Kursuskoden eller kursusafdelingens navn (`transcript_course_code_source`) |
| **Beskrivelse** | Kursustitlen og sessionstitlen for et kursus, der er fulgt i en session |
| **Tilmelding** | Hvornår kursisten tilmeldte sig kurset eller sessionen |
| **Krævede timer** | Værdien af det ekstra kursusfelt, der er angivet i `transcript_hours_extra_field`, eller kursusvarigheden |
| **Afslutningsdato** | Certifikatets dato |
| **Gennemførte timer** | Den tid, kursisten har brugt på kurset, eller de krævede timer, når `transcript_completed_hours_are_required_hours` er aktiveret |
| **Endelig karakter** | Certifikatets score |
| **Karakter** | Bogstavet i `transcript_grading_scale`, der svarer til denne score |

## Få adgang til en kursists udskrift

1. Gå til **Administration > Brugere > Brugerliste**, og find kursisten. En handling **Udskrift** er tilgængelig for autoriserede administratorer og sessionsadministratorer, når funktionen er aktiveret.
2. Alternativt kan du bruge handlingen **Udskrift** fra en berettiget kursists globale rapporteringsdetaljeside.
3. Gennemgå kursistens kursusliste, karakterer, datoer, timer, endelige karakter og GPA.
4. Vælg **Download uofficielt udskrift** for at få en PDF, der er opbygget ud fra kursistens aktuelle registreringer.

Udskriftssiden er også direkte tilgængelig på `/transcript?userId=<user-id>` for en person, der er autoriseret til at få adgang til den pågældende kursists registreringer. At kende URL'en eller bruger-id'et skal ikke betragtes som tilladelse: adgangen kontrolleres på serversiden.

En kursist kan se sit **eget** udskrift, men kan ikke udstede eller tilbagekalde et officielt udskrift. Autoriserede udstedere er:

* Platform-/portaladministratorer, der handler inden for deres administrerede bruger-/adgangs-URL-omfang.
* HR-chefer for kursister, de følger.
* Sessionsadministratorer for kursister, der er registreret i en session, de administrerer.

Disse tilladelser vurderes pr. kursist; en medarbejderrolle giver i sig selv ikke adgang til alle udskrifter.

![Udskriftet for en kursist set af en administrator, med kurser, endelig karakter, GPA og karakterskala, listen over officielle udskrifter og signaturbilledblokken](../../.gitbook/assets/admin-transcript-user.png)

## Udsted og verificer et officielt udskrift

1. På en autoriseret kursists udskriftsside skal du kontrollere de aktuelt viste kurser, karakterer og personoplysninger.
2. Vælg **Udsted officielt udskrift**, og bekræft. Chamilo gemmer et underskrevet øjebliksbillede af oplysningerne på det tidspunkt.
3. Den nye post vises under **Officielle udskrifter** med udstedelsesdato og udsteder.
4. Brug **Download** til den officielle PDF eller **Verificer** for at åbne den offentlige verificeringsside.
5. Om nødvendigt kan en autoriseret udsteder **Tilbagekalde** det officielle udskrift. Verificeringssiden vil derefter angive, at det er tilbagekaldt.

Hvert udstedt udskrift gemmes separat: udstedelse af en nyere version omskriver ikke lydløst en tidligere underskrevet registrering. Verificeringslinks følger `/transcripts/verify/<token>` og eksponerer også et `.json`-svar. En person med verificeringslinket kan kontrollere gyldigheden uden at logge ind; hold disse links passende kontrolleret, fordi en gyldig verificering eksponerer underskrevne udskriftsoplysninger. Ugyldige eller tilbagekaldte registreringer præsenteres ikke som gyldige dokumenter.

![Den offentlige verificeringsside for et gyldigt officielt udskrift med dets oplysninger og kurser](../../.gitbook/assets/admin-transcript-verification.png)

Et officielt udskrift underskrives digitalt af Chamilo ved hjælp af institutionens signeringsnøgle. **Det er ikke en blockchain-transaktion**; Sepolia-funktionen dokumenterer en separat proces for legitimationsoplysninger til karakterbogscertifikater.

## Signaturbillede og underskriveroplysninger

En platformadministrator kan uploade et **PNG- eller JPEG**-signaturbillede i sektionen **Signatur på officielle karakterudskrifter** på en lærendes karakterudskriftsside. Billedet tilhører den aktuelle adgangs-URL og bruges i officielle PDF'er. Underskriverens navn og titel kommer fra `certificate.transcript_signatory_name` og `certificate.transcript_signatory_title`.

Kun platformadministratorer administrerer signaturbilledet; andre autoriserede udstedere af karakterudskrifter får ikke automatisk denne tilladelse. Beskyt institutionens signeringsnøgler og den private lagring af signaturbilleder som en del af portalens procedurer for sikkerhedskopiering og adgangskontrol. Begge opbevares uden for den offentlige webmappe, i `var/certificate-issuer/`, sammen med den nøgle, der også signerer legitimationsoplysninger for karakterbogscertifikater: medtag denne mappe i dine [sikkerhedskopier](../maintenance/backups.md), ellers kan alle allerede udstedte karakterudskrifter og legitimationsoplysninger ikke længere verificeres.

## Fejlfinding

* **Link til karakterudskrift mangler:** kontrollér `certificate.transcript_enabled` og den aktuelle brugers omfang.
* **Ingen gennemførte kurser:** den lærende skal have et kvalificerende certifikat fra rodkarakterbogen og en matchende aktuel tilmelding til kursus/session på denne adgangs-URL.
* **Forkert studienummer, timer, bogstavkarakterer eller programtitel:** gennemgå de specifikke indstillinger `certificate.transcript_*`, før der udstedes en officiel karakterudskrift.
* **Verifikation rapporterer et tilbagekaldt eller ugyldigt resultat:** genbrug ikke posten som bevis for en aktuel officiel karakterudskrift; autoriseret personale kan udstede en ny, når det er relevant.

Se også [Certifikater og kompetencer](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) og [Min karakterudskrift](../../student-guide/account-and-security/my-transcript.md).