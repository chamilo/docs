# Volledig herstel

Deze herstelprocedure is een paar keer getest, maar uw configuratie kan aanzienlijk afwijken van dit voorbeeld. Hier zullen we een lokale installatiecasus gebruiken, met behulp van PhpMyAdmin en een back-up van de Chamilo-hoofdmap. Voor een externe server is SSH/SFTP of FTP-toegang tot de server vereist.

Dit herstel kan nodig zijn nadat u per ongeluk enkele of alle Chamilo-databases heeft verwijderd, of nadat er ernstige schade is toegebracht aan uw server door een cracker.

1. Kopieer het back-upbestand naar de root directory \(/var/www\) en pak het uit. Door dezelfde mappenstructuur te behouden, kunt u een deel van het vooraf geconfigureerde toegangspad tot bepaalde gegevens niet verliezen.
2. Importeer de databaseback-up vanuit PhpMyAdmin \(na het verwijderen van de vorige database als deze nog aanwezig was\).
3. Maak verbinding met uw site en controleer of alles in orde is.

De back-up bevat gebruikers, wachtwoorden, cursussen, leertrajecten en alle bronnen van uw portal.

We raden actief aan om minstens één keer per dag automatische back-ups te maken op **een andere** server voor kritieke Chamilo-servers.
