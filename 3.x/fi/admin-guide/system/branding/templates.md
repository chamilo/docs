# Mallipohjat

Chamilo käyttää mallipohjia todistuksille, dokumenteille ja sähköposteille. Voit mukauttaa näitä mallipohjia organisaatiosi brändin ja vaatimusten mukaisiksi.

## Todistusmallipohjat

Todistusmallipohjat määrittävät todistusten asettelun ja sisällön, jotka myönnetään oppijoille, jotka täyttävät arviointikirjan kynnysarvot.

### Todistusmallipohjan mukauttaminen

Todistusmallipohjat käyttävät HTML:ää ja CSS:ää sekä paikkamerkkimuuttujia:

| Muuttuja | Korvataan |
|----------|-------------|
| Student name | Oppijan koko nimellä |
| Course name | Kurssin nimellä |
| Date | Päivämäärällä, jolloin todistus ansaittiin |
| Score | Oppijan lopullisella pistemäärällä |
| Barcode | Viivakoodin paikkamerkillä (`((certificate_barcode))`), jota käytetään todentamiseen |

### Mallipohjan lataaminen

1. Siirry todistusmallipohjien hallintaan
2. Lataa tai muokkaa HTML-mallipohjaa
3. Käytä paikkamerkkimuuttujia kohdissa, joihin dynaamisen sisällön tulee ilmestyä
4. Tallenna

## Dokumenttimallipohjat

Opettajat voivat käyttää dokumenttimallipohjia luodessaan sisältöä Dokumentit-työkalussa. Mallipohjat tarjoavat lähtöasettelun yleisille dokumenttityypeille.

### Dokumenttimallipohjien hallinta

1. Siirry mallipohjien hallintaan hallintapaneelissa
2. Lisää uusia mallipohjia lataamalla HTML-tiedostoja
3. Mallipohjat tulevat opettajien saataville, kun he luovat uusia dokumentteja

## Vinkkejä

* **Sisällytä logosi** — Lisää organisaatiosi logo todistusmallipohjiin ammattimaisen ilmeen saamiseksi
* **Testaa oikealla datalla** — Esikatsele todistuksia todellisella oppijadatalla ennen mallipohjan käyttöönottoa
* **Pidä mallipohjat yksinkertaisina** — Yksinkertaiset suunnittelut tulostuvat paremmin ja näyttävät ammattimaisilta