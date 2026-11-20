# Globaalit kurssiasetuskäytännöt

Alustan ylläpitäjät voivat määrittää keskitettyjä oletusarvoja kurssiasetuksille ja hallita, saavatko opettajat ohittaa ne. Käytännöt koskevat olemassa olevaa kurssitoiminnallisuutta ja säilyttävät yhteensopivat kurssikohtaiset määritykset.

## Avaa käytäntösivu

**Pääsyosoitteessa** avaa **Hallinta > Asetukset > Kurssiasetukset** tai siirry asennuksessasi osoitteeseen `/admin/settings/course-settings`. Tämä hallintasivu on varattu valtuutetuille alustan ylläpitäjille pääsyosoitteessa. Älä käytä toissijaista portaalia globaalien käytäntöjen muokkaamiseen.

## Määritä käytäntö

1. Käytä **Haku**-kenttää, jos tarvitset tietyn kurssiasetusavaimen.
2. Tarkista kunkin asetuksen kohdalla otsikon alla näkyvä tarkka muuttujan nimi.
3. Valitse tai poista valinta **Muokattavissa kurssissa**, jotta hallitset, voivatko kurssin muokkaajat muuttaa kyseistä asetusta.
4. Valitse tai syötä **Alustan oletusarvo**. Jotkin asetukset tarjoavat sallittujen arvojen pudotusvalikon; toiset hyväksyvät tekstiä.
5. Tallenna muutokset ja varmista todellinen toiminta testikurssilla.

Asetukset, jotka käyttävät samaa muuttujan nimeä eri luokissa, näytetään tarvittaessa erikseen. Älä oleta, että kaksi visuaalisesti samankaltaista nimeä ohjaa samaa kurssitoimintoa.

## Varmista kahdella roolilla

Ylläpitäjänä varmista tallennettu oletusarvo ja se, onko se muokattavissa. Kurssin opettajana avaa vastaava kurssiasetus ja tarkista, että voimassa oleva arvo ja muokkausrajoitus vastaavat käytäntöä. Testaa mahdollisuuksien mukaan sekä olemassa olevaa että uutta kurssia.

Globaalin oletusarvon muuttaminen voi vaikuttaa moniin kursseihin. Arvioi vaikutus ennen kuin poistat opettajien ohitusmahdollisuuden käytöstä, ja kirjaa aiemmat käytäntöarvot, jotta ne voidaan tarvittaessa palauttaa.

Katso [Kurssien hallinta](managing-courses.md) ja [Kurssiasetukset](../../teacher-guide/creating-your-course/course-settings.md). Toteutus: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).