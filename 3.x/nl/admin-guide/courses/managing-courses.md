# Cursussen beheren

Als beheerder kunt u alle cursussen op het platform beheren, ongeacht wie ze heeft aangemaakt.

## Cursuslijst

![De cursuslijst met alle cursussen, met titel, code, categorie, ingeschreven gebruikers en zichtbaarheidsstatus](../../.gitbook/assets/admin-course-list.png)

Klik in het beheerpaneel op **Cursuslijst** om alle cursussen te zien. De lijst toont:

* Cursustitel en -code
* Taal
* Categorieën
* Zichtbaarheidsstatus

Gebruik het hulpmiddel **Geavanceerd zoeken** om specifieke cursussen te vinden.

## Een cursus aanmaken

Als beheerder kunt u cursussen aanmaken en toewijzen aan elke docent:

1. Klik op **Cursus toevoegen** in het beheerpaneel
2. Vul de cursusgegevens in (titel, code, categorie, taal)
3. Wijs een docent toe aan de cursus
4. Opslaan

Opmerking: In Chamilo 1.11.x werd de cursuscode weergegeven als onderdeel van de cursus-URL en was deze na het aanmaken van de cursus niet meer te wijzigen. Dit gedrag is gewijzigd vanaf 2.x. De cursuscode is niet meer zichtbaar in de URL, en toekomstige versies zouden docenten mogelijk toestaan de cursuscode achteraf te wijzigen, omdat deze minder essentieel wordt voor het platform.

## Een bestaande cursus beheren

Zoek een cursus in de lijst om de beheeropties in de kolom *Acties* te openen:

* **Informatie** — Toon informatie over de cursus 
* **Cursushome** — Brengt u rechtstreeks naar de startpagina van de cursus 
* **Rapportage** — Bekijk betrokkenheids- en prestatiagegevens
* **Bewerken** — Wijzig cursustitel, categorie, zichtbaarheid en andere instellingen
* **Een back-up maken** — Ga naar het onderhoudsgedeelte van de cursus, waar u kopieën kunt maken en andere dingen kunt doen
* **Toevoegen aan catalogus** — Voeg deze cursus toe aan de cursuscatalogus
* **Verwijderen** — Verwijder de cursus en alle inhoud ervan definitief

> Het verwijderen van een cursus verwijdert alle inhoud, leerlinggegevens, cijfers en trackinginformatie definitief. Overweeg eerst de cursus te exporteren als back-up.

## Bulkacties

Selecteer meerdere cursussen in de lijst om batchacties uit te voeren, zoals het verwijderen ervan. Om een cursus te exporteren, gaat u de cursus binnen en gebruikt u het hulpmiddel **Onderhoud** — er is geen bulkexportactie op de admin-cursuslijst.

## Zichtbaarheidsinstellingen van cursussen

Beheerders kunnen de door docenten ingestelde zichtbaarheid overschrijven:

| Zichtbaarheid | Effect |
|-----------|--------|
| **Openbaar** | Toegankelijk voor iedereen, inclusief anonieme bezoekers |
| **Open** | Toegankelijk voor alle ingelogde gebruikers |
| **Privé** | Alleen ingeschreven gebruikers kunnen de cursus openen |
| **Gesloten** | Niemand kan de cursus openen (behalve de docent en beheerders) |
| **Verborgen** | Niemand kan de cursus bekijken of openen (behalve de beheerders) |