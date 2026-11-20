# Plattegronden van vestigingen en zaalkaarten

Chamilo 3.1 kan een plattegrondafbeelding aan een vestiging koppelen en zaalposities op die afbeelding markeren met interactieve polygonen. De functie helpt cursisten toegewezen zalen te vinden; het is **geen** geografische GPS-kaart.

## Een plattegrond aan een vestiging koppelen

1. Open het beheergebied voor **Vestigingen** en bewerk de beoogde vestiging.
2. Zoek het paneel **Plattegrond**.
3. Kies of upload de afbeelding en selecteer **Plattegrond koppelen** (of **Plattegrond wijzigen** als er al een bestaat).
4. Sla de wijzigingen van de vestiging op of bevestig ze indien nodig, en controleer vervolgens of de plattegrondafbeelding wordt geladen.

Als een plattegrond niet langer geldig is, gebruik dan **Plattegrond verwijderen** nadat u hebt gecontroleerd welke zalen ernaar verwijzen. Upload alleen vertrouwde inhoud en volg de rechten van het beheerscherm voor vestigingen.

## Zalen omlijnen

1. Bewerk een zaal die aan die vestiging is toegewezen.
2. Zoek **Zaal op plattegrond** in het zaalformulier.
3. Gebruik het polygoongereedschap om de zaalgrens te tekenen. Gebruik **Bewerken** om hoekpunten aan te passen; alle punten moeten binnen de afbeelding blijven.
4. Selecteer **Zaalgebied opslaan** en sla vervolgens het zaalformulier op om de wijzigingen te bewaren.
5. Open een zaalviewer om de juiste positie te bevestigen. Gebruik **Zaalgebied wissen** als de toewijzing moet worden verwijderd.

Een zaal heeft tegelijk één bewerkbaar polygoon. De zaaltoewijzing staat los van de afbeelding op vestigingsniveau, dus het bijwerken van de afbeelding kan vereisen dat bestaande zaalgrenzen worden gecontroleerd.

## Waar kaarten verschijnen

Geautoriseerde gebruikers kunnen zaalplattegronden bekijken wanneer zalen worden geselecteerd of weergegeven in cursusinformatie, agenda-afspraken en aanwezigheidsgerelateerde stromen. Controleer de zichtbaarheid met de rollen die de informatie daadwerkelijk zullen bekijken, met name studenten en sessiedeelnemers.

Toegangsrechten voor vestigingen en zalen gelden ook voor plattegrondbronnen. Controleer in multi-URL-installaties de juiste isolatie van portaal/vestiging voordat u kaarten publiceert.

Zie [Zalen beheren](managing-rooms.md) en [Zoeker voor zaalbeschikbaarheid](room-availability-finder.md). Implementaties: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).