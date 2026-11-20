# Utstedelse og verifisering av Open Badges 2.0

Chamilo 3.1 kan publisere **Open Badges 2.0**-legitimasjoner for tilegnede ferdigheter, inkludert et merkebilde som inneholder en innebygd assertion i PNG-metadata. Verifisering av merker bruker offentlige endepunkter for merke, assertion og utsteder.

## Konfigurer utstederen og ferdighetene

1. Angi plattformens **institusjonsnavn** og en gyldig **e-postadresse for administratorkontakt**; begge kreves av utstederprofilen.
2. Konfigurer ferdigheten med tittel, beskrivelse og merkekriterier.
3. Legg ved et gyldig PNG-merkebilde der det er hensiktsmessig. Chamilo kan også bruke standardmerkebildet hvis ferdigheten ikke har en egendefinert ressurs.
4. Tildel eller valider tilegnelse av ferdigheten for den lærende gjennom den vanlige arbeidsflyten for ferdigheter.

Legitimasjonene avhenger av relasjonen til den tilegnede ferdigheten. En assertion for en ferdighet som er tilbakekalt eller ikke lenger tilegnet, rapporteres som tilbakekalt. Ferdighets- og merkeressurser er avgrenset til den aktuelle tilgangs-URL-en.

## Offentlige verifiseringsdata

Hver utstedelse har en vertsbasert assertion. De tilhørende URL-ene utledes fra applikasjonens offentlige rot og omfatter:

- `main/skills/assertion.php?issue=<issue-id>` — JSON-assertion for en bestemt ferdighetsutstedelse.
- `main/skills/class.php?id=<skill-id>` — metadata for merkeklasse, inkludert kriterier og utstederreferanse.
- `main/skills/issuer.php` — profil for den utstedende institusjonen.
- `main/skills/image.php?id=<skill-id>` — ressurs for merkebilde.

De nøyaktige genererte URL-ene avhenger av installasjonens offentlige basissti. Assertionen inneholder en saltet hash av mottakerens e-postadresse i stedet for å publisere e-postadressen i klartekst, og identifiserer utstederen og den tilegnede ferdigheten. PNG-filen for merket kan inkludere assertionen i en `openbadges` iTXt-chunk.

## Valider et utstedt merke

Åpne de vertsbaserte endepunktene for assertion, merkeklasse og utsteder uten en innlogget økt. De skal returnere en konsistent sammenkoblet legitimasjon. Last ned den utstedte PNG-filen via ferdighetens støttede eksportflyt, og kontroller at den innebygde assertionen samsvarer med den vertsbaserte representasjonen. Hvis ferdigheten er tilbakekalt, kontroller at verifiseringen gjenspeiler den tilbakekalte tilstanden.

En PNG-fil med kun visuelt merkedesign **beviser ikke** en gyldig legitimasjon. Ikke forveksle utstedelse av Open Badges 2.0 med urelatert funksjonalitet for sertifikater eller signerte PDF-er.

Se [Administrere ferdigheter](managing-skills.md) og [Verifisering av signert sertifikat](../maintenance/signed-certificate-verification.md). Implementering: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).