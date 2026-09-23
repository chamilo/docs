# Kaksivaiheinen tunnistautuminen

Kaksivaiheinen tunnistautuminen (2FA) lisää kirjautumiseen toisen vaiheen — 6-numeroisen koodin puhelimessasi olevasta sovelluksesta salasanan lisäksi — jotta pelkkä salasanan tunteminen ei riitä tilillesi pääsyyn.

Tämä ominaisuus näkyy vain, jos ylläpitäjä on ottanut sen käyttöön koko alustalla. Jos et näe sitä tilisivullasi, sitä ei ole otettu käyttöön alustallasi.

## 2FA:n käyttöönotto

1. Avaa **avatar-valikko** ja valitse **Oma profiili**.
2. Valitse **Vaihda salasana**.
3. Anna **nykyinen salasanasi**, merkitse ruutu **Ota kaksivaiheinen tunnistautuminen (2FA) käyttöön** ja valitse **Päivitä asetukset**.
4. Sivu latautuu uudelleen QR-koodin ja viestin "Scan the QR code to enable 2FA." kera. Skannaa se puhelimessasi olevalla tunnistautumissovelluksella (mikä tahansa TOTP-yhteensopiva sovellus toimii, esimerkiksi Google Authenticator, Microsoft Authenticator tai Authy).

![Salasanan vaihtolomake lähetyksen jälkeen, jossa näkyvät skannattava QR-koodi ja 2FA-koodikenttä](/.gitbook/assets/student-2fa-qr-code.png)

5. Anna nykyinen salasanasi uudelleen sekä 6-numeroinen koodi, jonka sovellus nyt näyttää, kenttään **2FA-koodi**, ja valitse **Päivitä asetukset** vielä kerran. Näet vahvistuksen, että 2FA on aktivoitu.

Pelkkä ruudun merkitseminen ei paljasta QR-koodia — näet sen vasta ensimmäisen lähetyksen jälkeen, ja salasanakentät tyhjennetään joka kerta, kun sivu latautuu uudelleen, joten sinun on annettava nykyinen salasanasi myös tässä toisessa lähetyksessä.

## Kirjautuminen, kun 2FA on käytössä

Kun olet antanut käyttäjätunnuksen ja salasanan tavalliseen tapaan, kirjautumislomakkeessa näkyy samassa näkymässä ylimääräinen **2FA-koodi** -kenttä — anna tunnistautumissovelluksen nykyinen 6-numeroinen koodi ja lähetä (painikkeessa lukee tässä vaiheessa **Submit code** eikä **Sign in**).

## Jos menetät pääsyn tunnistautumissovellukseen

Chamilo ei luo 2FA:lle varmuus- tai palautuskoodeja. Jos menetät laitteen, jossa tunnistautumissovellus on, et voi itse tuottaa kelvollista koodia — ota yhteyttä alustan ylläpitäjään, joka voi poistaa 2FA:n käytöstä tililtäsi, jotta voit kirjautua uudelleen ja halutessasi ottaa sen käyttöön uudessa laitteessa.

## 2FA:n poistaminen käytöstä

Palaa kohtaan **Vaihda salasana**, poista merkintä kohdasta **Ota kaksivaiheinen tunnistautuminen (2FA) käyttöön**, anna nykyinen salasanasi ja lähetä.

## Vinkkejä

* **Ota se käyttöön ennen kuin tarvitset sitä** — 2FA:n käyttöönotto vie minuutin ja suojaa tiliäsi merkittävästi.
* **Pidä tunnistautumissovellus saatavilla** — sen menettäminen tarkoittaa, että paluu riippuu ylläpitäjästä, koska varmuuskoodeja ei ole.
* **Älä jaa 2FA-koodejasi** — kuka tahansa, jolla on salasanasi ja kelvollinen koodi, voi kirjautua sinuna.