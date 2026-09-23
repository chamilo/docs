# Näyttöasetukset

Miten alusta näytetään käyttäjille — etusivun asettelu, gravatar, valikot, brändäyksen käyttäytyminen ja vastaavat visuaaliset asetukset.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Näyttö**. Tässä kategoriassa on **28 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `accessibility_font_resize`

**Fonttikoon muuttamisen saavutettavuustoiminto**

Ota tämä asetus käyttöön näyttääksesi fonttikoon muuttamisvaihtoehdot kampuksen oikeassa yläkulmassa. Tämä auttaa näkövammaisia lukemaan kurssisisältöjä helpommin.

*Oletus: `false`*

### `display_categories_on_homepage`

**Näytä kategoriat etusivulla**

Tämä asetus näyttää tai piilottaa kurssikategoriat portaalin etusivulla

*Oletus: `false`*

### `enable_help_link`

**Ota ohjelinkki käyttöön**

Ohje-linkki sijaitsee näytön oikeassa yläosassa

*Oletus: `true`*

### `gravatar_enabled`

**Gravatar-käyttäjäkuvat**

Ota tämä asetus käyttöön hakeaksesi nykyisen käyttäjän kuvia Gravatar-tietovarastosta, jos käyttäjä ei ole määritellyt kuvaa paikallisesti. Tämä on erinomainen tapa täyttää kuvat automaattisesti sivustollasi, erityisesti jos käyttäjäsi ovat aktiivisia internetin käyttäjiä. Gravatar-kuvat voidaan määrittää helposti käyttäjän sähköpostiosoitteen perusteella osoitteessa http://en.gravatar.com/

*Oletus: `false`*

### `gravatar_type`

**Gravatar-avatarin tyyppi**

Jos Gravatar-asetus on käytössä eikä käyttäjällä ole kuvaa määritettynä Gravatarissa, tämä asetus antaa valita avatarin tyypin, jonka Gravatar luo kullekin käyttäjälle. Katso avatar-tyyppien esimerkkejä osoitteesta <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a>.

*Oletus: `mm`*

### `hide_complete_name_in_whoisonline`

**Piilota koko käyttäjänimi kohdassa 'kuka on linjoilla'**

Sivu 'kuka on linjoilla' (jos käytössä) näyttää kuvan ja nimen jokaiselle tällä hetkellä linjoilla olevalle käyttäjälle. Ota tämä asetus käyttöön piilottaaksesi nimet.

*Oletus: `false`*

### `hide_home_top_when_connected` **v3**

**Piilota etusivun yläsisältö kirjautuneena**

Alustan etusivulla tämä asetus antaa piilottaa johdantolohkon (jättäen näkyviin esimerkiksi vain ilmoitukset) kaikilta jo kirjautuneilta käyttäjiltä. Yleinen johdantolohko näkyy edelleen käyttäjille, jotka eivät ole vielä kirjautuneet.

*Oletus: `false`*

### `hide_logout_button`

**Piilota uloskirjautumispainike**

Piilota uloskirjautumispainike. Tämä on yleensä kiinnostavaa vain, kun käytetään ulkoista kirjautumis-/uloskirjautumismenetelmää, esimerkiksi jonkinlaista kertakirjautumista (Single Sign On).

*Oletus: `false`*

### `hide_main_navigation_menu`

**Piilota päävalikko**

Kun Chamiloa käytetään tiettyyn tarkoitukseen (kuten yhteen massiiviseen verkkotenttiin), saatat haluta vähentää häiriötekijöitä entisestään poistamalla sivupalkin valikon.

*Oletus: `false`*

### `hide_social_media_links`

**Piilota sosiaalisen median linkit**

Joillakin sivuilla voit mainostaa portaalia tai kurssia sosiaalisissa verkoissa. Ota tämä asetus käyttöön poistaaksesi linkit.

*Oletus: `false`*

### `order_user_list_by_official_code`

**Järjestä käyttäjät virallisen koodin mukaan**

Käytä 'virallista koodia' useimpien opiskelijalistojen lajitteluun alustalla sukunimen tai etunimen sijaan.

*Oletus: `false`*

### `pdf_logo_header`

**PDF-ylätunnisteen logo**

Käytetäänkö kuvaa polussa var/themes/[your-theme]/images/pdf_logo_header.png PDF-ylätunnisteen logona kaikissa PDF-viennissä (normaalin portaalin logon sijaan)

### `show_admin_toolbar`

**Näytä ylläpitäjän työkalupalkki**

Näyttää globaalin työkalupalkin sivun yläosassa määritetyille käyttäjärooleille. Tämä työkalupalkki, hyvin samankaltainen kuin WordPressin ja Googlen mustat työkalupalkit, voi nopeuttaa monimutkaisia toimintoja huomattavasti ja parantaa oppimissisällölle käytettävissä olevaa tilaa, mutta se saattaa hämmentää joitakin käyttäjiä

*Oletus: `do_not_show`*

### `show_administrator_data` **v3**

**Alustan ylläpitäjän tiedot alatunnisteessa**

Näytetäänkö alustan ylläpitäjän tiedot alatunnisteessa?

*Oletus: `true`*

### `show_back_link_on_top_of_tree`

**Näytä paluulinkit kategorioista/kursseista**

Näytä linkki palataksesi kursihierarkiassa taaksepäin. Linkki on joka tapauksessa saatavilla listan alareunassa.

*Oletus: `false`*

### `show_closed_courses`

**Näytetäänkö suljetut kurssit kirjautumissivulla ja portaalin aloitussivulla?**

Näytetäänkö suljetut kurssit kirjautumissivulla ja kurssien aloitussivulla? Portaalin aloitussivulla kurssien viereen ilmestyy kuvake, jolla voi nopeasti ilmoittautua kullekin kurssille. Tämä näkyy portaalin aloitussivulla vain, kun käyttäjä on kirjautunut eikä ole vielä ilmoittautunut portaaliin.

*Oletus: `false`*

### `show_email_addresses`

**Näytä sähköpostiosoitteet**

Näytä sähköpostiosoitteet käyttäjille

*Oletus: `false`*

### `show_empty_course_categories`

**Näytä tyhjät kurssikategoriat**

Näytä kurssikategoriat etusivulla, vaikka ne olisivat tyhjiä

*Oletus: `true`*

### `show_hot_courses`

**Näytä suositut kurssit**

Suosittujen kurssien lista lisätään etusivulle

*Oletus: `true`*

### `show_number_of_courses`

**Näytä kurssien määrä**

Näytä kunkin kategorian kurssien määrä etusivun kurssikategorioissa

*Oletus: `false`*

### `show_tabs`

**Päävalikon kohteet**

Valitse kohteet, jotka haluat näkyvän päävalikossa

*Oletus:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Päävalikon kohteet rooleittain**

Määritä otsikkovälilehtien näkyvyys rooleittain.

*Oletus: `{}`*

### `show_teacher_data` **v3**

**Näytä opettajan tiedot alatunnisteessa**

Näytetäänkö opettajan viitetiedot (nimi ja sähköposti, jos saatavilla) alatunnisteessa?

*Oletus: `true`*

### `show_tutor_data` **v3**

**Istunnon tuutorin tiedot näytetään alatunnisteessa.**

Näytetäänkö istunnon tuutorin viitetiedot (nimi ja sähköposti, jos saatavilla) alatunnisteessa?

*Oletus: `true`*

### `showonline`

**Kuka on paikalla**

Näytetäänkö paikalla olevien henkilöiden määrä?

*Oletus: `world`*

### `table_default_row`

**Taulukon rivien oletusmäärä**

Kuinka monta riviä näytetään kaikissa taulukoissa oletuksena.

*Oletus: `20`*

### `table_row_list`

**Taulukoiden sivutuksen oletusvaihtoehdot**

Määritä vaihtoehdot, jotka näkyvät taulukon ympärillä olevassa navigoinnissa, jotta yhdellä sivulla voidaan näyttää vähemmän tai enemmän rivejä. Esim. [50, 100, 200, 500].

*Oletus: `[10,20,50,100]`*

### `time_limit_whosonline`

**Aikaraja toiminnolle Kuka on paikalla**

Tämä aikaraja määrittää, kuinka monta minuuttia viimeisen toiminnon jälkeen käyttäjää pidetään *paikalla*

*Oletus: `30`*