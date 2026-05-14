# LTI 1.3

**LTI** (Learning Tools Interoperability) is een standaard die het mogelijk maakt om externe leermiddelen in Chamilo te integreren. Versie 1.3 is de nieuwste en meest veilige versie van deze standaard.

## Wat LTI mogelijk maakt

Met LTI kunt u externe tools integreren in Chamilo-cursussen. Voorbeelden:

- Interactieve simulaties
- Gespecialiseerde beoordelingshulpmiddelen
- Hulpmiddelen voor het maken van inhoud
- Virtuele laboratoria
- Inhoudsbibliotheken van derden

De externe tool verschijnt naadloos binnen de Chamilo-interface.

## Een LTI-tool configureren

### Als beheerder

1. Navigeer naar de LTI-instellingen in het beheerderspaneel
2. **Registreer de externe tool** door het volgende op te geven:
   - **Toolnaam** — Een beschrijvende naam
   - **Login-URL** — De OIDC-login initiatie-URL van de externe tool
   - **Redirect-URL** — De start-URL waarnaar de tool terugkeert na inloggen
   - **Client-ID** — Verstrekt door de leverancier van de tool
   - **Public keyset URL (JWKS URL)** — Het JWKS-eindpunt van de tool voor uitwisseling van beveiligingssleutels
3. Configureer **terugkoppeling van cijfers** — Of de tool cijfers terug kan sturen naar Chamilo
4. Opslaan

### Als docent

Zodra een LTI-tool door de beheerder is geregistreerd, kunnen docenten deze toevoegen aan hun cursussen:

1. Zoek in de cursus naar de optie om een externe tool toe te voegen
2. Selecteer uit de geregistreerde LTI-tools
3. De tool verschijnt als een cursustool op de startpagina

## Beveiliging

LTI 1.3 maakt gebruik van:

- **OAuth 2.0** voor authenticatie
- **JSON Web Tokens (JWT)** voor het ondertekenen van berichten
- **Publieke/private sleutelparen** voor verificatie

Dit betekent dat inloggegevens nooit direct worden gedeeld tussen Chamilo en de externe tool.

## Terugkoppeling van cijfers

LTI-tools kunnen cijfers terugsturen naar Chamilo, die kunnen worden geïntegreerd in het cijferboek van de cursus. Dit wordt per tool geconfigureerd tijdens de registratie.

## Tips

- **Controleer compatibiliteit van de tool** — Zorg ervoor dat de externe tool LTI 1.3 ondersteunt (niet alleen oudere versies)
- **Test in een sandbox** — Test de LTI-integratie in een testcursus voordat u deze in productie gebruikt
- **Monitor prestaties** — Externe tools voegen netwerkafhankelijkheden toe. Zorg ervoor dat de tool responsief en betrouwbaar is.