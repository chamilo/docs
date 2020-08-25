# De trapsgewijze structuur

Zoals kan worden begrepen door te kijken naar de **&lt;head&gt;** sectie van elke Chamilo-pagina, worden CSS-bestanden als volgt geladen \(we hebben met opzet de domeinnaam vervangen door de markering **\[.\]** voor leesbaarheid, en gebruikte de standaard actieve stijl van app/Resources/public/css/themes/chamilo/\):

Of, kort gezegd, we laden ze in deze volgorde:

1. web/assets/bootstrap/dist/css/bootstrap.min.css
2. web/assets/bootstrap-daterangepicker/daterangepicker-bs3.css
3. web/assets/fontawesome/css/font-awesome.min.css
4. jquery stuff
5. \(minder belangrijke CSS hier\)
6. web/css/base.css \(de kern van de Chamilo-stijl bovenop Bootstrap\)
7. web/css/themes/chamilo/default.css \(aanpassing van het CSS-thema, aanpasbaar in Chamilo\)
8. web/css/themes/chamilo/print.css \(een speciale versie van de stijl voor wanneer u deze afdrukt\)

We zullen hier niet kijken naar de minder belangrijke CSS-bestanden, maar u dient er rekening mee te houden dat ze over het algemeen functie-specifiek zijn, zoals gekozen \(een JS, doorzoekbaar, vervolgkeuzemenu\).

Zoals CSS voorschrijft, zal een CSS die als eerste in de lijst verschijnt eerst worden geladen, en daarna zullen de volgende de vorige instellingen "overschrijven" indien nodig.
