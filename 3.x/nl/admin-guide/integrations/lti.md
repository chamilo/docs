# LTI 1.3

**LTI** (Learning Tools Interoperability) is een standaard waarmee externe leertools in Chamilo kunnen worden ingebed. Versie 1.3 is de nieuwste en meest veilige versie van de standaard.

Deze tool is ook bereikbaar vanuit het blok [Platform](../platform/README.md) van het beheerdersdashboard, als **Externe tools (LTI)**.

## Wat LTI mogelijk maakt

Met LTI kunt u externe tools inbedden in Chamilo-cursussen. Voorbeelden:

* Interactieve simulaties
* Gespecialiseerde beoordelingstools
* Tools voor het maken van inhoud
* Virtuele laboratoria
* Inhoudsbibliotheken van derden

De externe tool verschijnt naadloos in de Chamilo-interface.

## Een LTI-tool configureren

### Als beheerder

1. Ga naar de LTI-instellingen in het beheerpaneel
2. **Registreer de externe tool** door het volgende op te geven:
   * **Toolnaam** — Een beschrijvende naam
   * **Login-URL** — De OIDC-URL voor het starten van de aanmelding van de externe tool
   * **Redirect-URL** — De start-URL waarnaar de tool na aanmelding terugkeert
   * **Client-ID** — Verstrekt door de leverancier van de tool
   * **URL van de openbare sleutelset (JWKS-URL)** — Het JWKS-eindpunt van de tool voor de uitwisseling van beveiligingssleutels
3. Configureer **cijferterugkoppeling** — Of de tool cijfers kan terugsturen naar Chamilo
4. Opslaan

### Als docent

Zodra de plug-in **ImsLti** is ingeschakeld, kunnen docenten met rechten voor het bewerken van cursussen externe tools in hun cursus configureren:

1. Open de configuratie **Externe tools (LTI)** van de cursus. Het cursusspecifieke formulier ondersteunt zowel **LTI 1.3** als verouderde **LTI 1.0/1.1**-integraties; kies de versie die overeenkomt met de toolprovider.
2. Voeg een tool toe of selecteer een herbruikbare tool die door uw beheerder beschikbaar is gesteld. Voer voor LTI 1.3 de start- en authenticatiegegevens van de provider in; het formulier ondersteunt een URL van de openbare sleutelset of een RSA-sleutel en optioneel Assignment and Grade Services (AGS) en Names and Role Provisioning Services (NRPS).
3. Sla de tool op. Afhankelijk van de deep-linkingconfiguratie voegt Chamilo de bijbehorende cursussnelkoppeling toe. Reeds toegevoegde tools worden apart weergegeven van beschikbare globale tools.
4. Gebruik de actie **Bewerken** in dezelfde cursuscontext om een bestaande tool te wijzigen. De configuratie controleert of de tool bij de cursus hoort; een tool die aan een andere cursus is gekoppeld, kan niet worden bewerkt door het ID ervan op te geven.

Het formulier behoudt de cursuscontext bij terugkeer van toevoeg-/bewerkacties en toont validatiefeedback op de configuratiepagina.

## Beveiliging

LTI 1.3 gebruikt:

* **OAuth 2.0** voor authenticatie
* **JSON Web Tokens (JWT)** voor het ondertekenen van berichten
* **Openbare/privé-sleutelparen** voor verificatie

Dit betekent dat inloggegevens nooit rechtstreeks worden gedeeld tussen Chamilo en de externe tool.

## Cijferterugkoppeling en beoordelingen

LTI-tools kunnen cijfers terugsturen naar Chamilo, die kunnen worden geïntegreerd in de **Beoordelingen** (Gradebook) van de cursus. Configureer voor LTI 1.3 de optie **Assignment and Grade Services (AGS)** van de provider bij het aanmaken of bewerken van de externe tool. Er moet al een beoordeling voor de cursus bestaan als u deze wilt koppelen aan een Gradebook-evaluatie.

De actie **Toevoegen aan Gradebook** van de plug-in opent het moderne Gradebook-overzicht in de **huidige cursus-/sessiecontext**. Er wordt een evaluatieformulier weergegeven met een vervolgkeuzelijst **Tool** in plaats van het eerdere verouderde evaluatieformulier. Selecteer een beschikbare LTI-tool, controleer de titel en de beoordelingswaarden en sla op.

* Een tool wordt alleen aangeboden wanneer deze is toegewezen aan de huidige cursus-/sessiecontext en nog niet is gekoppeld aan een Gradebook-evaluatie.
* Een Gradebook-evaluatie kan aan een LTI-tool worden gekoppeld **bij het aanmaken** van de evaluatie, niet door een bestaande evaluatie naar een andere tool om te schakelen.
* Als er geen geschikte tools worden gevonden, biedt het formulier geen niet-gerelateerde tool uit een andere cursus aan.

Zie [Beoordelingen](../../teacher-guide/assessing-learners/gradebook.md) voor de normale beoordelingsworkflow. De correcties voor de cursuscontext en de Gradebook-integratie worden bijgehouden in [PR #9196](https://github.com/chamilo/chamilo-lms/pull/9196) en [PR #9197](https://github.com/chamilo/chamilo-lms/pull/9197).

## Tips

* **Controleer de compatibiliteit van de tool** — Geef de voorkeur aan LTI 1.3 voor nieuwe integraties; Chamilo biedt ook verouderde LTI 1.0/1.1-configuratie wanneer een tool dit vereist.
* **Test in een sandbox** — Test de LTI-integratie in een testcursus voordat u deze in productie gebruikt
* **Bewaak de prestaties** — Externe tools voegen netwerkafhankelijkheden toe. Zorg ervoor dat de tool responsief en betrouwbaar is.