# Mukauta kurssityökalujen nimiä ja kuvakkeita

Chamilo 3.1 antaa valtuutetuille kurssin muokkaajille mahdollisuuden mukauttaa työkalun kurssin etusivulla näytettävää **nimeä** ja **SVG-kuvaketta**. Nämä muutokset koskevat vain kyseistä kurssia ja säilyttävät työkalujen nykyiset kohteet.

## Mukauta työkalua

1. Avaa kurssin etusivu käyttäjänä, jolla on oikeus muokata kurssia.
2. Ota työkaluruudukossa käyttöön **Mukauta**-tila.
3. Avaa mukautuslomake työkalulle, jota haluat muuttaa.
4. Kirjoita haluamasi **Nimi** ja valitse tarvittaessa **Kuvake**-SVG-tiedosto.
5. Valitse **Tallenna** ja tarkista päivitetty työkalu etusivun ruudukossa.

Työkalun mukauttaminen eroaa ruudukon **Lajittele**-, **Näytä kaikki**- ja **Piilota kaikki** -tiloista. Työkalun nimen tai kuvakkeen muuttaminen ei luo uutta työkalua, muuta sen taustalla olevaa URL-osoitetta eikä anna oppijoille lisäkäyttöoikeuksia.

## SVG-vaatimukset ja tietoturva

Käytä luotettavasta lähteestä peräisin olevaa SVG-tiedostoa. Chamilo tarkistaa ladatun SVG-sisällön ja hylkää turvattomat tiedostot. Jos tiedosto hylätään, yksinkertaista tai vie se uudelleen puhtaana SVG-tiedostona sen sijaan, että yrittäisit ohittaa tarkistuksen.

Varmista tuloksena oleva kuvake ja nimi sekä opettajana että opiskelijana ja tarkista, että toinen kurssi pysyy muuttumattomana. Opiskelijat eivät voi mukauttaa työkaluja, ellei heillä ole tarvittavia kurssin muokkausoikeuksia.

Katso [Kurssin etusivu](course-homepage.md). Toteutus: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).