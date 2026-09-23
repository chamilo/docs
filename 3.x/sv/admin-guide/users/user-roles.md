# Användarroller

Chamilo använder ett rollbaserat behörighetssystem. Varje användare tilldelas en roll som avgör vad de kan se och göra på plattformen.

## Plattformsroller

Dessa roller styr åtkomst till plattformsövergripande funktioner:

| Roll |  Beskrivning |
|------|------------|
| **Learner (Student)** | Standardrollen. Kan anmäla sig till kurser, komma åt lärinnehåll, lämna in uppgifter och göra övningar. |
| **Teacher (Trainer)** | Kan skapa och hantera kurser, lägga till innehåll, betygsätta studenter och visa kursrapporter. |
| **Sessions Administrator** | Kan skapa och hantera sessioner (dvs. tidsbaserade kurspaket), anmäla användare till sessioner och tilldela handledare. Kan inte komma åt allmänna plattformsinställningar. |
| **Human Resources Manager (HRM)** | Kan visa spårnings- och rapportdata för tilldelade användare. Används för chefer som behöver följa medarbetares utbildning men inte hantera innehåll eller plattformen. |
| **Portal Administrator** | Full åtkomst till alla administrationsfunktioner på plattformen. Kan hantera användare, kurser, sessioner, plugins och alla inställningar. |
| **Global Administrator** | Samma som Portal Administrator men med åtkomst över alla åtkomst-URL:er i en multi-URL-miljö (dvs. multi-tenant) — eller, om registrerad på en icke-rot-URL, begränsad till just den URL:ens gren. Se [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | En särskild roll för besökare som inte är inloggade. Kan komma åt publika kurser och innehåll om det är aktiverat. |

## Kursroller

Inom en kurs har användare specifika roller:

| Roll | Beskrivning |
|------|-------------|
| **Student** | Standardroll i kursen. Kan komma åt innehåll, göra övningar och lämna in uppgifter. |
| **Course assistant** | Har begränsade hanteringsbehörigheter inom kursen. Kan hjälpa till att hantera innehåll och moderera forum. |
| **Teacher** | Full kontroll över kursen: hantera innehåll, verktyg, inställningar och anmälan. |

## Sessionsroller

Inom en session finns ytterligare roller:

| Roll | Beskrivning |
|------|-------------|
| **Session tutor** | Övervakar alla kurser inom en session. Kan visa spårning över alla kurser i sessionen. |
| **Course tutor** | Undervisar en specifik kurs inom en session. Kan hantera innehåll och följa lärande för den kursen i den sessionen. |

Obs: Denna roll kallades "coach" i Chamilo-versioner före 3.0. Från och med Chamilo 3.0 har "coach" ersatts av "tutor" överallt i plattformens gränssnitt och dokumentation — en tutor är en person som hjälper lärande genom en kurs, inte en personlig coach. De underliggande inställningsnamnen i `Configuration settings` innehåller fortfarande "coach" för bakåtkompatibilitet (till exempel `add_users_by_coach`), men deras etiketter lyder nu "tutor".

## Tilldela roller

När du skapar eller redigerar ett användarkonto i administrationspanelen väljer du deras plattformsroll. Kurs- och sessionsroller tilldelas när användare anmäls till kurser eller sessioner.

## Rollhierarki

Roller med högre behörighet ärver förmågorna hos roller med lägre behörighet:

* En administratör kan göra allt som en lärare kan göra
* En lärare kan göra allt som en student kan göra
* Sessionsroller (tutor) ger ytterligare förmågor endast inom den tilldelade sessionen

## Tips

* **Använd principen om minsta behörighet** — Tilldela användare den minsta roll de behöver för att utföra sina uppgifter
* **Använd Sessions Administrators för delegerad hantering** — Om du har personal som behöver hantera utbildningssessioner men inte hela plattformen, ge dem rollen Sessions Administrator i stället för full administratörsåtkomst
* **Använd HRM för chefer** — Human Resources Managers kan följa utbildningsframsteg utan att ha åtkomst att ändra kurser eller plattformsinställningar
* **Skapande av roller** — Chamilo 3.x har den interna strukturen redo för skapande av nya roller, men funktionen saknar mer testning för bred lansering. Den kan aktiveras via [Official providers of Chamilo](https://chamilo.org/providers).