# Monikielinen sisältö

Chamilo antaa sinun kirjoittaa **useita kieliversioita samasta sisältökappaleesta yhteen kenttään** — kurssikuvauksen osioon, dokumenttiin, tenttikysymykseen, kyselyyn — ja jokainen oppija näkee automaattisesti vain sen version, joka on kirjoitettu hänen omalla kielellään. Tämä on **translate_html**-ominaisuus, joka on nimetty sitä hallitsevan alustan asetuksen mukaan.

Mukana on kolme eri henkilöä, joista kukin näkee sen eri puolen:

* **Ylläpitäjäsi** on otettava ominaisuus käyttöön koko alustalla, ennen kuin kukaan voi käyttää sitä.
* **Sinä (opettaja)** kirjoitat eri kieliversiot käyttämällä painiketta rich text -editorissa.
* **Oppija** hyötyy siitä tietämättä sen olemassaolosta — hän näkee sisällön vain omalla kielellään, ilman asetusta jota etsiä tai kytkeä.

## Ominaisuuden käyttöönotto

Tämä on ylläpitäjän tehtävä, ei opettajan. Kohdassa **Ylläpito > Määritysasetukset > Editori** asetus **Tuki monikieliselle HTML-sisällölle** (`translate_html`) on oltava käytössä. Jos et näe alla kuvattua **Lang ISO** -painiketta editorin työkalupalkissa, syy on lähes varmasti tämä — pyydä ylläpitäjääsi. Katso [Editorin asetukset](../../admin-guide/platform-settings/editor-settings.md) täydellisestä asetusviitteestä. Versiosta v3.0.0 alkaen tämä asetus on oletuksena käytössä (näin ei ollut ennen tätä versiota), ellei versiotasi ole päivitetty aiemmasta versiosta, jossa asetus oli pois käytöstä.

Asetuksen kytkeminen uudelleen pois ei poista eikä riko tällä tavalla jo kirjoitettua sisältöä — katso [Mitä oppijat näkevät](#what-learners-see) alla.

## Monikielisen sisällön kirjoittaminen

Ominaisuus on käytettävissä kaikkialla, missä on täysi rich text -editori: [kurssikuvauksen](../creating-your-course/course-description.md) osioissa, [dokumenteissa](documents.md), tentti- ja kyselykysymyksissä ja muualla.

1. Kirjoita (tai liitä) sisältö oletuskielelläsi tavalliseen tapaan.
2. Valitse teksti ja napsauta sitten **Lang ISO** -painiketta editorin työkalupalkissa.

![Rich text -editorin työkalupalkki, jossa "Lang ISO" -painike näkyy lähellä alkua](/.gitbook/assets/teacher-multilang-editor.png)

3. Valitse valikosta kieli, jolla juuri kirjoitit — luettelo kattaa kaikki alustallasi aktiiviset kielet. Jos tarvitsemaasi ei ole listassa, käytä alareunan **Custom Chamilo ISO code...** ja kirjoita se (esim. `en_US`, `fr_FR`, `es`).

!["Lang ISO" -valikko auki, listaten kaikki aktiiviset alustan kielet sekä "Add translation to..." ja mukautetun koodin vaihtoehdon](/.gitbook/assets/teacher-multilang-lang-menu.png)

4. Chamilo ympäröi valintasi kyseisellä kielitunnisteella. Kirjoita (tai liitä) seuraavan kielen versio heti sen perään, valitse se ja toista eri kielellä.

Jatka niin monelle kielelle kuin haluat kattaa. Kaikki ne elävät samassa kentässä — muokatessasi näet kaikki kieliversiot pinottuina peräkkäin; vasta kun joku *katsoo* sivua, Chamilo piilottaa kaiken paitsi sen yhden kielen, joka koskee häntä (katso alla).

### Tekoälyavusteinen käännös

Jos ylläpitäjäsi on määrittänyt tekoälytekstipalveluntarjoajan, sama **Lang ISO** -valikko tarjoaa myös **Add translation to...** ylhäällä. Tämä lähettää olemassa olevan sisältösi määritettyyn tekoälymalliin ja lisää uuden, automaattisesti käännetyn lohkon valitsemaasi kieleen (tai kaikkiin jäljellä oleviin kieliin kerralla, jos alustasi sen sallii) — sinun ei tarvitse kirjoittaa sitä itse. Olemassa olevat kielilohkot jätetään koskematta, ja jo läsnä olevat kielet jätetään pois luettelosta, joten toistuva käyttö ei luo kaksoiskappaleita.

Kuten minkä tahansa tekoälyn tuottaman sisällön kohdalla, oikolue tulos — se on nopea tapa saada vankka ensimmäinen luonnos kielellä, jota et ehkä itse puhu, ei korvike tarkistukselle.

## Mitä oppijat näkevät

Kukin oppija näkee tasan yhden kieliversion: Chamilo yrittää ensin hänen omaa käyttöliittymäkieltään; jos mikään lohkoistasi ei vastaa sitä, se palaa kurssin omaan kieleen, sitten alustan oletuskieleen; jos mikään näistäkään ei täsmää, se näyttää sen kielen, jonka satuit kirjoittamaan ensimmäisenä, sen sijaan että jättäisi sisällön tyhjäksi. Tämä tapahtuu automaattisesti — oppijalla ei ole mitään määritettävää, eikä sinullakaan ole mitään määritettävää oppijakohtaisesti.

Tässä on sama kurssikuvauksen osio kolmen eri käyttöliittymäkieltä käyttävän oppijan näkemänä — kurssissa ei muuttunut mikään muu näiden kolmen kuvakaappauksen välillä, vain katsojan oma kieli:

![Sama kurssikuvauksen osio oppijan näkemänä, jonka käyttöliittymäkieli on englanti](/.gitbook/assets/teacher-multilang-en.png)

![Sama osio oppijan näkemänä, jonka käyttöliittymäkieli on ranska](/.gitbook/assets/teacher-multilang-fr.png)

![Sama osio oppijan näkemänä, jonka käyttöliittymäkieli on espanja](/.gitbook/assets/teacher-multilang-es.png)

### Konepellin alla

Jos avaat joskus monikielisen kentän **Lähdekoodi**-näkymän (editorin työkalupalkin `<>`-painike), näet kunkin kieliversion käärittynä näin:

![Lähdekoodinäkymä, jossa lohko alkaa lang="en_US" class="mce-translatehtml"](/.gitbook/assets/teacher-multilang-source-view.png)

Kukin versio on kääritty elementtiin `<div class="mce-translatehtml" lang="...">` (tai `<span>`-elementtiin, jos kyseessä on lyhyt rivinsisäinen ilmaus eikä kokonainen lohko) — juuri tämä `lang`-attribuutti on se, jota Chamilo vertaa katsojan kieleen päättäessään, mitä näytetään. Tämä luokan nimi kannattaa tunnistaa, jos joskus tarkastelet sivun lähdekoodia tai selvität sisältöä, joka näyttää väärältä: **`mce-translatehtml`** on merkki, jota etsiä.

Tämä selittää myös sen, miksi `translate_html`-asetuksen poistaminen käytöstä alustan asetuksissa ei riko mitään jo kirjoitettua: asetus hallitsee vain sitä, näkyykö **Lang ISO** *-laadinta*-painike editorissa. Edellä kuvattu *näyttöpuolen* suodatus toimii aina, joten aiemmin kirjoitettu monikielinen sisältö suodattuu oikein jokaiselle katsojalle silloinkin, kun ylläpitäjä on sittemmin kytkenyt laadintapainikkeen pois päältä.

## Otsikot eivät toimi näin

Kurssin otsikko, asiakirjan otsikko, testin otsikko — nämä ovat pelkkää tekstiä, eivät rikasta tekstiä, joten niihin ei voi sijoittaa edellä kuvattua `lang`-merkittyä merkintää. Ne pysyvät yhtenä, neutraalina arvona riippumatta siitä, kuka niitä katsoo, vaikka sisältöön niiden alla olisi kirjoitettu kuinka monta kieliversiota tahansa.

Ainoa poikkeus: jos ylläpitäjäsi on ottanut käyttöön **Tallenna otsikot HTML:nä** (`save_titles_as_html`, myös kohdassa **Ylläpito > Määritysasetukset > Editor**) juuri sille otsikkokentälle, jonka kanssa työskentelet, kentästä tulee myös oikea HTML-kenttä, ja samaa edellä kuvattua **Lang ISO** -tekniikkaa voidaan käyttää siihen. Tämä on harvinaista ja sitä käytetään lähinnä testikysymyksissä — suurin osa alustan otsikoista pysyy pelkkänä tekstinä.

## Vinkkejä

* **Pidä lähdekieli ensimmäisenä** — aseta alustan yleisin kieli kentässä ensimmäiseksi; se on luontevin varavaihtoehto, jos unohdat merkitä harvinaisemman kielen myöhemmin.
* **Älä sisäkkäistä kielilohkoja** — kirjoita kukin versio erillisenä, peräkkäisenä lohkona; toisen sisään käärittäminen ei ole tuettu, ja editori purkaa aktiivisesti sisäkkäiset merkit, kun lisäät uuden.
* **Osio, joka näyttää tyhjältä yhdellä kielellä**, tarkoittaa yleensä, ettei sille (tai sen laajennetulle kurssi-/alustan oletusvaravaihtoehdolle) ole koskaan merkitty lohkoa — tarkista Lähdekoodi-näkymästä, mitkä kielet ovat oikeasti läsnä.