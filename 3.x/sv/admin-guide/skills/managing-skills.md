# Hantera färdigheter

Den här sidan beskriver de tre menyerna i kontrollpanelen som används för att bygga upp plattformens färdighetskatalog: massimport av färdigheter, hantering av själva färdighetsdefinitionerna och tilldelning av varje färdighet till en nivåskala.

## Skills Import

**Skills > Skills import** låter dig massskapa en färdighetshierarki från en CSV- eller XML-fil, i stället för att skapa färdigheter en i taget. Varje rad behöver minst ett `id`, ett `parent_id` (för att bygga trädet) och en `title`. En exempelmall finns tillgänglig att utgå från.

## Manage Skills

**Skills > Manage skills** är den huvudsakliga färdighetskatalogen: skapa, redigera, aktivera/inaktivera och ta bort färdigheter. Varje färdighet har en titel, en kort kod, en beskrivning, en ikon och en valfri kriteriebeskrivning (vad en deltagare behöver göra för att erhålla den). Färdigheter kan nästlas — en färdighet kan ha underfärdigheter — vilket är det som [Skills Wheel](skills-wheel.md) visualiserar.

## Manage Skills Levels

**Skills > Manage skills levels** är en separat, mindre skärm: den listar befintliga färdigheter och låter dig tilldela var och en till en **nivåprofil** — en namngiven, ordnad uppsättning nivåer (till exempel Brons/Silver/Guld) som färdigheten mäts mot. Kort sagt: använd **Manage skills** för att definiera vad en färdighet *är*, och **Manage skills levels** för att definiera vilken skala den mäts på.

## Hur färdigheter tilldelas

En färdighet tilldelas en användare (registreras som en utfärdad färdighet, med ett datum) via någon av följande vägar:

* Automatiskt, när en deltagare når tröskelvärdet för en gradebook-kategori — konfigureras på sidan [Skills and Assessments](skills-assessments.md)
* Automatiskt, vid slutförande av specifika kurser som färdigheten är kopplad till
* Manuellt, av en lärare (om **Teachers can assign skills** är aktiverat) eller en administratör