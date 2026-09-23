# Järjestelmä

Hallintapaneelin **Järjestelmä**-lohko kokoaa palvelintason ylläpitotyökalut, itsepäivitystyönkulun, tallennus- ja resurssitarkastustyökalut sekä alustan brändäyksen.

![Hallintapaneelin Järjestelmä-lohko, jossa näkyvät Kohteet: Puhdista väliaikaiset tiedostot, Järjestelmän tila, Järjestelmäpäivitys, Värit, Tiedostotiedot, Resurssit tyypin mukaan ja Listaa kuvakkeet](/.gitbook/assets/admin-system-block.png)

## Järjestelmä-lohkon avaaminen

Hallintapaneelissa **Järjestelmä**-lohko näkyy muiden hallintapaneelin lohkojen rinnalla. Avaa vastaava työkalu napsauttamalla mitä tahansa sen linkeistä.

## Mitä lohkossa on

* **[Järjestelmätyökalut](system-tools.md)** — Puhdista väliaikaiset tiedostot, suorita itsepäivitystyönkulku, tarkastele tallennettuja tiedostoja ja resursseja sekä selaa sisäänrakennettua kuvakejoukkoa
* **Järjestelmän tila** — Käsitelty kohdassa [Järjestelmän tila](../maintenance/system-status.md), Ylläpito-osiossa
* **[Brändäys](branding/README.md)** — Väriteemat (lohkon "Värit"-linkki avaa saman Väriteemat-sivun), portaalin mukautus ja mallipohjat

Kaksi lisäkohtaa — **Data filler** ja **E-mail tester** — näkyvät vain, kun palvelimella on `tests/`-hakemisto, mikä on kehitys-/QA-asennus, ei tuotantoasennus. Ne eivät näy tyypillisessä tuotantoasennuksessa; katso [Järjestelmätyökalut](system-tools.md#development-only-tools) siitä, mitä ne tekevät ollessaan käytettävissä.