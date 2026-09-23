# Sanasto

Chamilo 3.0 -hallinnassa käytetyt keskeiset termit.

## Alustan käsitteet

| Termi | Määritelmä |
|------|------------|
| **Access URL** | Moni-URL-asennuksessa kukin access URL on erillinen virtuaalinen portaali, joka jakaa saman Chamilo-asennuksen ja tietokannan. Kullakin URL-osoitteella voi olla oma brändäyksensä, käyttäjänsä, kurssinsa ja asetuksensa. |
| **Course** | Chamilon perussisältösäiliö. Kurssi sisältää oppimateriaaleja, harjoituksia, foorumeita ja muita työkaluja. Kurssit voivat olla itsenäisiä tai ne voidaan liittää sessioihin. |
| **Session** | Yhden tai useamman kurssin aikarajattu instanssi. Sessiot mahdollistavat saman kurssisisällön tarjoamisen eri oppijaryhmille erillisellä seurannalla ja itsenäisillä tutoreilla. |
| **Learning path** | Sisältökohteiden (asiakirjat, harjoitukset, linkit, SCORM-moduulit) jäsennelty jakso, joka ohjaa oppijoita materiaalin läpi määritellyssä järjestyksessä. |
| **Gradebook** | Koontityökalu, joka yhdistää harjoitusten, tehtävien ja muiden aktiviteettien pisteet painotetuksi loppukursiarvosanaksi. |
| **Skill** | Osaaminen tai merkki, joka voidaan myöntää oppijoille tiettyjen kurssien tai harjoitusten suorittamisen tai gradebook-kynnysten saavuttamisen perusteella. |
| **Extra field** | Ylläpitäjien käyttäjiin, kursseihin tai sessioihin lisäämä mukautettu tietokenttä organisaatiokohtaisen metadatan tallentamiseen. |
| **Plugin** | Laajennus, joka lisää toiminnallisuutta Chamiloon muuttamatta ydin koodia. Plugin-laajennukset voivat lisätä sivuja, työkaluja tai integraatioita. |
| **Catalog** | Selaettava luettelo saatavilla olevista kursseista, jossa käyttäjät voivat tarkastella kuvauksia ja ilmoittautua itse. |

## Käyttäjäroolit

| Termi | Määritelmä |
|------|------------|
| **Learner (Student)** | Oletuskäyttäjärooli. Voi ilmoittautua kursseille ja käyttää sisältöä. |
| **Teacher (Trainer)** | Voi luoda ja hallita kursseja, lisätä sisältöä ja arvioida oppijoita. |
| **Session administrator** | Voi luoda ja hallita sessioita ja ilmoittautumisia. |
| **Human Resources Manager (HRM)** | Voi tarkastella seuranta- ja raportointitietoja osoitetuille käyttäjille. |
| **Portal administrator** | Täysi pääsy kaikkiin alustan hallintaominaisuuksiin. |
| **Global administrator** | Portaalin ylläpitäjä, jolla on pääsy kaikkiin access URL -osoitteisiin moni-URL-asennuksessa. |
| **Tutor** | Sessiotason rooli. Session tutorit valvovat kaikkia session kursseja; kurssitutorit hallitsevat tiettyä kurssia session sisällä. Chamilo-versioissa ennen 3.0 kutsuttu nimellä "coach". |

## Standardit ja protokollat

| Termi | Määritelmä |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. E-oppimisen paketointistandardi, jonka avulla kursseja voidaan tuoda ja seurata. Chamilo tukee SCORM 1.2- ja 2004-versioita. |
| **xAPI (Tin Can API)** | E-oppimisen määritys oppimiskokemusten seurantaan. Laajempi kuin SCORM; se voi tallentaa aktiviteetteja, jotka tapahtuvat LMS:n ulkopuolella. xAPI-lauseet tallennetaan Learning Record Storeen (LRS). |
| **LTI** | Learning Tools Interoperability. IMS Global -standardi, jonka avulla ulkoisia työkaluja ja sisältöä voidaan upottaa LMS:ään. Chamilo tukee LTI 1.1- ja 1.3-versioita sekä kuluttajana että tarjoajana. |
| **SCIM** | System for Cross-domain Identity Management. Standardi käyttäjien automaattiseen provisiointiin ja deprovisiointiin identiteetintarjoajien ja sovellusten välillä. |
| **OAuth2** | Valtuutuskehys, jonka avulla kolmannen osapuolen sovellukset voivat käyttää Chamiloa käyttäjän puolesta jakamatta salasanoja. Käytetään API-käyttöön ja SSO-integraatioihin. |
| **LDAP** | Lightweight Directory Access Protocol. Protokolla hakemistopalvelujen (esim. Active Directory) käyttämiseen käyttäjien tunnistautumiseen ja tilitietojen synkronointiin. |
| **CAS** | Central Authentication Service. Kertakirjautumisprotokolla, jonka avulla käyttäjät voivat tunnistautua kerran ja käyttää useita sovelluksia. |
| **JWT** | JSON Web Token. Tiivis, allekirjoitettu token-muoto, jota käytetään API-todennukseen ja istunnonhallintaan. |
| **SAML** | Security Assertion Markup Language. XML-pohjainen standardi todennustietojen vaihtamiseen identiteetintarjoajan ja palveluntarjoajan välillä. |

## Tekniset termit

| Termi | Määritelmä |
|------|------------|
| **Symfony** | PHP-kehys, jolle Chamilo 3.0 on rakennettu. Symfony tarjoaa reitityksen, riippuvuusinjektion, ORM:n (Doctrine), mallinnuksen (Twig) ja muuta infrastruktuuria. |
| **Doctrine** | Chamilon käyttämä objektirelaatiokartoitin (ORM) tietokannan kanssa vuorovaikuttamiseen. Doctrine kartoittaa PHP-oliot tietokantatauluihin. |
| **Twig** | Symfonyyn ja Chamiloon kuuluva mallimoottori HTML:n renderöintiin. |
| **Flysystem** | PHP:n tiedostojärjestelmäabstraktiokerros. Chamilo käyttää Flysystemiä paikallisen tallennuksen, Amazon S3:n, Azure Blobin ja Google Cloud Storagen tukemiseen keskenään vaihdettavasti. |
| **Composer** | PHP:n riippuvuuksien hallinta. Käytetään Chamilon PHP-kirjastojen asentamiseen ja päivittämiseen. |
| **Mailer DSN** | Sähköpostikuljetuksen Data Source Name. Yhteysmerkkijono, joka kertoo Symfonylle, miten sähköpostit lähetetään (esim. SMTP:n, Amazon SES:n tai Mailjetin kautta). |
| **OPcache** | PHP:n sisäänrakennettu opcode-välimuisti. Kääntää PHP-skriptit tavukoodiksi ja tallentaa ne muistiin, mikä parantaa suorituskykyä merkittävästi. |
| **APCu** | PHP-laajennus, joka tarjoaa käyttäjätason muistivälimuistin. Symfony käyttää sitä metatietojen ja konfiguraation välimuistittamiseen. |

## Lyhenteet

| Lyhenne | Täydellinen muoto |
|---------|-----------|
| **LMS** | Learning Management System (oppimisen hallintajärjestelmä) |
| **LRS** | Learning Record Store (xAPI-lausekkeille) |
| **SSO** | Single Sign-On (kertakirjautuminen) |
| **CSV** | Comma-Separated Values (käytetään käyttäjä-/kurssituonneissa) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (API-arkkitehtuurityyli) |
| **GDPR** | General Data Protection Regulation (EU:n tietosuoja-asetus) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (sähköpostin autentikointi) |
| **DKIM** | DomainKeys Identified Mail (sähköpostin autentikointi) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |