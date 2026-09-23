# Brugerroller

Chamilo anvender et rollebaseret tilladelsessystem. Hver bruger tildeles en rolle, der afgør, hvad vedkommende kan se og gøre på platformen.

## Roller på platformniveau

Disse roller styrer adgangen til platformdækkende funktioner:

| Rolle |  Beskrivelse |
|------|------------|
| **Learner (Student)** | Standardrollen. Kan tilmelde sig kurser, tilgå læringsindhold, aflevere opgaver og tage øvelser. |
| **Teacher (Trainer)** | Kan oprette og administrere kurser, tilføje indhold, bedømme studerende og se rapporter på kursusniveau. |
| **Sessions Administrator** | Kan oprette og administrere sessioner (dvs. tidsbaserede kursuspakker), tilmelde brugere til sessioner og tildele tutorer. Kan ikke tilgå generelle platformindstillinger. |
| **Human Resources Manager (HRM)** | Kan se sporings- og rapportdata for tildelte brugere. Bruges til ledere, der skal overvåge medarbejderuddannelse, men ikke administrere indhold eller platformen. |
| **Portal Administrator** | Fuld adgang til alle administrationsfunktioner på platformen. Kan administrere brugere, kurser, sessioner, plugins og alle indstillinger. |
| **Global Administrator** | Samme som Portal Administrator, men med adgang på tværs af alle adgangs-URL'er i en multi-URL-opsætning (dvs. multi-tenant) — eller, hvis registreret på en ikke-rod-URL, begrænset til den pågældende URL's gren. Se [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | En særlig rolle for besøgende, der ikke er logget ind. Kan tilgå offentlige kurser og indhold, hvis det er aktiveret. |

## Roller på kursusniveau

Inden for et kursus har brugere specifikke roller:

| Rolle | Beskrivelse |
|------|-------------|
| **Student** | Standardkursusrolle. Kan tilgå indhold, tage øvelser og aflevere opgaver. |
| **Course assistant** | Har begrænsede administrationsrettigheder inden for kurset. Kan hjælpe med at administrere indhold og moderere fora. |
| **Teacher** | Fuld kontrol over kurset: administrere indhold, værktøjer, indstillinger og tilmelding. |

## Roller på sessionsniveau

Inden for en session findes yderligere roller:

| Rolle | Beskrivelse |
|------|-------------|
| **Session tutor** | Overvåger alle kurser inden for en session. Kan se sporing på tværs af alle kurser i sessionen. |
| **Course tutor** | Underviser i et specifikt kursus inden for en session. Kan administrere indhold og følge lærende for det pågældende kursus i den pågældende session. |

Bemærk: Denne rolle hed "coach" i Chamilo-versioner før 3.0. Fra og med Chamilo 3.0 er "coach" erstattet af "tutor" overalt i platformens grænseflade og dokumentation — en tutor er en person, der hjælper lærende gennem et kursus, ikke en personlig coach. De underliggende indstillingsnavne i `Configuration settings` indeholder stadig "coach" af hensyn til bagudkompatibilitet (for eksempel `add_users_by_coach`), men deres etiketter lyder nu "tutor".

## Tildeling af roller

Når du opretter eller redigerer en brugerkonto i administrationspanelet, vælger du vedkommendes rolle på platformniveau. Kursus- og sessionsroller tildeles, når brugere tilmeldes kurser eller sessioner.

## Rollehierarki

Roller med højere privilegier arver evnerne fra roller med lavere privilegier:

* En administrator kan gøre alt, hvad en underviser kan
* En underviser kan gøre alt, hvad en studerende kan
* Roller på sessionsniveau (tutor) giver yderligere evner kun inden for den tildelte session

## Tips

* **Anvend princippet om mindst privilegium** — Tildel brugere den minimale rolle, de har brug for til at udføre deres opgaver
* **Brug Sessions Administrators til delegeret administration** — Hvis du har medarbejdere, der skal administrere uddannelsessessioner, men ikke hele platformen, så giv dem rollen Sessions Administrator i stedet for fuld administratoradgang
* **Brug HRM til ledere** — Human Resources Managers kan overvåge uddannelsesfremskridt uden at have adgang til at ændre kurser eller platformindstillinger
* **Oprettelse af roller** — Chamilo 3.x har den interne struktur klar til oprettelse af nye roller, men funktionen mangler mere testning til bred udgivelse. Den kan aktiveres via [Official providers of Chamilo](https://chamilo.org/providers).