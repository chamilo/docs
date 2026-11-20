# Kyselypohjat

Ylläpitäjät voivat luoda uudelleenkäytettäviä kyselylomakkeita ja tarjota niitä opettajille tai määrittää ne suoraan kursseille ja istunnoille. Tämä toiminto toteutettiin [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) -pyynnössä [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760) -tehtävää varten.

## Luo ja ylläpidä pohjia

1. Avaa hallintapaneelissa **Survey templates** ja valitse **Create**.
2. Anna otsikko ja valinnainen alaotsikko; määritä anonymiteetti, kysymysten asettelu, sekoitus, kesto, johdantoteksti ja kiitosteksti.
3. Tallenna ja lisää tai muokkaa uudelleenkäytettäviä kysymyksiä pohjan kysymyseditorissa.
4. Ota käyttöön **Visible as template**, jos opettajien tulee voida nähdä ja käyttää pohjaa uudelleen. Näkymätön pohja pysyy ylläpitäjän käytettävissä.

Pohjat kuuluvat nykyiseen käyttö-URL-osoitteeseen. Vain alustan ylläpitäjät voivat luoda, muokata tai poistaa pääpohjan. Opettajat voivat käyttää näkyviä pohjia, mutta eivät voi muuttaa niiden päämääritelmää.

## Käytä pohjaa uudelleen kurssilla tai istunnossa

Valtuutetulla kurssilla tai istunnossa opettaja voi valita näkyvän pohjan luodessaan uutta kyselyä. Tuloksena on kysely kyseisessä kurssikontekstissa, ei uudelleenkäytettävän pääpohjan muutos. Opettaja voi tarkistaa kysymykset ja noudattaa tavanomaista julkaisu- ja kutsutyönkulkua.

Hallinnan pohjaluettelosta ylläpitäjä voi sen sijaan määrittää pohjan suoraan valitulle **kurssille** ja valinnaisesti jollekin kyseisen kurssin **istunnoista**. Chamilo tarkistaa, että kurssi kuuluu nykyiseen portaaliin ja että valittu istunto todella sisältää kurssin. Opettajan käyttöliittymää ei voi käyttää pohjan määrittämiseen jonkun toisen kurssille tai istuntoon.

Uutta kyselyä ei julkaista automaattisesti pelkästään siksi, että se luotiin pohjasta; tarkista se ennen osallistujien kutsumista. Katso [Kyselyt](../teacher-guide/assessing-learners/surveys.md) tavanomaista kyselytyönkulkua varten.

## Piilota arkaluonteiset tulokset opettajilta tai tuutoreilta

Kun varsinaista kyselyä muokataan, alustan ylläpitäjä voi ottaa käyttöön asetuksen **Results hidden from teacher/tutor**. Tämä kyselykohtainen rajoitus on tarkoitettu arkaluonteisille kyselyille, kuten opetushenkilöstön arvioinneille. Opettajat ja tuutorit voivat edelleen tarkastella vastausten määriä ja lähettää muistutuksia, mutta **eivät voi avata raportointinäkymiä tai viedä tuloksia**. Alustan ylläpitäjät säilyttävät raportointioikeuden muiden alusta-asetusten puitteissa.

Tämä asetus eroaa tavallisesta **Results visibility** -kentästä ja koko alustan **Hide survey reporting button** -asetuksesta. Vain ylläpitäjä voi muuttaa rajoitettujen tulosten merkintää.

## Oikeudet ja laajuus

* **Ylläpitäjä:** hallinnoi pohjia, asettaa pohjan näkyvyyden, määrittää pohjia kelvollisille kursseille/istunnoille ja hallitsee rajoitettua tuloskäyttöä.
* **Opettaja / istunnon opettaja:** näkee ja luo esiintymiä vain näkyvistä pohjista valtuutetussa kurssikontekstissaan.
* **Käyttö-URL-osoitteet:** pohjaluettelo ja määritys noudattavat nykyistä käyttö-URL-osoitetta; muiden portaalien pohjia ei voi luoda esiintymiksi rajan yli.

Jos pohjat eivät näy opettajille, tarkista **Visible as template** ja heidän kurssi-/istuntokontekstinsa. Jos pohjasta ei voi luoda esiintymää, tarkista yleiset kyselyn luontirajoitukset ja aiottu kohdekurssi tai -istunto.