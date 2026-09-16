# Veiligheid

![](../../../.gitbook/assets/graficos11.png) In deze categorie kunt u een aantal zaken configureren die met beveiliging te maken hebben. De standaardinstellingen zijn ... acceptabel, maar misschien wilt u een paar dingen beperken om deze te verbeteren.

**Type filtering op documentuploads** er zijn twee verschillende filtertypen:

* Blacklist is een manier om bestanden met een specifieke extensie te voorkomen. Hiermee kunt u bijvoorbeeld zeggen dat u niet wilt dat uitvoerbare bestanden worden geüpload \(d.w.z. ".exe" -bestanden\). Dit wordt echter als de zwakste filtermethode beschouwd.
* Witte lijst is een manier om te zeggen "Ik wil alleen bestanden die overeenkomen met mijn geautoriseerde extensies", dus het is echt veilig: geen grappig bestand zal je hier verrassen. Hoofdletter \(hoofdletters of kleine letters\) maakt hier niet uit. Dit is de veiligste optie, maar het is enigszins beperkt.

**Machtigingen voor nieuwe mappen** stelt in welke toegangsrechten nieuwe mappen zullen hebben. Dit is meestal een optie voor op Linux gebaseerde systemen en stelt u in staat de beveiliging tegen piraten te vergroten.

**Waarschuwing**: de standaardwaarde is «0777» na een reeks problemen die zijn gevonden door gebruikers met meer beperkende rechten. Deze waarde garandeert een grotere draagbaarheid, geen grotere beveiliging, en het moet soms worden gewijzigd als het op Linux gebaseerde systeem waarop u het installeert een strikt beveiligingsbeleid vereist. Als dit het geval is, krijg je een serverfout wanneer je probeert een cursus in te voeren die je zojuist hebt gemaakt. Probeer in dat geval deze waarde bij te werken naar 0777, 0775, 0755 en 0750 en maak elke keer een nieuwe cursus. Je kunt de mislukte cursussen achteraf altijd verwijderen.

**OpenID-authenticatie** schakelt de OpenID-functie in. U moet ook het OpenID-veld in de velden voor gebruikersprofilering inschakelen om deze functie de gewenste functionaliteit te bieden. Houd er rekening mee dat het momenteel niet mogelijk is om meerdere identiteiten te combineren, en dat u nog steeds uw volledige identiteits-URL in het OpenID-vak moet plakken. We hopen deze functie in de toekomst te verbeteren.

**Rechten uitbreiden voor coaches** stelt docenten in staat de inhoud van cursussen binnen de sessiecontext te bewerken \(documenten, leertrajecten, oefeningen, koppelingen, enz. Wijzigen\). Zie hoofdstuk Hoofdstuk _Sessiebeheer_.

Cursusinschrijving door gebruiker toestaan door cursusbeheerder stelt de docent in staat gebruikers op zijn cursus te abonneren. Deze optie is standaard ingeschakeld, maar als u dit wilt voorkomen, weet u waar u moet zoeken ...

Single Sign On maakt de verbinding mogelijk zonder in te loggen, op basis van een zusterwebsite die al de login \(een intranet, bijvoorbeeld\) verwerkt. Deze functie vereist een beetje aanpassing en u moet echt een ontwikkelaar inhuren met ervaring in Single Sign On-methodologieën om dat snel te doen. Als je geluk hebt, kan dit echter uit de doos werken. Zorg ervoor dat u de andere instellingen en de main/auth/sso/ controleert voor meer informatie.

Met filtertermen kunt u automatisch alle gegeven woorden filteren op _\*_ in forums en e-mails.

