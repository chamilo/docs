# Konfidentiell rapportering

Chamilo innehåller ett valfritt arbetsflöde för **konfidentiell rapportering** för att lämna in oro kring en annan användare till behöriga utredare. Detta är inte det vanliga supportärendeverktyget eller ett offentligt diskussionsforum.

## Aktivera funktionen

Öppna **Administration > Konfigurationsinställningar > Säkerhet** och konfigurera:

| Inställning | Standard | Syfte |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Aktivera arbetsflödet för konfidentiell rapportering |
| `security.confidential_reporting_min_reporters` | `2` | Minsta antal distinkta rapportörer (2–10) innan en utredning blir synlig |
| `security.confidential_reporting_attachments_enabled` | `true` | Tillåt bevisbilagor |
| `security.confidential_reporting_notifications_enabled` | `false` | Visa interna indikatorer för berättigade utredningar (inga e-postmeddelanden) |

Driftsättningen kräver också att serverns kryptering och privata lagring för konfidentiell rapportering är redo. Chamilo använder PHP:s kryptografiska Sodium-funktioner och en privat krypteringsnyckel; **behåll och säkerhetskopiera den nyckeln på ett säkert sätt**. Om den förloras kan lagrade rapporter bli oläsbara. Kopiera inte nyckeln till ett Git-arkiv. Aktivera inte funktionen innan du har verifierat att lagringen av den privata nyckeln och de nödvändiga databasmigreringarna fungerar.

## Lämna in en rapport

1. Logga in direkt i Chamilo och öppna **Konfidentiell rapportering** (när den är aktiverad för portalen).
2. Välj den berörda personen, ange ett ämne och beskriv händelsen.
3. Lägg till bevis om bilagor är aktiverade.
4. Bestäm om utredare får se ditt **namn och din e-postadress** för just denna rapport. Detta tillstånd kan återkallas senare.
5. Skicka rapporten. Använd **Mina konfidentiella rapporter** för att följa ärendet och utbyta meddelanden med en utredare.

Rapportörens identitet **visas inte för utredare som standard**. Detta är en konfidentialitetskontroll, inte ett löfte om absolut anonymitet gentemot systemets operatörer.

## Utredningsbehörigheter och tröskelvärden

Utredningar kräver den särskilda behörigheten `welfare:investigate` och en berättigad administratörs- eller HR-roll. Ett ärende blir tillgängligt för utredning först när det konfigurerade antalet **distinkta rapportörer** har uppnåtts för samma målperson. En utredare kan inte utreda en rapport om sig själv. HR-åtkomst är begränsad till de användare som HR-ansvarig följer.

Utredare öppnar **Konfidentiella utredningar** för att visa berättigade ärenden, granska bevis och utbyta meddelanden. Ärenden under tröskelvärdet eller obehöriga ärenden exponeras inte via utrednings-API:et. Administrativ **personifiering** ger inte åtkomst till konfidentiell rapportering.

## Integritet och operativ omsorg

Rapporter och bifogade bevis innehåller känsliga personuppgifter. Begränsa utredarbehörigheter, begränsa åtkomst till säkerhetskopior, fastställ en lämplig organisatorisk lagringspolicy och testa arbetsflödet med separata konton för rapportör, målperson och utredare. Undvik att kopiera fullständiga rapporter till tekniska loggar eller ärendehanteringssystem.

Implementering: [Konfidentiell rapportering #9310](https://github.com/chamilo/chamilo-lms/pull/9310).