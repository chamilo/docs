# Sider

Sider er Chamilos innebygde, CMS-lignende verktøy for innholdsblokkene som utgjør portalens offentlige områder — startsiden, bunnteksten, navigasjonsmenyene og tilsvarende plasseringer — uten at du trenger å endre en malfil.

## Tilgang til Sider

Fra administrasjonspanelet klikker du **Plattform > Sider**.

## Slik fungerer Sider

Hver side har:

* **Tittel** og riktekst **innhold**
* En **slug**, som genereres automatisk fra tittelen
* **Aktivert** — om siden er synlig for øyeblikket
* **Posisjon** — dra-og-slipp-rekkefølge innenfor kategorien
* **Språk** — innholdet er per språk: samme plassering kan inneholde én side per språk, og nettstedet faller tilbake til plattformens standardspråk hvis det ikke finnes en side for en besøkendes språk
* En **kategori** — dette avgjør *hvor* siden vises (for eksempel `index`, `home`, `footer_public` eller `menu_links`); Chamilo oppretter kategoriene den trenger automatisk

På en installasjon med flere URL-er (flere portaler) er sider også avgrenset per tilgangs-URL, slik at hver portal administrerer sitt eget innhold.

## Introsiden for registrering

**Plattform > Angi registreringssiden** er en snarvei inn i det samme Sider-systemet for én bestemt plassering: den innledende teksten som vises over det offentlige påmeldingsskjemaet. Den er begrenset til portaladministratorer. Når du klikker, vil den enten:

* Åpne den eksisterende introsiden for redigering, hvis det allerede finnes én for din tilgangs-URL og ditt språk, eller
* Opprette plasseringen der og da og ta deg rett til å lage innholdet

Det du lagrer her vises som en infoboks rett over registreringsskjemaet — et naturlig sted for instruksjoner, vilkår som gjelder din organisasjon, eller kontekst som potensielle brukere bør lese før de registrerer seg. La den være deaktivert (eller aldri opprett den) for å vise det vanlige registreringsskjemaet uten introtekst.