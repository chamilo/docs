# Bedømmelser

Bedømmelserne (tidligere *gradebook*) samler scorer fra øvelser, opgaver og andre bedømte aktiviteter i et samlet overblik over hver lærendes præstation. De styrer også generering af certifikater.

## Sådan fungerer bedømmelserne

Bedømmelserne er vægtede scoringssystemer. Du definerer:

1. **Hvilke aktiviteter** der bidrager til karakteren (øvelser, opgaver, fremmøde osv.)
2. **Vægten** af hver aktivitet (hvor meget den tæller i den endelige karakter)
3. **Den minimale certificeringsscore** (tærsklen for at opnå et certifikat)
4. **En minimumsscore pr. aktivitet** — Hver aktivitet i karakterbogen kan have sin egen **Minimumsscore**. Lærende, der scorer under dette minimum på en nøgleafktivitet, kan forhindres i at nå målene og opnå certifikatet, selvom deres samlede vægtede total ellers er høj nok.

Aktiviteter kan være af 2 typer:
* **Klasseværelsesaktivitet** (eller fysisk aktivitet), hvor karakterer skal importeres fra en anden kilde
* **Onlineaktivitet** valgt fra kurset, hvor karakterer opnås ved at gennemføre aktiviteten i kurset

Chamilo beregner hver lærendes samlede karakter ud fra disse vægte.

## Opsætning af bedømmelsen

1. Åbn værktøjet **Bedømmelser** <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> fra kursets startside
2. Du vil se oversigten over bedømmelser, som i starten er tom

### Tilføjelse af aktiviteter

1. Klik på **Tilføj onlineaktivitet**
2. Vælg typen:
   * **Test** — Knyt en specifik øvelse fra kurset
   * **Opgave** — Knyt en mappe til studerendes publikationer
   * **Læringssti** — Knyt gennemførelse af læringssti
   * **Fremmøde** — Knyt et fremmødeark
   * **Forumtråd** — Knyt en forumtråd (som skal bedømmes manuelt)
   * **Spørgeskema** — Knyt et spørgeskema
3. Vælg den specifikke aktivitet inden for den valgte type
4. Angiv **Vægt** for denne aktivitet (f.eks. 30 % til midtvejseksamen, 40 % til det afsluttende projekt)
5. Angiv **Minimumsscore**, hvis det er relevant
6. Gem

Den samlede vægt af alle aktiviteter bør summere til 100 %.

### Underkategorier

Til komplekse karakterordninger kan du oprette **underkategorier** for at gruppere relaterede aktiviteter:

* **Eksempel**: En underkategori "Hjemmearbejde" (vægt: 30 %) med fem individuelle opgaver, der hver tæller 20 % af underkategorien
* Underkategorier lader dig organisere bedømmelsen hierarkisk, mens den overordnede beregning forbliver enkel

## Visning af karakterer

![Oversigtstabellen i karakterbogen, der viser lærendes navne, aktivitetsscorer og vægtede totaler](../../.gitbook/assets/gradebook-overview.png)

Bedømmelsen viser en tabel med:

* Hver lærendes navn
* Scorer for hver aktivitet
* Den vægtede total
* Om den lærende kvalificerer sig til et certifikat

Du kan sortere efter en hvilken som helst kolonne for hurtigt at identificere de bedst præsterende eller de lærende, der har det svært.

### Diagrammer over scorefordeling

Under tabellen og på siden **Grafisk visning** tegner bedømmelsen ét søjlediagram pr. aktivitet plus ét for totalen. Hvert diagram er et søjlediagram: den vandrette akse viser dine scoreintervaller fra laveste til højeste, og højden af hver søjle er antallet af lærende i det interval.

Diagrammet **Total** markerer også klassegennemsnittet. Et rødt punkt sidder på det interval, der indeholder gennemsnittet, og forklaringen angiver den nøjagtige procentdel.

Disse diagrammer vises kun, når reglerne for visning af scorer er angivet. Hvis du ser meddelelsen *To view graph score rule must be enabled*, skal du først definere dine intervaller under bedømmelsens scoringindstillinger.

## Certifikater

For at aktivere generering af certifikater:

1. Angiv i bedømmelsesindstillingerne en **minimal certificeringsscore** (f.eks. 70 %)
2. Når en lærendes vægtede total når eller overstiger denne tærskel (og vedkommende ikke er dumpede på nogen minimumsscore pr. aktivitet), kan de downloade deres certifikat
3. Certifikatet genereres ud fra en skabelon konfigureret af platformadministratoren

Når **Generer certifikater** er aktiveret på rod-kategorien, vises feltet **Certifikatgyldighed (dage)**. Lad det stå på `0` for certifikater, der aldrig udløber, eller angiv et antal dage, hvorefter certifikatet udløber — Chamilo kan derefter minde de lærende, når udløbsdatoen nærmer sig, enten automatisk (cron, konfigureret af administrator) eller manuelt fra listen over certifikater.

![Dialogboksen til redigering af kategori med Generer certifikater aktiveret og feltet Certifikatgyldighed (dage) sat til 365](../../.gitbook/assets/gradebook-certificate-validity-field.png)

Se [Certifikater og færdigheder](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) for flere detaljer.

## Tilknytning til færdigheder

Du kan knytte **færdigheder** til bedømmelsen. Når en lærende når de fastsatte mål for at gennemføre bedømmelsen, kan de enten få et certifikat, få en færdighed eller begge dele. Færdigheder vises på deres profil i det sociale netværksområde. Dette opbygger et kompetenceregister over tid.

## Eksport af karakterer

Klik på knappen **Eksport** <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Eksport" data-size="line"> for at downloade karakterer som et regneark. Dette er nyttigt til:

* Deling af karakterer med administrative systemer
* Udførelse af yderligere analyser uden for Chamilo
* Opbevaring af offline-optegnelser

## Tips

* **Planlæg dine vægte tidligt** — Definer karakterordningen ved kursusstart, så de studerende ved, hvad de kan forvente
* **Brug underkategorier til komplekse kurser** — Gruppér opgaver, quizzer og deltagelse i klare kategorier
* **Sæt meningsfulde beståelsestærskler** — Certificeringsscoren bør afspejle faktisk kompetence, ikke kun deltagelse
* **Tjek regelmæssigt** — Gennemgå karakterbogen periodisk for at sikre, at alle aktiviteter er korrekt knyttet, og at scorer registreres