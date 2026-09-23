# Användarprofilering

Chamilo låter dig definiera anpassade profilfält (extrafält) för att samla in ytterligare information om användare utöver standarduppgifter som namn, e-post och roll.

## Extra profilfält

![Listan över extra profilfält som visar anpassade fält med namn, typ och synlighetsinställningar](../../.gitbook/assets/admin-extra-fields-list.png)

Extrafält gör det möjligt att lagra metadata som är specifik för din organisation, till exempel:

* Anställnings-ID
* Avdelning
* Befattning
* Plats/kontor
* Telefonnummer
* Anpassade identifierare

## Skapa extrafält

1. Från administrationspanelen, gå till **Extra fields** eller **Profile fields**
2. Klicka på **Add**
3. Konfigurera fältet:
   * **Name** — Fälttiteln som visas för användare
   * **Description** — Valfri beskrivning
   * **Helper text** — Visas under fältet i alla formulär som inkluderar det
   * **Field type** — Text, rullgardinslista, datum, kryssruta osv.
   * **Field label** — Fältets interna namn, för plugin-integration 
   * **Possible values** — Om fältet är en väljare mellan dessa värden 
   * **Default value** — Ett valfritt standardvärde
   * **Visible to self** — Om fältet är synligt på användarprofilen för användaren själv
   * **Visible to others** — Om fältet är synligt för andra användare på plattformen
   * **Can change** — Om användaren kan ändra sitt eget fält själv (eller om endast administratörer kan)
   * **Filter** — Om detta är ett fält av väljartyp, om det ska ingå som filter på administrativa sidor (t.ex. för att anmäla användare till kurser eller sessioner)
   * **Order** — Om du vill styra visningsordningen för fälten måste du ge varje fält en numerisk ordning
   * **Remove on anonymization** — Viktigt för integritetsregler och lagar: Om användaren anonymiseras men inte raderas, ska detta fält betraktas som en möjlig bärare av personuppgifter? 
4. Spara

## Fälttyper

Motorn för extrafält stöder ett brett spektrum av inmatningstyper. Vanliga typer är:

| Type | Description |
|------|-------------|
| **Text** | Enradig textinmatning |
| **Textarea** | Flerradig textinmatning |
| **Radio** | En radiogrupp med ett val |
| **Dropdown / Dropdown multiple** | En lista med fördefinierade alternativ (enkel- eller flerval) |
| **Double select** | Två beroende rullgardinslistor (t.ex. land → stad) |
| **Checkbox** | En ja/nej-växel |
| **Date / Date and time** | Datum- eller datum+tid-väljare |
| **Integer** | Numerisk inmatning |
| **Tag** | Flera fria taggvärden |
| **File** | Fält för filuppladdning |
| **Video URL** | En URL som pekar på en video |
| **Mobile phone number** | Ett formaterat telefonnummerfält |
| **Timezone** | En tidszonsväljare |
| **Social profile** | En länk till en profil i ett socialt nätverk |
| **Divider** | En visuell avgränsare i formuläret (inget värde) |

Den exakta uppsättningen användbara typer beror på Chamilo-versionen; rullgardinslistan för fälttyp på administrationssidan **Extra fields** är den auktoritativa källan.

## Använda extrafält

Extrafält visas:

* I formulären för att skapa (om synligt för användaren själv) och redigera användare
* På användarprofilsidor (om synligt för användaren själv)
* Vid användarimport (du kan inkludera extrafältsvärden i CSV-importer)
* I exporter och rapporter (filtrera eller gruppera efter extrafältsvärden)

## Tips

* **Planera innan du skapar** — Definiera vilken information du behöver innan du skapar fält, eftersom det kan vara problematiskt att ändra fälttyper efter att data har lagts in
* **Använd rullgardinslistor för konsekvens** — När ett fält har en känd uppsättning möjliga värden, använd en rullgardinslista i stället för fri text för att säkerställa datakonsekvens
* **Använd för rapportering** — Extrafält är användbara för att filtrera rapporter (t.ex. "visa alla användare på avdelning X som har slutfört utbildning Y")