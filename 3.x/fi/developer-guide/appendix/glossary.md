# Sanasto

Tässä oppaassa käytetyt kehittäjäkeskeiset termit.

| Termi | Määritelmä |
|------|-----------|
| **API Platform** | PHP-kehys REST- ja GraphQL-rajapintojen rakentamiseen, integroitu Symfonyyn. Chamilo käyttää sitä API-päätepisteiden automaattiseen luontiin Doctrine-entiteeteistä. |
| **Bundle** | Symfony-organisaatioyksikkö, joka vastaa liitännäistä tai moduulia. Chamilossa on kolme: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Vue 3 -malli reaktiivisen logiikan erottamiseen ja uudelleenkäyttöön. Sijaitsee hakemistossa `assets/vue/composables/`. |
| **Doctrine ORM** | Chamilon käyttämä PHP-objektirelaatiokartoitin. Kartoittaa PHP-entiteettiluokat tietokantatauluihin. |
| **Entity** | PHP-luokka, joka on annotoitu Doctrine-attribuuteilla ja kartoittuu tietokantatauluun. |
| **Encore** | Symfony Webpack Encore — Webpackin ympärille rakennettu kääre, joka yksinkertaistaa frontend-koontikonfiguraatiota. |
| **Flysystem** | PHP-kirjasto tiedostojärjestelmän abstraktioon. Chamilo käyttää sitä paikallisen, S3-, Azure- ja GCS-tallennuksen tukemiseen. |
| **JWT** | JSON Web Token — REST-rajapinnan autentikointimekanismi. |
| **Pinia** | Suositeltu tilanhallintakirjasto Vue 3:lle. Käytetään Chamilon uusissa storeissa; vanhat Vuex-storet säilyvät sen rinnalla. |
| **PrimeVue** | Chamilon käyttämä Vue 3 -käyttöliittymäkomponenttikirjasto. Tarjoaa painikkeita, taulukoita, dialogeja jne. |
| **ResourceNode** | Chamilon resurssijärjestelmän keskeinen entiteetti. Jokaisella kurssisisällön osalla on ResourceNode. |
| **ResourceFile** | Entiteetti, joka edustaa ResourceNodeen liitettyä tiedostoa. Tallennetaan Flysystemin kautta. |
| **ResourceLink** | Entiteetti, joka hallitsee näkyvyyttä ja pääsyä kurssi-/sessio-/ryhmäkontekstissa. |
| **SCORM** | Sharable Content Object Reference Model. E-oppimisen standardi sisällön paketoimiseen. |
| **Settings Schema** | PHP-luokka, joka määrittää alustan asetusten kategorian (esim. SecuritySettingsSchema). |
| **Voter** | Symfony-turvakomponentti, joka päättää, voiko käyttäjä suorittaa toiminnon resurssille. |
| **Webpack** | JavaScript-moduulipaketoija, joka kääntää Vue-komponentit, SCSS:n ja TypeScriptin selaimelle valmiiksi paketeiksi. |