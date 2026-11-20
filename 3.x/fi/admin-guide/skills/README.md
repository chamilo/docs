# Taidot

Hallintapaneelin **Taidot**-lohko kokoaa työkalut, joilla määritellään, järjestetään ja seurataan osaamismerkkejä ("taitoja") koko alustalla. Taito voidaan myöntää automaattisesti, kun oppija saavuttaa arviointikirjan kynnysarvon, suorittaa tiettyjä kursseja, tai manuaalisesti opettajan toimesta, ja siihen voi liittyä merkkityylinen kuvake sekä taso (esimerkiksi Pronssi/Hopea/Kulta).

![Hallintapaneelin Taidot-lohko, jossa näkyvät Taitopyörä, Taitojen tuonti, Hallitse taitoja, Hallitse taitotasoja, Taitojen sijoitus sekä Taidot ja arvioinnit](/.gitbook/assets/admin-skills-block.png)

Koko lohko näkyy vain, jos asetus **Ota taitotyökalu käyttöön** (`skill.allow_skills_tool`, kohdassa Configuration Settings > Skills) on päällä — se on oletuksena käytössä.

## Taitolohkon avaaminen

Hallintapaneelissa **Taidot**-lohko näkyy muiden kojitusnäkymän lohkojen rinnalla. Avaa vastaava työkalu napsauttamalla mitä tahansa sen linkeistä.

## Mitä lohkossa on

* **[Taitojen hallinta](managing-skills.md)** — Luo taitoja, tuo niitä joukkona ja liitä kukin taitotasoskaalaan
* **[Taitopyörä](skills-wheel.md)** — Koko taitopuun zoomattava visuaalinen kartta
* **[Taitojen sijoitus](skills-ranking.md)** — Käyttäjien tulostaulu hankittujen taitojen mukaan
* **[Taidot ja arvioinnit](skills-assessments.md)** — Yhdistä arviointikirjan kategoriat taitoihin, jotka ne myöntävät

## Liittyvät asetukset

Muutama muu asetus kohdassa Configuration Settings > Skills muuttaa, kuka voi tehdä mitä tällä lohkolla:

* **Salli HR-taitojen hallinta** (`allow_hr_skills_management`) — Antaa Human Resources Manager -käyttäjien hallita taitoja yhdessä ylläpitäjien kanssa
* **Salli yksityiset taidot** (`allow_private_skills`)
* **Opettajat voivat myöntää taitoja** (`skills_teachers_can_assign_skills`)
* **Piilota taitotasot** (`hide_skill_levels`)
* **Näytä taitojen koko nimi taitopyörässä** (`show_full_skill_name_on_skill_wheel`)