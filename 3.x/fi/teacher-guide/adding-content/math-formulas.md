# Matemaattiset kaavat

Rich-text-editori osaa ladota matemaattisia kaavoja. Kirjoitat kaavan LaTeXilla, ja oppijat näkevät sen ladottuna kaikkialla, missä sisältö näytetään: asiakirjoissa, ilmoituksissa, harjoituksissa, foorumeilla, wikisivuilla ja kaikissa muissa työkaluissa, jotka käyttävät editoria.

Kaavat tallennetaan itse sisältöön, joten ne kulkevat kurssin mukana, kun kopioit tai viet sen.

## Ominaisuuden käyttöönotto

Kaavapainike on oletuksena pois päältä. Alustan ylläpitäjä kytkee sen päälle kohdassa **Ylläpito > Määritysasetukset > Editori > Ota MathJax käyttöön** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Kun asetus on päällä, painike näkyy kaikissa alustan editoreissa. Kurssikohtaista määritystä ei tarvita.

## Kaavan lisääminen

1. Aseta kohdistin kohtaan, johon kaava kuuluu
2. Napsauta editorin työkalupalkin **Lisää kaava** -painiketta (Σ-kuvake)
3. Kirjoita kaava **LaTeX-koodina**
4. Tarkista ladottu tulos kentän alla olevasta esikatseluruudusta
5. Napsauta **Lisää**

Esikatselu päivittyy kirjoittaessasi, joten voit korjata virheen ennen kuin lisäät mitään.

## Kaavan muokkaaminen

Napsauta kaavaa editorissa. Sama valintaikkuna avautuu uudelleen, ja alkuperäinen LaTeX-koodisi on kentässä. Muuta sitä ja napsauta **Lisää** korvataksesi kaavan.

Kaavan poistamiseksi valitse se editorissa ja paina <kbd>Delete</kbd>, kuten minkä tahansa muun elementin kohdalla.

## LaTeXin kirjoittaminen

Kaavakenttä hyväksyy tavanomaisen LaTeX-matematiikkamerkinnän. Muutama esimerkki:

| Mitä kirjoitat | Mitä oppijat näkevät |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | Toisen asteen yhtälön ratkaisukaava |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Summa rajoineen |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Määrätty integraali |
| `\alpha + \beta = \gamma` | Kreikkalaiset kirjaimet |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Matriisi |

Voit myös kirjoittaa raa'at erottimet `\(...\)`, `\[...\]` tai `$$...$$` suoraan editoriin. Editori muuntaa ne kaavoiksi, kun se lataa sisällön.

## Huomautuksia

* Kaavakirjasto ladataan vain sivuilla, joilla on oikeasti kaava, joten sivut ilman kaavaa eivät hidastu.
* Kaikki ladataan oppijan selaimessa. Alusta ei tarvitse ulkoista palvelua, ja se toimii asennuksessa, jossa ei ole internetyhteyttä.
* Kaava säilyttää LaTeX-lähteensä. Voit aina avata sen uudelleen ja lukea, mitä kirjoitit, jopa vuosia myöhemmin.