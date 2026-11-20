# Udstedelse og verifikation af Open Badges 2.0

Chamilo 3.1 kan udgive **Open Badges 2.0**-legitimationsoplysninger for erhvervede kompetencer, herunder et badge-billede, der indeholder en indlejret assertion i PNG-metadata. Badgeverifikation bruger offentlige endpoints for badge, assertion og udsteder.

## Konfigurer udstederen og kompetencerne

1. Angiv platformens **institutionsnavn** og en gyldig **e-mailadresse til administratorkontakt**; begge kræves af udstederprofilen.
2. Konfigurer kompetencen med en titel, en beskrivelse og badgekriterier.
3. Vedhæft et gyldigt PNG-badgebillede, hvor det er relevant. Chamilo kan også bruge sit standardbadgebillede, hvis kompetencen ikke har et brugerdefineret aktiv.
4. Tildel eller valider erhvervelsen af kompetencen for den lærende via det normale kompetenceforløb.

Legitimationsoplysningerne afhænger af relationen til den erhvervede kompetence. En assertion for en tilbagekaldt eller ikke længere erhvervet kompetence rapporteres som tilbagekaldt. Kompetence- og badge-ressourcer er afgrænset til den relevante adgangs-URL.

## Offentlige verifikationsdata

Hver udstedelse har en hostet assertion. De tilhørende URL'er udledes fra applikationens offentlige rod og omfatter:

- `main/skills/assertion.php?issue=<issue-id>` — JSON-assertion for en specifik kompetenceudstedelse.
- `main/skills/class.php?id=<skill-id>` — metadata for badgeklassen, herunder kriterier og reference til udstederen.
- `main/skills/issuer.php` — profil for den udstedende institution.
- `main/skills/image.php?id=<skill-id>` — ressource for badgebilledet.

De nøjagtigt genererede URL'er afhænger af installationens offentlige basissti. Assertionen indeholder en saltet hash af modtagerens e-mailadresse i stedet for at offentliggøre e-mailadressen i klartekst og identificerer udstederen og den erhvervede kompetence. Badge-PNG'en kan indeholde assertionen i en `openbadges`-iTXt-chunk.

## Valider et udstedt badge

Åbn de hostede endpoints for assertion, badgeklasse og udsteder uden en indlogget session. De bør returnere en konsistent sammenkædet legitimationsoplysning. Download den udstedte PNG via kompetencens understøttede eksportforløb, og kontrollér, at dens indlejrede assertion stemmer overens med den hostede repræsentation. Hvis kompetencen er tilbagekaldt, skal du kontrollere, at verifikationen afspejler den tilbagekaldte tilstand.

En PNG, der kun indeholder visuel badgegrafik, beviser **ikke** en gyldig legitimationsoplysning. Forveksl ikke udstedelse af Open Badges 2.0 med urelateret certifikat- eller signeret PDF-funktionalitet.

Se [Administration af kompetencer](managing-skills.md) og [Verifikation af signerede certifikater](../maintenance/signed-certificate-verification.md). Implementering: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).