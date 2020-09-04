# Het dashboard

Op dit moment hebben we het dashboard verwijderd uit de docent/leerling weergave omdat _sommige_ van de grafieken die laten zien dat er _heel_ traag zijn als je veel gegevens hebt, en we denken dat het een slecht idee zou zijn om het aan alle gebruikers te laten zien. We zijn echter begonnen met een kleine wijziging om de platformbeheerder toe te staan nog een grafiek te zien dan de andere beheerders, dus er is een begin voor het aanbrengen van op rollen gebaseerde wijzigingen.

Als je het dashboard volledig wilt ontgrendelen voor alle gebruikers, kun je de rechten ontgrendelen op main/inc/lib/banner.lib.php, rond regel 319, waar je controles hebt op api\_is\_platform\_admin\(\) , api\_is\_drh\(\) en api\_is\_session\_admin\(\). Verwijder deze regel en je krijgt het onverschillig voor studenten en docenten.
