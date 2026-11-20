# Prullenbakken voor oefeningen en leerpaden

Chamilo 3.1 kan verwijderde oefenpogingen en trackinggegevens van leerpaden archiveren, zodat bevoegde docenten deze kunnen herstellen, onderworpen aan de geconfigureerde bewaartermijnen en toegangscontroles. Prullenbakken beschermen trackinggegevens; ze zijn geen vervanging voor databaseback-ups.

## Een oefenpoging herstellen

1. Open de pagina **Rapportage** van de betreffende oefening met de juiste cursus of sessie geselecteerd.
2. Selecteer **Prullenbak** om gearchiveerde pogingen weer te geven.
3. Identificeer de cursist en de poging die u wilt herstellen.
4. Selecteer **Herstellen**, bevestig en vernieuw het rapport om antwoorden en scores te controleren.

U moet toestemming hebben om oefenresultaten te beheren. Herstel kan worden geblokkeerd wanneer de oefening is vergrendeld door Gradebook of wanneer het platform de toegang van docenten tot resultaten beperkt.

## Voortgang van een leerpad herstellen

1. Open het relevante rapportagescherm van het leerpad voor de beoogde cursus/sessie.
2. Open de bijbehorende **Prullenbak**.
3. Selecteer de gearchiveerde voortgang van de cursist en kies **Herstellen**.
4. Controleer de herstelde lesvoortgang en de bijbehorende oefenpogingen.

Wanneer een oefenpoging deel uitmaakt van een nog te herstellen leerpadarchief, herstel dan eerst het leerpadarchief. Individueel herstel wordt bewust geblokkeerd om inconsistente voortgang te voorkomen.

## Bewaartermijn en opschoning (beheerders)

De instelling `tracking.recycle_bin_retention_hours` bepaalt hoe lang archieven in aanmerking blijven komen voor herstel. De oorspronkelijke standaardwaarde is **30 dagen** (720 uur). Bestaande installaties moeten de nieuwe instelling synchroniseren via de settings-upsert-migratie van het project voordat de beheerinterface deze kan weergeven.

Een opschoning vooraf bekijken zonder iets te verwijderen:

```bash
php bin/console chamilo:recycle-bin:purge
```

Definitief verwijderen vereist een expliciete optie:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

De opdracht ondersteunt `--hours` (overschrijving van de bewaartermijn), `--scan-limit`, `--after-lp-id` en `--after-exercise-id` voor gecontroleerde verwerking. Plan deze pas in nadat u het bewaarbeleid en de back-upvoorzieningen hebt gecontroleerd. Er is **geen impliciet automatisch opschoningsschema** louter omdat de functie is ingeschakeld.

Zie [Oefeningen](exercises.md) en [Leerpaden](../adding-content/learning-paths.md). Implementatie: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).