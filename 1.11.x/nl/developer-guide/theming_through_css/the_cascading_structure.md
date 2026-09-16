# De trapsgewijze structuur

Zoals kan worden begrepen door te kijken naar de **** sectie van elke Chamilo-pagina, worden CSS-bestanden als volgt geladen (we hebben met opzet de domeinnaam vervangen door de markering **[.]** voor leesbaarheid, en gebruikte de standaard actieve stijl van app/Resources/public/css/themes/chamilo/):

Of, kort gezegd, we laden ze in deze volgorde:

1. web/assets/bootstrap/dist/css/bootstrap.min.css
2. web/assets/bootstrap-daterangepicker/daterangepicker-bs3.css
3. web/assets/fontawesome/css/font-awesome.min.css
4. jquery stuff
5. (minder belangrijke CSS hier)
6. web/css/base.css (de kern van de Chamilo-stijl bovenop Bootstrap)
7. web/css/themes/chamilo/default.css (aanpassing van het CSS-thema, aanpasbaar in Chamilo)
8. web/css/themes/chamilo/print.css (een speciale versie van de stijl voor wanneer u deze afdrukt)

We zullen hier niet kijken naar de minder belangrijke CSS-bestanden, maar u dient er rekening mee te houden dat ze over het algemeen functie-specifiek zijn, zoals gekozen (een JS, doorzoekbaar, vervolgkeuzemenu).

Zoals CSS voorschrijft, zal een CSS die als eerste in de lijst verschijnt eerst worden geladen, en daarna zullen de volgende de vorige instellingen "overschrijven" indien nodig.

## Eerdere versies

Je moet ook weten dat we in sommige gevallen in eerdere versies van Chamilo de @import url () -functie van CSS hebben gebruikt om meer «standaard» CSS te laden. Voor alle stijlen van het type Chamilo zou je bijvoorbeeld in het begin een blok als dit hebben gevonden:

```text
/* Adding default style for the chamilo_X themes */

@import url('../base_chamilo.css');
```

Dit is verwijderd uit stijlen sinds 1.10.0, dus u zou deze niet meer moeten vinden (of gebruiken).

Met al deze informatie in gedachten, zijn we klaar om de volgende sectie aan te pakken: het doel van elk bestand analyseren.
