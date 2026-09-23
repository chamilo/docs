# Tikettien asetukset

**Tiketit**-järjestelmän (helpdesk) toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Tiketit**. Tässä kategoriassa on **7 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `show_link_bug_notification`

**Näytä linkki virheen ilmoittamiseen**

Näytä otsikossa linkki virheen ilmoittamiseen tukialustallamme (http://support.chamilo.org). Linkkiä napsautettaessa käyttäjä ohjataan tukialustalle wikisivulle, joka kuvaa virheen ilmoittamisen prosessin.

*Oletus: `false`*


### `show_link_ticket_notification`

**Näytä tiketin luontilinkki**

Näytä tiketin luontilinkki käyttäjille portaalin oikealla puolella

*Oletus: `false`*


### `ticket_allow_category_edition`

**Salli tikettikategorioiden muokkaus**

Salli kategorioiden muokkaus ylläpitäjille.

*Oletus: `false`*

### `ticket_allow_student_add`

**Salli käyttäjien lisätä tikettejä**

Sallii kaikkien käyttäjien lisätä tikettejä, ei vain ylläpitäjien.

*Oletus: `false`*

### `ticket_project_user_roles`

**Pääsy tikettiprojekteihin roolin mukaan**

Salli tikettiprojektien käyttö tietyille käyttäjärooleille. Esimerkki: ['permissions' => [1 => [17]] jossa project_id = 1, STUDENT_BOSS = 17.

> Tämä asetus on pakollinen muille kuin ylläpitäjille: ilman tähän määritettyä roolikartoitusta vain ylläpitäjät voivat käyttää tukitikettejä. Jos haluat antaa jollekin muulle roolille pääsyn tikettiprojektiin, lisää sen roolin tunnus tämän asetuksen permissions-osioon kyseiselle projektille.

### `ticket_send_warning_to_all_admins`

**Lähetä tiketin varoitusviestit ylläpitäjille**

Lähetä viesti, jos tiketti luotiin ilman kategoriaa tai jos kategorialle ei ole määritetty yhtään ylläpitäjää.

*Oletus: `false`*


### `ticket_warn_admin_no_user_in_category`

**Lähetä hälytys ylläpitäjille, jos tikettikategorialla ei ole vastuuhenkilöä**

Lähetä varoitusviesti (sähköposti ja Chamilo-viesti) kaikille ylläpitäjille, jos kategorialle ei ole määritetty käyttäjää.

*Oletus: `false`*