# Luokat / käyttäjäryhmät

Hallintapaneelin luokat ovat koko alustan laajuisesti käytettäviä ryhmiä, joilla käyttäjiä järjestetään hallinnollisiin tarkoituksiin. Ne eroavat kurssitason ryhmistä (jotka opettajat luovat kurssin sisällä).

> Käyttäjäryhmät ja [luokat](../../admin-guide/sessions/classes.md) käyttävät samaa käyttöliittymää. Ainoa ero on **ryhmätyyppi**-asetus: valitse "Class" luodaksesi luokan (käytetään istuntojen joukkokirjautumiseen) tai "User group" sosiaalisemmille ryhmille, joilla voi olla oma tila sisäisessä sosiaalisessa verkostossa. Katso [Luokat](../../admin-guide/sessions/classes.md) saadaksesi lisätietoja istuntoihin kirjaamisesta.

## Ryhmän luominen

![Käyttäjäryhmien luettelo, jossa näkyvät käytettävissä olevat ryhmät nimen, kuvauksen ja jäsenmäärän kanssa](../../.gitbook/assets/admin-user-groups-list.png)

1. Siirry hallintapaneelista kohtaan **Classes**
2. Napsauta **Add classes**
3. Anna **title** ja valinnainen **description**
4. Valitse **Social group**, jos kyseessä on sosiaalinen ryhmä. Jätä valitsematta, jos kyseessä on luokka.
5. Lisää valinnainen viite-URL ja kuva/logo.
6. Valitse ryhmän **permissions**:
   * **Open** — Kuka tahansa käyttäjä voi liittyä
   * **Closed** — Käyttäjät on lisättävä ylläpitäjän toimesta
7. Valitse, saavatko jäsenet poistua luokasta itse.
8. Tallenna.

## Jäsenten lisääminen

1. Avaa luokkien/käyttäjäryhmien luettelo
2. Napsauta käyttäjäkuvaketta **Subscribe users to class**
3. Etsi käyttäjiä nimen, käyttäjätunnuksen tai sähköpostin perusteella
4. Valitse lisättävät käyttäjät oikealla olevilla nuolilla
5. Napsauta vahvistuspainiketta tallentaaksesi

## Käyttötapaukset

* **Osastojen organisointi** — Ryhmittele käyttäjät osaston tai tiimin mukaan
* **Joukkokirjaus** — Lisää kaikki ryhmän jäsenet kurssille tai istuntoon kerralla
* **Kohdennettu viestintä** — Lähetä ilmoituksia tietyille ryhmille
* **Raportointi** — Tarkastele koulutuksen edistymistä ryhmän mukaan suodatettuna

## Ryhmien hallinta

* **Edit** — Muuta ryhmän nimeä, kuvausta tai näkyvyyttä
* **Manage members** — Lisää tai poista jäseniä
* **Delete** — Poista ryhmä (ei poista jäsenien käyttäjätilejä)