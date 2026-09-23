# CAS

> **Tila Chamilo 3.x:ssä.** CAS-määritysasetukset (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) ovat yhä alustan asetuksissa perintönä Chamilo 1.x:stä, ja CAS näkyy yhä valittavana todennuslähteenä käyttäjälomakkeella — mutta Chamilo 3.x:n suojausputkeen ei ole kytketty CAS-todentajaa. Kirjautuminen CAS:n kautta **ei** tällä hetkellä toimi valmiina. Jos tarvitset SSO:ta Chamilo 3.x:ssä, käytä sen sijaan [OAuth2](oauth2.md):ta (Azure / Keycloak / Generic) tai [LDAP](ldap.md):tä.

## Mitä CAS tekisi (1.x-käyttäytyminen)

CAS (Central Authentication Service) on kertakirjautumisprotokolla, jota käytetään yleisesti yliopistoissa ja tutkimuslaitoksissa. Chamilo 1.x:ssä "Kirjaudu CAS:lla" -napsautus ohjasi käyttäjän CAS-palvelimelle, validoi palautetun tiketin ja loi tai yhdisti paikallisen tilin CAS-attribuuteista.

## Siirtymähuomautus

Jos päivität Chamilo 1.x -portaalia, joka käytti CAS:ia, suunnittele kyseisen kirjautumisvirran uudelleentoteutus OAuth2:n tai LDAP:n päälle toistaiseksi, kunnes CAS-todentaja palautetaan tulevassa 3.x-julkaisussa.