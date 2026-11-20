# Hot Potatoes -aktiviteetit

Chamilo 3.1 tukee Hot Potatoes -HTML-aktiviteettien tuontia nykyaikaiseen Harjoitukset-työkaluun sekä yksittäisten aktiviteettien käyttöä oppimispoluissa.

## Tuo aktiviteetti

1. Avaa kurssin **Harjoitukset**-työkalu ja siirry kohtaan **Hot Potatoes**.
2. Kohdassa **Tuo Hot Potatoes** valitse Hot Potatoes -**ZIP**-paketti tai erillinen **HTML**-vienti.
3. Jos aktiviteetti riippuu linkitetyistä kuvista, mediasta tai muista tiedostoista, sisällytä nämä resurssit ZIP-pakettiin.
4. Valitse **Tuo** ja varmista, että tuotu aktiviteetti avautuu ja näkyy oikein.

## Hallitse ja käytä aktiviteetteja uudelleen

Hot Potatoes -luettelosta voit esikatsella aktiviteettia toiminnolla **Avaa**, muuttaa sen otsikkoa toiminnolla **Muokkaa**, hallita näkyvyyttä toiminnoilla **Julkaise** tai **Piilota** ja poistaa sen toiminnolla **Poista**, kun se on sallittua. Oppimispolun rakennin voi sisällyttää yksittäisiä Hot Potatoes -aktiviteetteja resursseihinsa.

## Tarkista oppijoiden yritykset

Toiminto **Yritykset** näyttää seuratut yritykset opettajan tarkistettavaksi. Opettajat voivat antaa tarkistetun prosenttipistemäärän väliltä 0–100. Näytöllä näkyy tällä hetkellä enintään 100 viimeisintä yritystä. Käytä aktiviteetin todellista renderöityä tulosta tukevana näyttönä oppijaa arvioidessasi.

**Automaattista pisteytystä ja synkronointia arviointikirjaan ei ole toteutettu.** Hot Potatoes -paketin itsensä näyttämia pisteitä ei saa käsitellä vahvistettuina palvelinpuolen arvosanoina. Opettajan tarkistamat tulokset tallennetaan erikseen.

## Vianmääritys

Jos media puuttuu, vie aktiviteetti uudelleen siten, että kaikki linkitetyt resurssit ovat sen ZIP-paketissa. Jos HTML-vienti toimii paikallisella tietokoneella mutta ei Chamilossa, tarkista ulkoiset tiedostoviittaukset tai yhteensopimaton upotettu sisältö. Testaa aktiviteetin näkyvyys sekä opiskelijatilillä että opettajatilillä.

Katso [Harjoitukset](exercises.md) ja [Oppimispolut](../adding-content/learning-paths.md). Toteutus: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).