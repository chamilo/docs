# Toimintojen auditointi

Toimintojen auditointiraportti antaa selata tärkeitä hallinnollisia ja alustan toimintoja tapahtumatyypin mukaan suodatettuna. Se on sama taustalla oleva raportti, joka oli aiemmin saatavilla kohdasta **Seuranta > Hallinnollisen toiminnan auditointi**; se on nyt linkitetty suoraan myös Tietoturva-lohkosta, koska se on ensisijaisesti tietoturvan ja vastuun työkalu.

## Toimintojen auditoinnin avaaminen

Hallintapaneelista valitse **Tietoturva > Toimintojen auditointi**.

## Mitä se näyttää

![Toimintojen auditointisivu, jossa on tapahtumatyyppikategorioita, kuten Kurssi, Istunto, Käyttäjä, Sosiaalinen, Viesti, Resurssi, Wiki ja Muu, joista kukin on laajennettavissa yksittäisiksi tapahtumatyypeiksi](../../.gitbook/assets/admin-security-activities-audit.png)

Tapahtumat on ryhmitelty kategorioihin:

* **Kurssi** — Kurssin luonti, poisto ja asetusten muutokset
* **Istunto** — Istunnon ja istuntokategorian luonti, poisto ja ilmoittautumismuutokset
* **Käyttäjä** — Tilin luonti, poisto, salasanapäivitykset, kenttämuutokset ja muuta
* **Sosiaalinen** — Sosiaalisen ryhmän luonti, poisto ja jäsenyysmuutokset
* **Viesti** — Viestidatan muutokset ja poistot
* **Resurssi** — Resurssin ja resurssilinkin luonti ja poisto
* **Wiki** — Wiki-sivujen katselut
* **Muu** — Kaikki muu, mukaan lukien laajennustoiminta, arviointikirjan lukitus, harjoitusyritysten poistot, pakotetut kirjautumisyritykset ja alustatason asetusten muutokset

Napsauta tapahtumatyypin sirua (esimerkiksi **Attempted Forced Login**) suodattaaksesi raportin vastaavien merkintöjen taulukoksi. Voit myös hakea suoraan avainsanalla **Haku**-kentällä tapahtumatyyppilistan yläpuolella.

## Käyttötapaukset

* Selvitä, kuka poisti kurssin, istunnon tai käyttäjätilin ja milloin
* Vahvista, tekikö odotettu ylläpitäjä tietyn hallinnollisen muutoksen (asetuspäivitys, laajennuksen asennus)
* Seuraa **Attempted Forced Login** -tapahtumia yhdessä [Kirjautumisyritykset](login-attempts.md) -raportin kanssa