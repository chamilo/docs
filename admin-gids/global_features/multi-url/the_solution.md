# De oplossing

We noemen deze oplossing _multi-URL_. Door multi-URL in te schakelen, schakelt u het volgende mechanisme in:

* je gebruikt dezelfde broncode \(dus minder onderhoud\)
* je gebruikt dezelfde database \(dus minder duplicatie van gegevens\)
* één "master" -portaal \(die niet rechtstreeks door uw klanten wordt gebruikt\) stelt u in staat om "slaaf" -portalen te definiëren
* elke cursus wordt gecreëerd in een “slaaf” portaal, en is alleen zichtbaar binnen dit slavenportaal
* elke gebruiker wordt aangemaakt in een “slaaf” portaal, is alleen zichtbaar binnen dit portaal en heeft alleen toegang tot dit portaal
* elk slaafportaal gebruikt een andere domeinnaam \(of een ander subdomein\)
* elk portaal kan zijn eigen grafische stijl gebruiken
* één \(of meer\) beheerders kunnen aan elk slaafportaal worden toegewezen. Deze beheerder heeft geen toegang tot algemene instellingen, noch tot de gebruikers en cursussen van andere portals
* één sessie kan een globale cursus gebruiken, maar elke sessie bestaat slechts in één en slechts één portaal

Als u dezelfde database gebruikt, profiteert u van deze "extra functies":

* een cursus kan "globaal" worden gemaakt en gebruikt worden via sessies op alle slaafportalen
* één gebruiker \(leerling, leraar of beheerder\) kan door de globale beheerder toegang krijgen tot andere portals

