# Cursusautomatisering (handmatige triggers)

In het gedeelte **Automatisering** van Cursusrapportage kunnen bevoegde docenten acties configureren voor het begin en het einde van een cursus. In de huidige implementatie van Chamilo 3.1 worden de acties **handmatig geactiveerd**: ga er niet van uit dat ze automatisch op een kalenderdatum of via cron worden uitgevoerd.

## Acties configureren

1. Open een cursus als docent of als een andere gebruiker die cursusrapportage mag beheren.
2. Open **Rapportage** en zoek het gedeelte **Automatisering**.
3. Selecteer de gebeurtenis (**Cursus opent nu** of **Cursus eindigt nu**) en een actietype.
4. Geef het doel op dat voor die actie vereist is en selecteer vervolgens **Actie toevoegen**.
5. Controleer de lijst **Geconfigureerde acties**; verwijder een ongewenste vermelding met de bijbehorende actie **Verwijderen**.

Ondersteunde acties zijn onder meer het publiceren of verbergen van cursusbronnen, het versturen van enquête-uitnodigingen, het afleveren van bestaande certificaten en het wijzigen van de zichtbaarheid van de cursus. De beschikbare bronnen, enquêtes, Gradebook-opties en zichtbaarheidswaarden hangen af van de cursus en van de rechten van de huidige gebruiker.

## De geconfigureerde gebeurtenis uitvoeren

Kies **Cursus opent nu** of **Cursus eindigt nu** en bevestig de bewerking. Controleer het gerapporteerde resultaat. Chamilo houdt voltooide uitvoeringen bij, voorkomt dubbele configuraties en slaat acties over die bij latere uitvoeringen al succesvol zijn voltooid. Een tweede klik mag niet worden beschouwd als een manier om een voltooide actie opnieuw te versturen.

Bereid voor het afleveren van certificaten eerst het betreffende certificaat voor en test het. Controleer voor enquête-uitnodigingen of de enquête is geconfigureerd en of de beoogde cursisten tot de huidige cursus- of sessiecontext behoren.

## Belangrijke beperkingen

- Deze interface biedt **handmatige uitvoering**, geen geplande automatisering.
- Acties werken binnen de huidige cursus-/sessiecontext; test waar van toepassing de toegang en de doelen voor beide contexten.
- Succesvol voltooide acties worden bij latere uitvoeringen niet automatisch herhaald.
- Ten tijde van de feature-PR waren het afleveren van certificaten, wijzigingen in de zichtbaarheid van de cursus en sessiespecifieke uitvoering code-reviewed, maar in die PR niet functioneel geverifieerd. Test ze op uw installatie voordat u er operationeel op vertrouwt.

Zie [Cursusrapporten](course-reports.md) en [Certificaten en vaardigheden](certificates-and-skills.md). Implementatie: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).