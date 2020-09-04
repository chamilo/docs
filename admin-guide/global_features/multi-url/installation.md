# Installatie

Om de multi-URL-modus te configureren, heeft u nodig

* toegang tot de configuratie van uw webserver
* toegang tot de definitie van uw domeinnamen
* toegang tot het Chamilo-configuratiebestand

Het installatieproces is als volgt

* update _main/inc/conf/configuration.php_ door de commentaarteken vóór de regel te verwijderen: _$\_configuration\['multiple\_access\_urls'\] = true;_
* voeg ServerAlias-richtlijnen toe in uw Apache's VirtualHost \(zie hieronder\)
* definieer domein- of subdomeinnamen \(DNS\) zodat ze naar uw server verwijzen
* \[verouderd\] voeg regel “1,1” toe aan uw _access\_url\_rel\_user_ tafel \(deze regel is niet meer nodig vanaf Chamilo LMS 1.9\).
* ga naar de Chamilo admin-pagina en volg de link _Multiple URL portals_
* herdefinieer uw hoofd-URL \(vervang _localhost_\) en voeg de gewenste subportalen toe, voeg vervolgens een lokale beheerder toe en schakel deze in voor elk ervan

![](../../../.gitbook/assets/graficos97%20%285%29.png)

Afbeelding 83: Administratie - Multi-URL's

Voor twee verschillende multi-URL's en één administratieve URL, gebaseerd op het domein _campusabc.com_, zou de VirtualHost er ongeveer zo uitzien:

```
ServerAdmin webmaster@campusabc.com
DocumentRoot /var/www/campusabc.com /
ServerName admin.campusabc.com
ServerAlias pepsi.campusabc.com
ServerAlias cocacola.campusabc.com
```

## andere hostinstellingen hier

Vergeet niet altijd te bedenken dat uw eerste portaal een generiek, administratief portaal zal zijn. Gebruik het bij voorkeur niet voor directe toegang door studenten. Declareer zoiets als admin. \[Domeinnaam\] als de eerste host, en declareer vervolgens de URL's die je echt gaat gebruiken.
