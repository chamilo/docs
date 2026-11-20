# Sundhedstjek

Sundhedstjek er en lille blok på administrationsdashboardet, som kører en håndfuld live-tjek på din installation og markerer alt, der kræver opmærksomhed — uden at du skal grave i konfigurationsfiler for at opdage almindelige fejlkonfigurationer.

![Blokken Sundhedstjek på administrationsdashboardet, der viser bestået/ikke bestået-status for e-mailindstillinger, tildeling af admin-URL og tjek af filrettigheder](/.gitbook/assets/admin-health-check-block.png)

## Adgang til Sundhedstjek

Fra administrationspanelet vises blokken **Sundhedstjek** sammen med de øvrige dashboardblokke — der er ikke behov for at klikke; resultaterne vises direkte.

## Tjekkene

* **E-mailindstillinger** — Kontrollerer, at en mailer-forbindelsesstreng og en "from"-e-mail/navn er konfigureret. Hvis ikke, linker den til Mailindstillinger, så det kan rettes.
* **Alle URL'er har mindst én tildelt administrator** — På en installation med flere URL'er kontrolleres det, at hver adgangs-URL har mindst én administrator, der kan administrere den. Hvis en URL mangler det, linker den til siden for tildeling af adgangs-URL/bruger.
* **`.env` er ikke skrivbar** — `.env` indeholder hemmeligheder og bør ikke være skrivbar for webserveren efter installation. Markeres som en fejl, hvis den er det; linker til Sikkerhedsguiden.
* **`config/` er ikke skrivbar** — Samme begrundelse som for `.env`: denne mappe bør ikke være skrivbar via web i normal drift. Linker til Sikkerhedsguiden.
* **`var/cache` er skrivbar** — Det omvendte tjek: Symfony skal kunne skrive til sin cache-mappe, så dette markeres som en fejl, hvis den *ikke* er skrivbar. Linker til guiden om ydeevnejustering / optimering.
* **Installationsmappen er ikke til stede** — Mappen `public/main/install` er kun nødvendig under installationen og bør fjernes bagefter. Dette markeres som en advarsel (ikke en hård fejl), hvis den stadig findes, da det er en risiko med lavere alvorlighed end de to skrivbarhedstjek ovenfor. Linker til Sikkerhedsguiden.

## Hvad du skal gøre ved det

Hvert tjek linker direkte til det sted, hvor du kan rette det underliggende problem — enten en indstillingsside eller den relevante guide. Gennemgå denne liste umiddelbart efter installationen og periodisk bagefter (for eksempel efter en manuel filoverførsel eller ændring af rettigheder), da et tjek, der består i dag, ikke garanterer, at det forbliver sådan. For en bredere tjekliste til hærdning i produktion ud over disse seks tjek, se [Sikkerhedsguiden](appendix/security-guide.md).