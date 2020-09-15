# Installatie

Om de multi-URL-modus te configureren, heeft u nodig

- toegang tot de configuratie van uw webserver
- toegang tot de definitie van uw domeinnamen
- toegang tot het Chamilo-configuratiebestand

Het installatieproces is als volgt

- update *main/inc/conf/configuration.php* door de commentaarteken vóór de regel te verwijderen: *$_configuration['multiple_access_urls'] = true;*
- voeg ServerAlias-richtlijnen toe in uw Apache's VirtualHost (zie hieronder)
- definieer domein- of subdomeinnamen (DNS) zodat ze naar uw server verwijzen
- [verouderd] voeg regel “1,1” toe aan uw *access_url_rel_user* tafel (deze regel is niet meer nodig vanaf Chamilo LMS 1.9).
- ga naar de Chamilo admin-pagina en volg de link *Multiple URL portals*
- herdefinieer uw hoofd-URL (vervang *localhost*) en voeg de gewenste subportalen toe, voeg vervolgens een lokale beheerder toe en schakel deze in voor elk ervan

![](../../../.gitbook/assets/graficos97%20%285%29.png)Afbeelding: Administratie - Multi-URL's

Voor twee verschillende multi-URL's en één administratieve URL, gebaseerd op het domein *campusabc.com*, zou de VirtualHost er ongeveer zo uitzien:

```text
ServerAdmin webmaster@campusabc.com
DocumentRoot /var/www/campusabc.com /
ServerName admin.campusabc.com
ServerAlias pepsi.campusabc.com
ServerAlias cocacola.campusabc.com
```

Vergeet niet altijd te bedenken dat uw eerste portaal een generiek, administratief portaal zal zijn. Gebruik het bij voorkeur niet voor directe toegang door studenten. Declareer zoiets als admin. [Domeinnaam] als de eerste host, en declareer vervolgens de URL's die je echt gaat gebruiken.
