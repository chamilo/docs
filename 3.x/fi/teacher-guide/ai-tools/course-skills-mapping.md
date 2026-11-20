# Tekoälyavusteinen kurssin osaamiskartoitus

Chamilo 3.1 voi ehdottaa kurssiin liittyviä osaamisia ja antaa valtuutetuille käyttäjille mahdollisuuden tarkastella ehdotuksia ja soveltaa niitä osaamisviitekehykseen ja Gradebookiin. Tekoälyehdotusta **ei sovelleta automaattisesti**; se on valittava ja hyväksyttävä.

## Luo ehdotuksia

1. Avaa kyseisen kurssin **Tekoälyavusteinen osaamiskartoitus** -sivu. Sovelluksen reitti on `/course/{courseId}/skills`, ja `{courseId}` korvataan todellisella kurssitunnuksella.
2. Jos kurssi kuuluu istuntoon, avaa sivu oikeassa istuntokontekstissa.
3. Valitse käytettävissä oleva **AI-palveluntarjoaja**.
4. Valitse **Ehdota osaamisia tälle kurssille** ja tarkista palautetut tulokset.

AI-palveluntarjoajien on oltava käytettävissä ja alustan hallinnon määrittämiä. Ehdotukset voivat viitata **Olemassa oleva osaaminen** -merkintöihin tai suositella **Uusi osaaminen** -merkintää ylätason osaamisen alle. Kukin merkintä voi sisältää kuvauksen, kriteerit ja selityksen ehdotukselle.

## Tarkista ja hyväksy

1. Lue jokainen ehdotus kriittisesti ja vertaa sitä kurssin tavoitteisiin ja sisältöihin.
2. Valitse vain kelvolliset osaamiset niiden valintaruuduilla.
3. Jos sinulla on tarvittava valtuutus, valitse **Lisää valitut osaamiset viitekehykseen ja Gradebookiin**.
4. Varmista kurssiin syntyneet osaamiset ja Gradebook-liitokset.

Käyttäjät, joilla ei ole liittämisoikeuksia, voivat tarkastella ehdotuksia mutta eivät voi liittää niitä. Uusien osaamisten luominen edellyttää alustan ylläpitäjän oikeuksia. Ehdotukset voivat vanhentua; luo uusi joukko, jos sovellus ilmoittaa, etteivät aiemmat ole enää voimassa.

## Hyvä käytäntö

Tekoälyn tuottamat osaamiset ovat ehdokkaita, eivät sitovia opetussuunnitelman vaatimuksia. Tarkista sanamuoto, päällekkäisyydet, ylätason osaamisen sijoittelu ja kriteerit ennen hyväksyntää. Vältä luottamuksellisten oppijatietojen syöttämistä tekoälykehotteisiin.

Katso [Osaamiset ja arvioinnit](../../admin-guide/skills/skills-assessments.md) ja [AI-työkalupakki](toolbox-ai.md). Toteutus: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).