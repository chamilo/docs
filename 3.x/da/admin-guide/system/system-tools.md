# Systemværktøjer

Denne side dækker vedligeholdelses- og inspektionsværktøjerne i blokken System.

## Rens midlertidige filer

**System > Rens midlertidige filer** viser, hvor mange midlertidige uploadfiler der findes, og hvor meget plads de fylder, og lader dig derefter slette dem — enten alle, eller kun filer ældre end en konfigurerbar alder. En dry-run-tilstand lader dig først se, hvad der ville blive slettet. Den samme handling rydder også forældede, ældre build-filer og regenererer kompilerede CSS-assets.

Denne handling springer bevidst Symfonys egne cache-mapper over (`var/cache/dev`, `var/cache/prod`, `var/cache/test` og cache-pools) — den renser kun løse filer, der er endt andre steder under `var/cache/`. Den vil **ikke** opfange en ændring, du har foretaget i `.env` eller under `config/` (for eksempel aktivering af API-dokumentationen — se [Aktivér API-dokumentationen](../installation/configuration.md#enable-the-api-documentation)). Til det har du brug for shell-adgang til at køre `php bin/console cache:clear`.

## Systemopdatering

**System > Systemopdatering** kører Chamilos selvopdateringsworkflow direkte fra administrationspanelet som en sekvens af diskrete, genoptagelige trin:

1. **Status** — Rapporterer den installerede version og hvor opdaterings-/staging-/backup-mapper ligger, sammen med den betroede signeringsnøgle, der er i brug
2. **Check** — Undersøger, om en nyere version er tilgængelig fra den konfigurerede opdateringskilde
3. **Verify** — Downloader opdateringspakken og dens signatur og tjekker den mod manifestets checksum og den betroede offentlige nøgle
4. **Preflight** — Validerer systemkrav og kompatibilitet, før noget berøres
5. **Stage** — Pakker den verificerede pakke ud i en isoleret staging-mappe; intet i den kørende installation ændres endnu
6. **Apply plan** — Opbygger en diff over filer, der skal tilføjes, erstattes eller fjernes, baseret på den stagede pakke
7. **Apply files** — Kopierer filer på plads. Dette kræver eksplicit bekræftelse og opretter en backup af hver fil, der overskrives, plus en lock-fil, der forhindrer, at en anden opdatering kører samtidigt
8. **Migration safety / post-apply checks** — Validerer ventende databasemigrationer og tilstanden efter installation
9. **Run post-apply** — Udfører post-apply-konsolkommandoer (såsom databasemigrationer), men kun hvis din serverkonfiguration tillader at køre dem fra brugergrænsefladen, og kun efter at du har indtastet en eksplicit bekræftelsesfrase og bekræftet, at der er taget en backup

Langvarige trin rapporterer fremdrift, så siden trygt kan stå åben, mens de fuldføres. Kombinationen af signaturverifikation, staging før anvendelse, backups før overskrivning, en concurrency-lås og indtastede bekræftelser før databaseændringer er designet til at gøre dette workflow sikkert at køre uden shell-adgang — men en manuel backup inden start er stadig god praksis; se [Backups](../maintenance/backups.md).

## Filinfo

**System > Filinfo** lister alle uploadede ressourcefiler, søgbare efter navn, og viser den fysiske sti, om filen er en orphan (ikke knyttet til noget kursus eller nogen session), og hvor mange steder der refererer til den. Herfra kan du knytte en orphaned fil til en ressource, løsrive den eller slette den — nyttigt til at opspore og rydde op i lager, der ikke længere tilhører noget kursus.

## Ressourcer efter type

**System > Ressourcer efter type** lader dig vælge en ressourcetype og se, på tværs af alle kurser og sessioner, et aggregeret antal og en liste over elementer af den type, hvornår de blev oprettet, og (hvor det er relevant) hvilke brugere der er knyttet til dem. Brug det til at besvare spørgsmål som "hvor mange fora findes der på hele platformen" eller "hvilke kurser har flest dokumenter."

## List ikoner

**System > List ikoner** er et gennemseeligt katalog over Chamilos indbyggede ikonsæt, grupperet efter kategori. Det er primært nyttigt, når man udvikler plugins eller temaer og har brug for at bekræfte et ikons nøjagtige navn, men det er eksponeret her som en generel reference.

## Værktøjer kun til udvikling

To yderligere elementer kan vises i denne blok, men kun når serveren har en `tests/`-mappe — hvilket normalt kun sker på en udviklings- eller QA-installation, aldrig i produktion:

* **Data filler** genererer store mængder falske brugere, kurser og online-brugerposter til belastnings- eller QA-test.
* **E-mail tester** sender en rigtig test-e-mail via platformens konfigurerede mailer for at bekræfte, at dine SMTP-/mailindstillinger faktisk virker, og viser nylige sendefejl, hvis der er nogen.

Hvis du ikke ser disse to links, er det forventet — det betyder, at din installation ikke har en `tests/`-mappe, hvilket er den normale, korrekte tilstand for en produktionsplatform.