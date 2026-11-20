# Supportbot (beslutsträdsassistent)

**Supportboten** är en konfigurerbar hjälpassistent som bygger på ett fast beslutsträd. Den implementerades i [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) för [ärende #8754](https://github.com/chamilo/chamilo-lms/issues/8754). Det är **inte en generativ AI-chattbot**: administratörer skriver frågor och valbara svar som leder användare till en förklaring, en sida eller ett supportärende.

## Aktivera den

1. Under **Administration > Konfigurationsinställningar > Ärenden** aktiverar du `ticket.ticket_support_bot_enabled` (inaktiverad som standard).
2. Öppna **Administration > Supportbot** och skapa ett **utkast** till beslutsträd. Ange en titel och minst en startnod med alternativ.
3. Definiera frågan eller informationen vid varje nod och koppla alternativen till nästa åtgärd.
4. Publicera ett giltigt träd. Endast ett publicerat träd med en giltig startnod och valbara alternativ är tillgängligt för användare.

Motorn väljer det publicerade trädet för den aktuella åtkomst-URL:en. Tillgängligheten är därför portalavgränsad. En administratör måste ha `ROLE_ADMIN` för att hantera träd.

## Utforma ett supportflöde

Varje alternativ kan utföra en av fyra åtgärder:

| Åtgärd | Resultat |
| --- | --- |
| **Gå till en annan nod** | Fortsätt konversationen vid en annan fråga i samma träd |
| **Öppna en länk** | Länka till en Chamilo-sida med en relativ sökväg på samma webbplats, till exempel `/tickets` |
| **Avsluta konversation** | Markera ärendet som löst och visa valfritt ett avslutande meddelande |
| **Skapa supportärende** | Eskalera konversationen till ärendesystemet |

För eskalering till ärende väljer du ett **standardprojekt för ärenden** och en kategori som tillhör det projektet. Kategorier som kräver en kurs kan inte användas för denna eskalering från supportboten. Det skapade ärendet innehåller användarens transkript från beslutsträdet, så supportpersonalen kan se de val som ledde till eskaleringen.

Redigeraren validerar trädstrukturen före publicering. Versionerna **Publicerad** och **Arkiverad** är skrivskyddade. Använd **Duplicera** för att skapa ett nytt redigerbart utkast. När en ersättning publiceras arkiveras den tidigare publicerade versionen inom samma omfattning. Från listan kan administratörer också importera eller exportera ett träd och granska dess konversationshistorik. Ett publicerat träd måste arkiveras innan det kan tas bort, och ett träd med konversationshistorik kan inte tas bort.

## Importera exempel och granska konversationer

Öppna **Administration > Supportbot** och välj **Importera**. Importdialogrutan erbjuder **Ladda ned JSON-exempel** och **Ladda ned CSV-exempel**. Ladda ned ett exempel, ersätt frågorna och alternativen med dina egna, välj sedan den redigerade `.json`- eller `.csv`-filen och importera den. Varje importerat träd startar som ett **nytt utkast**. Granska det och publicera det uttryckligen när det är klart.

Exemplen kräver inte ett befintligt ärendeprojekt. Om ditt arbetsflöde ska skapa ärenden konfigurerar du det obligatoriska projektet och en giltig kategori efter importen.

I trädlistan använder du **Visa konversationer** för att granska konversationsloggar för ett visst träd, även träd vars konversationsantal är noll. Konversationshistorik förblir avgränsad till den relevanta användaren och portalen. Se [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Så når användare den

När inställningen är aktiverad och portalen har ett giltigt publicerat träd ser inloggade användare en **Supportbot**-kontakt i den dockade chatten. De svarar genom att välja de erbjudna alternativen. Boten kan avsluta konversationen, öppna en sida på samma webbplats eller skapa ett ärende och visa länken till det. Användare kan starta en ny konversation efter att en tidigare har avslutats.

Detta är skilt från **AI-handledaren**, som svarar på öppna lärandefrågor. Supportboten följer endast de vägar och alternativ som administratörer har konfigurerat.

## Felsökning och säkerhet

* **Ingen bot i chatten:** kontrollera ärendeinställningen, att ett träd är publicerat för den aktuella portalen och att dess startnod har alternativ.
* **Kan inte publicera:** granska saknade noder, olösta målnoder och ogiltiga åtgärder i utkastet.
* **Ärendet kan inte skapas:** kontrollera det valda ärendeprojektet och kategorin. Använd inte en ärendekategori som kräver kurs.
* **Äldre konversationer saknas:** administratörer kan granska konversationshistorik från motsvarande träd. Konversationer är knutna till en användare och en åtkomst-URL.

För den relaterade inställningen, se [Ärendeinställningar](platform-settings/ticket-settings.md).