# LTI 1.3

**LTI** (Learning Tools Interoperability) is een standaard waarmee externe leermiddelen in Chamilo kunnen worden ingebed. Versie 1.3 is de nieuwste en veiligste versie van de standaard.

Dit hulpmiddel is ook bereikbaar vanuit het blok [Platform](../platform/README.md) van het beheerdashboard, als **Externe tools (LTI)**.

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
   * **Tool name** — Een beschrijvende naam
   * **Login URL** — De OIDC-logininitiatie-URL van de externe tool
   * **Redirect URL** — De launch-URL waarnaar de tool na het inloggen terugkeert
   * **Client ID** — Verstrekt door de leverancier van de tool
   * **Public keyset URL (JWKS URL)** — Het JWKS-eindpunt van de tool voor de uitwisseling van beveiligingssleutels
3. Configureer **grade passback** — Of de tool cijfers terug naar Chamilo mag sturen
4. Opslaan

### Als docent

Zodra een LTI-tool door de beheerder is geregistreerd, kunnen docenten deze aan hun cursussen toevoegen:

1. Zoek in de cursus naar de optie om een externe tool toe te voegen
2. Selecteer uit de geregistreerde LTI-tools
3. De tool verschijnt als cursustool op de startpagina

## Beveiliging

LTI 1.3 gebruikt:

* **OAuth 2.0** voor authenticatie
* **JSON Web Tokens (JWT)** voor het ondertekenen van berichten
* **Public/private key pairs** voor verificatie

Dit betekent dat inloggegevens nooit rechtstreeks tussen Chamilo en de externe tool worden gedeeld.

## Grade Passback

LTI-tools kunnen cijfers terugsturen naar Chamilo, die in het cijferboek van de cursus kunnen worden geïntegreerd. Dit wordt per tool tijdens de registratie geconfigureerd.

## Tips

* **Controleer de compatibiliteit van de tool** — Zorg dat de externe tool LTI 1.3 ondersteunt (niet alleen oudere versies)
* **Test in een sandbox** — Test de LTI-integratie in een testcursus voordat u deze in productie gebruikt
* **Bewaak de prestaties** — Externe tools voegen netwerkafhankelijkheden toe. Zorg dat de tool responsief en betrouwbaar is.