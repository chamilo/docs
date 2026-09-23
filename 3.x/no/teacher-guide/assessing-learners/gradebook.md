# Vurderinger

Vurderingene (tidligere *gradebook*) samler poeng fra øvelser, innleveringer og andre vurderte aktiviteter i en samlet oversikt over hver lærendes prestasjon. De styrer også generering av sertifikater.

## Slik fungerer vurderingene

Vurderingene er vektede poengsystemer. Du definerer:

1. **Hvilke aktiviteter** som bidrar til karakteren (øvelser, innleveringer, oppmøte osv.)
2. **Vekten** til hver aktivitet (hvor mye den teller mot sluttkarakteren)
3. **Minimumspoeng for sertifisering** (terskelen for å oppnå et sertifikat)
4. **Et minimumspoeng per aktivitet** — Hver aktivitet i karakterboken kan ha sitt eget **Minimumspoeng**. Lærende som scorer under dette minimumet på en nøkkelaktivitet, kan hindres i å nå målene og oppnå sertifikatet, selv om den samlede vektede totalen ellers er høy nok.

Aktiviteter kan være av 2 typer:
* **Klasseromsaktivitet** (eller fysisk aktivitet), der karakterer må importeres fra en annen kilde
* **Nettbasert aktivitet** valgt fra kurset, der karakterer oppnås ved å gjennomføre aktiviteten i kurset

Chamilo beregner hver lærendes samlede karakter basert på disse vektene.

## Sette opp vurderingen

1. Åpne verktøyet **Vurderinger** <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Karakterbok" data-size="line"> fra kursets startsid
2. Du vil se oversiktsbildet for vurderinger, som i utgangspunktet er tomt

### Legge til aktiviteter

1. Klikk **Legg til nettbasert aktivitet**
2. Velg type:
   * **Test** — Koble til en spesifikk øvelse fra kurset
   * **Innlevering** — Koble til en mappe for studentpublikasjoner
   * **Læringssti** — Koble til fullføring av læringssti
   * **Oppmøte** — Koble til et oppmøteskjema
   * **Forumtråd** — Koble til en forumtråd (som må vurderes manuelt)
   * **Undersøkelse** — Koble til en undersøkelse
3. Velg den spesifikke aktiviteten innen den valgte typen
4. Angi **Vekt** for denne aktiviteten (f.eks. 30 % for midtveiseksamen, 40 % for sluttprosjektet)
5. Angi **Minimumspoeng** hvis det er aktuelt
6. Lagre

Den samlede vekten av alle aktiviteter bør summeres til 100 %.

### Underkategorier

For komplekse karakterordninger kan du opprette **underkategorier** for å gruppere relaterte aktiviteter:

* **Eksempel**: En underkategori «Hjemmearbeid» (vekt: 30 %) som inneholder fem individuelle innleveringer som hver er verdt 20 % av underkategorien
* Underkategorier lar deg organisere vurderingen hierarkisk samtidig som den samlede beregningen forblir enkel

## Vise karakterer

![Oversiktstabellen i karakterboken som viser lærendes navn, aktivitetspoeng og vektede totaler](../../.gitbook/assets/gradebook-overview.png)

Vurderingen viser en tabell med:

* Hver lærendes navn
* Poeng for hver aktivitet
* Den vektede totalen
* Om den lærende kvalifiserer til et sertifikat

Du kan sortere etter hvilken som helst kolonne for raskt å identifisere de beste prestasjonene eller lærende som sliter.

### Diagrammer for poengfordeling

Under tabellen, og på siden **Grafisk visning**, tegner vurderingen ett stolpediagram per aktivitet pluss ett for totalen. Hvert diagram er et kolonnediagram: den horisontale aksen lister poengintervallene dine fra lavest til høyest, og høyden på hver stolpe er antall lærende i det intervallet.

Diagrammet **Total** merker også klassegjennomsnittet. Et rødt punkt ligger på intervallet som inneholder gjennomsnittet, og forklaringen gir den nøyaktige prosentandelen.

Disse diagrammene vises bare når reglene for poengvisning er satt. Hvis du ser meldingen *To view graph score rule must be enabled*, definerer du intervallene dine først under vurderingens poenginnstillinger.

## Sertifikater

Slik aktiverer du generering av sertifikater:

1. I vurderingsinnstillingene angir du et **minimumspoeng for sertifisering** (f.eks. 70 %)
2. Når en lærendes vektede total møter eller overstiger denne terskelen (og de ikke har feilet noe minimumspoeng per aktivitet), kan de laste ned sertifikatet sitt
3. Sertifikatet genereres fra en mal konfigurert av plattformadministratoren

Når **Generer sertifikater** er aktivert på rotkategorien, vises feltet **Sertifikatgyldighet (dager)**. La det stå på `0` for sertifikater som aldri utløper, eller angi et antall dager etter hvilket sertifikatet utløper — Chamilo kan deretter minne lærende når utløpsdatoen nærmer seg, enten automatisk (cron, konfigurert av administrator) eller manuelt fra sertifikatlisten.

![Dialogboksen for redigering av kategori med Generer sertifikater aktivert og feltet Sertifikatgyldighet (dager) satt til 365](../../.gitbook/assets/gradebook-certificate-validity-field.png)

Se [Sertifikater og ferdigheter](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) for mer informasjon.

## Koble til ferdigheter

Du kan knytte **ferdigheter** til vurderingen. Når en lærende når de fastsatte målene for å fullføre vurderingen, kan de enten få et sertifikat, få en ferdighet eller begge deler. Ferdigheter er synlige på profilen deres i det sosiale nettverksområdet. Dette bygger opp en kompetanseoversikt over tid.

## Eksportere karakterer

Klikk på **Eksporter**-knappen <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Eksporter" data-size="line"> for å laste ned karakterer som et regneark. Dette er nyttig for å:

* Dele karakterer med administrative systemer
* Utføre ytterligere analyse utenfor Chamilo
* Beholde offline-registre

## Tips

* **Planlegg vektene tidlig** — Definer karakterskjemaet ved kursstart, slik at studentene vet hva de kan forvente
* **Bruk underkategorier for komplekse kurs** — Grupper innleveringer, quizer og deltakelse i tydelige kategorier
* **Sett meningsfulle beståttgrenser** — Sertifiseringsscoren bør gjenspeile faktisk kompetanse, ikke bare deltakelse
* **Sjekk jevnlig** — Gå gjennom karakterboken med jevne mellomrom for å sikre at alle aktiviteter er riktig koblet og at poeng registreres