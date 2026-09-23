# IMS/LTI-klient

IMS/LTI-klient <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI-klient" data-size="line"> låter dig starta ett externt verktyg eller en innehållsleverantör inifrån din kurs med hjälp av LTI-standarden (versionerna 1.1 och 1.3) — till exempel en förläggares interaktiva lärobok, ett specialiserat simuleringsverktyg eller en annan plattform som stöder LTI. Chamilo agerar som den startande plattformen; den externa tjänsten är ”verktyget”.

## Åtkomst till verktyget

När det är aktiverat visas knappen **Konfigurera externa verktyg** i kursens **Inställningar** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Inställningar" data-size="line">. Därifrån kan du antingen:

* **Lägg till ett nytt externt verktyg** — Registrera ett själv: namn, start-URL, LTI-version och de uppgifter den externa tjänsten gav dig (klient-ID/nycklar för LTI 1.3, eller en konsumentnyckel och hemlighet för LTI 1.1)
* **Lägg till ett befintligt globalt verktyg** — Om din administratör redan har registrerat ett plattformsövergripande verktyg, lägg till det i din kurs i stället för att skapa en egen anslutning

När det har lagts till visas verktyget som ett vanligt verktyg/genväg på kursens startsida.

## Vad du kan konfigurera

För ett verktyg du registrerat själv: om det öppnas i en iframe eller ett nytt fönster, om lärandens namn, e-postadress och bild delas med den externa tjänsten, anpassade startparametrar och (för LTI 1.3) stöd för Deep Linking. Om verktyget stöder Assignment and Grades Service kan du också skapa en kopplad kolumn i betygsboken så att poäng som rapporteras tillbaka matas in i Chamilo-betygsboken.

För ett verktyg som lagts till från en plattformsövergripande ”global” definition kan du bara justera dessa presentations- och integritetsalternativ på kursnivå — själva anslutningsuppgifterna tillhör den som registrerade basverktyget (vanligtvis din administratör).

## Tips

* **Hämta uppgifter från verktygsleverantören först** — Du behöver start-URL och antingen LTI 1.3-klient-/nyckeluppgifter eller en LTI 1.1-konsumentnyckel och hemlighet innan du kan registrera ett nytt verktyg
* **Var medveten om vad du delar** — Aktivera endast delning av lärandens namn, e-postadress eller bild med en extern tjänst om verktyget faktiskt behöver det
* **Fråga din administratör om globala verktyg** — Om samma externa verktyg används i många kurser undviker en plattformsövergripande registrering att varje lärare konfigurerar sin egen anslutning separat