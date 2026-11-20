# Opiskelijan menestyksen tekoälyvalmentaja

**Opiskelijan menestyksen tekoälyvalmentaja** auttaa opettajaa muuttamaan kurssitoiminnan käytännön suosituksiksi yhdelle oppijalle. Se on käytettävissä kurssin raportointialueen oppijaluettelosta, kun tekoälyavustajat ja **Kurssianalysaattori**-toiminto on otettu käyttöön kyseisellä kurssilla.

> Alustalle on määritettävä vähintään yksi tekstipohjainen tekoälypalveluntarjoaja. Katso [Tekoälyn määritys](../../admin-guide/integrations/ai-configuration.md). Asiaankuuluvat alusta-asetukset ovat `ai_helpers.enable_ai_helpers` ja `ai_helpers.course_analyser` kohdassa **Hallinta > Määritysasetukset > Tekoälyavustajat**.

## Suosituksen luominen

1. Avaa kurssin raportointialue ja näytä **Oppijaluettelo**.
2. Etsi oppija ja napsauta **Opiskelijan menestyksen tekoälyvalmentaja** -toimintoa.
3. Jos käytettävissä on useita tekoälypalveluntarjoajia, valitse yksi.
4. Voit halutessasi syöttää **Lisäohjeet tekoälyvalmentajalle**. Niiden avulla voit lisätä opetuksellista kontekstia tai pyytää valmentajaa keskittymään tiettyyn vaikeuteen.
5. Napsauta **Analysoi käyttäjän oppiminen**.

Chamilo valmistelee ensin kurssianalyysin tai käyttää aiempaa uudelleen ja analysoi sitten oppijan toiminnan nykyisessä kurssissa tai kurssi-istunnon kontekstissa.

## Mitä suositus sisältää

Tulos voi sisältää:

* tiiviin kokonaisyhteenvedon;
* **Ensisijaiset toimenpiteet**;
* ehdotetut **Lisäaktiviteetit**;
* suosituksia **Rytmistä** ja etenemistahdista;
* vaihtoehtoisia **Oppimismenetelmiä**;
* muita suosituksia tarvittaessa;
* **Näyttö**-linkkejä kurssin kielen hyväksytystä pedagogisten lähteiden luettelosta.

Suositus tallennetaan Chamiloon kyseiselle oppijalle ja kurssikontekstiin. Chamilo tallentaa myös kopion opettajan omaan Saapuneet-kansioon, kun viestin luonti onnistuu, jotta sitä voidaan tarkastella myöhemmin.

## Tietosuoja

Ennen analyysin alkamista Chamilo näyttää tietosuojavaroituksen. Suorat profiilitunnisteet jätetään pois tekoälypalveluntarjoajalle lähetettävästä oppijan tietosisällöstä, ja tekoälyä ohjeistetaan olemaan tunnistamatta oppijaa tai päättelemättä arkaluonteisia ominaisuuksia. Oppimistoiminta ja kurssisisältö voivat kuitenkin edelleen sisältää tietoja, jotka saattavat epäsuorasti tunnistaa jonkun. Noudata organisaatiosi tekoäly- ja tietosuojakäytäntöä ennen toiminnon käyttöä.

Sama opiskelijan menestyksen analyysi on käytettävissä myös valtuutetuille MCP-asiakkaille `generate_student_success_feedback`-työkalun kautta; se käyttää uudelleen samaa tietosuojasuodatettua analyysipolkua.