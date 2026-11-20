# Fortrolig indberetning

Chamilo indeholder en valgfri arbejdsgang for **fortrolig indberetning** til at indsende bekymringer om en anden bruger til autoriserede efterforskere. Dette er ikke det almindelige værktøj til supportsager eller et offentligt diskussionsforum.

## Aktivér funktionen

Åbn **Administration > Konfigurationsindstillinger > Sikkerhed** og konfigurer:

| Indstilling | Standard | Formål |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Aktivér arbejdsgangen for fortrolig indberetning |
| `security.confidential_reporting_min_reporters` | `2` | Mindste antal forskellige indberettere (2–10), før en efterforskning bliver synlig |
| `security.confidential_reporting_attachments_enabled` | `true` | Tillad vedhæftning af bevismateriale |
| `security.confidential_reporting_notifications_enabled` | `false` | Vis interne indikatorer for berettigede efterforskninger (ingen e-mails) |

Udrulningen kræver desuden, at serverens kryptering og private lagring til fortrolig indberetning er klar. Chamilo bruger PHP Sodium-kryptografifunktionerne og en privat krypteringsnøgle; **opbevar og sikkerhedskopier denne nøgle sikkert**. Hvis den mistes, kan gemte indberetninger blive ulæselige. Kopier ikke nøglen til et Git-repository. Aktivér ikke funktionen, før det er verificeret, at lagring af den private nøgle og de nødvendige databasemigrationer er operationelle.

## Indsendelse af en indberetning

1. Log ind direkte i Chamilo, og åbn **Fortrolig indberetning** (når den er aktiveret for portalen).
2. Vælg den berørte person, angiv et emne, og beskriv hændelsen.
3. Tilføj bevismateriale, hvis vedhæftninger er aktiveret.
4. Afgør, om efterforskere må se dit **navn og din e-mail** for denne specifikke indberetning. Denne tilladelse kan trækkes tilbage senere.
5. Send indberetningen. Brug **Mine fortrolige indberetninger** til at følge sagen og udveksle beskeder med en efterforsker.

Indberetterens identitet **vises ikke for efterforskere som standard**. Dette er en fortrolighedskontrol, ikke et løfte om absolut anonymitet over for systemets operatører.

## Efterforskningsrettigheder og tærskler

Efterforskninger kræver den særlige tilladelse `welfare:investigate` og en berettiget administrator- eller HR-rolle. En sag bliver først tilgængelig for efterforskning, når det konfigurerede antal **forskellige indberettere** er nået for samme målperson. En efterforsker kan ikke efterforske en indberetning om sig selv. HR-adgang er begrænset til de brugere, som HR-chefen følger.

Efterforskere åbner **Fortrolige efterforskninger** for at se berettigede sager, gennemgå bevismateriale og udveksle beskeder. Sager under tærsklen eller uautoriserede sager eksponeres ikke via efterforsknings-API'et. Administrativ **efterligning** giver ikke adgang til fortrolig indberetning.

## Privatliv og operationel omhu

Indberetninger og vedhæftet bevismateriale indeholder følsomme personoplysninger. Begræns efterforskeres tilladelser, begræns adgang til sikkerhedskopier, fastlæg en passende organisatorisk opbevaringspolitik, og test arbejdsgangen med separate konti for indberetter, målperson og efterforsker. Undgå at kopiere fulde indberetninger til tekniske logfiler eller sagssystemer.

Implementering: [Fortrolig indberetning #9310](https://github.com/chamilo/chamilo-lms/pull/9310).