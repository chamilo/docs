# Plattformsinställningar

Chamilo har ett omfattande konfigurationssystem med inställningar organiserade i kategorier. Den fullständiga uppsättningen kategorier nedan speglar sidan **Konfigurationsinställningar** i administrationspanelen — och den underliggande `SettingsCurrentFixtures.php` i källkoden, som är sanningens källa för variabelnamn, titlar och beskrivningar.

Öppna plattformsinställningarna från administrationspanelen genom att klicka på **Konfigurationsinställningar**.

![Sidan för plattformsinställningar som visar konfigurationskategorier organiserade efter funktionsområde](../../.gitbook/assets/admin-settings-categories.png)

## Alla kategorier

Det finns totalt **39 konfigurationskategorier**, listade alfabetiskt nedan. Siffran efter varje länk är antalet inställningar i den kategorin.

### Plattformsövergripande

* **[Administratörsidentitet](admin-settings.md)** (12) — Identitet och kontaktuppgifter för plattformsadministratören.
* **[Plattform](platform-settings.md)** (29) — Identitet på plattformsnivå, tidszon, registreringspolicy, användare online, prestandaflaggor.
* **[Visning](display-settings.md)** (24) — Startsideslayout, gravatar, menyer, varumärkesbeteende.
* **[Redigerare](editor-settings.md)** (26) — Verktygsfält, insticksprogram och AI-hjälpare för rich-text-redigeraren (TinyMCE).
* **[Språk](language-settings.md)** (12) — Tillgängliga språk, standardspråk, reservspråk.
* **[E-post](mail-settings.md)** (18) — Layout för utgående e-post, avsändaridentitet, signatur.
* **[Arbetsflöden](workflows-settings.md)** (23) — Tvärgående arbetsflödesväxlar (kurskapande, validering av inskrivning…).

### Autentisering, säkerhet och integritet

* **[Säkerhet](security-settings.md)** (31) — Inloggningsskydd, lösenordspolicy, headers, 2FA, IDS.
* **[Registrering](registration-settings.md)** (20) — Policy för självregistrering och omdirigeringar efter registrering.
* **[Integritet](privacy-settings.md)** (6) — Samtycke, dataexport, begäranden om kontoradering.
* **[CAS](cas-settings.md)** (7) — Äldre CAS-konfiguration övertagen från 1.x.

### Kurs- och sessionslivscykel

* **[Kurs](course-settings.md)** (45) — Standardvärden och policyer som gäller kurser plattformsövergripande.
* **[Sessioner](session-settings.md)** (68) — Sessionslivscykel, handledares åtkomstfönster, synlighet.
* **[Kurskatalog](catalog-settings.md)** (13) — Beteende för den publika kurskatalogen.
* **[Profil](profile-settings.md)** (29) — Vilka fält som visas på användarprofilen.

### Kursverktyg

* **[Agenda](agenda-settings.md)** (11)
* **[Meddelanden](announcement-settings.md)** (9)
* **[Uppgifter (Work)](work-settings.md)** (12)
* **[Närvaro](attendance-settings.md)** (4)
* **[Chatt](chat-settings.md)** (5)
* **[Dokument](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Övningar (Tester)](exercise-settings.md)** (63)
* **[Forum](forum-settings.md)** (9)
* **[Ordlista](glossary-settings.md)** (3)
* **[Grupper](group-settings.md)** (3)
* **[Inlärningsvägar](lp-settings.md)** (51)
* **[Enkäter](survey-settings.md)** (12)

### Bedömning och erkännande

* **[Betygsbok (Bedömningar)](gradebook-settings.md)** (34) — Poängvisning, decimaler, trösklar för certifikat.
* **[Certifikat](certificate-settings.md)** (9) — Standardvärden som tillämpas när en lärande erhåller ett certifikat.
* **[Färdigheter](skill-settings.md)** (13) — Färdighetsträd, tilldelningsregler, profilintegration.
* **[Uppföljning](tracking-settings.md)** (10) — Vad som registreras, vilka rapporter som exponeras.

### Kommunikation och gemenskap

* **[Meddelanden](message-settings.md)** (7)
* **[Socialt nätverk](social-settings.md)** (7)

### AI

* **[AI-hjälpare](ai-helpers-settings.md)** (13) — Leverantörer per uppgiftstyp (text, bild, video, handledare, rättning).

### Drift och integration

* **[Cron-jobb](crons-settings.md)** (3)
* **[Sök](search-settings.md)** (3) — Konfiguration av Xapian fulltextsökning.
* **[Ärenden](ticket-settings.md)** (7) — Helpdesksystem.
* **[Webbtjänster](webservice-settings.md)** (7) — Äldre SOAP/REST-slutpunkter.

## Hur inställningar fungerar

* Inställningar lagras i databasen (tabellen `settings`) och hanteras via webbgränssnittet
* Vissa inställningar är **URL-låsta** i installationer med flera URL:er (deras värde gäller plattformsövergripande och kan inte åsidosättas per URL – se kolumnerna `access_url_locked` och `access_url_changeable` i tabellen `settings`); andra (de flesta) kan åsidosättas per åtkomst-URL
* Ändringar träder i kraft omedelbart (ingen omstart av servern krävs), även om din användarsession kan hålla några av dem i minnet. Om ändringar inte syns omedelbart, logga ut och in för att rensa sessionen.
* Vissa inställningar har beroenden — att ändra en kan påverka andras beteende
* Variabelnamn som visas på varje sida (t.ex. `2fa_enable`) matchar raden i databastabellen `settings` (kolumnen `variable`) och nycklarna som används i åsidosättningar (`config/settings_overrides.yaml`) där det är tillämpligt.

För mer information, se [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) på vår wiki.

## Tips

* **Dokumentera dina inställningar** — För ett register över inställningar som inte är standardvärden och varför du ändrade dem
* **Ändra en sak i taget** — När du felsöker, ändra en inställning i taget så att du kan identifiera effekten
* **Testa i en staging-miljö** — För betydande inställningsändringar, testa först på en staging-server