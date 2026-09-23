# Administrere programtillegg

## Tilgang til programtilleggsbehandleren

![Programtilleggsbehandleren som viser en liste over tilgjengelige programtillegg med aktiveringsbrytere og konfigurasjonsvalg](../../.gitbook/assets/admin-plugin-manager.png)

Fra administrasjonspanelet klikker du **Administrer programtillegg** for å se listen over tilgjengelige programtillegg.

## Tilstander for programtillegg

Hvert programtillegg har én av to tilstander:

* **Aktivt** — Programtillegget er slått på, og funksjonene er tilgjengelige på plattformen
* **Inaktivt** — Programtillegget er installert, men deaktivert

## Aktivere et programtillegg

1. Finn programtillegget i listen
2. Klikk **Install**, deretter **Enable**, eller slå det på
3. Konfigurer innstillingene for programtillegget (hvis aktuelt, finn knappen **Configure**)
4. Lagre
5. Hvis det anbefales i README, aktiver det i en bestemt **region**

Noen programtillegg legger til verktøy i kurs, nye sider på plattformen eller tilleggsfunksjonalitet til eksisterende funksjoner.

## Konfigurere et programtillegg

Mange programtillegg har konfigurasjonsvalg. Etter at du har aktivert et programtillegg:

1. Klikk knappen **Configure** ved siden av programtillegget
2. Fyll inn den nødvendige konfigurasjonen (API-nøkler, URL-er, valg osv.)
3. Lagre

## Deaktivere et programtillegg

1. Finn programtillegget i listen
2. Klikk **Disable** eller slå det av
3. Funksjonene til programtillegget fjernes umiddelbart fra plattformen, men programtillegget er fortsatt installert og beholder konfigurasjonen inntil du **Uninstall** det

Å deaktivere et programtillegg sletter ikke dataene. Hvis du aktiverer det senere, er dataene fortsatt tilgjengelige.

## Tips

* **Aktiver bare det du trenger** — Hvert aktive programtillegg gir noe merbelastning. Hold ubrukte programtillegg deaktivert.
* **Test før produksjon** — Aktiver nye programtillegg i et testmiljø først
* **Sjekk kompatibilitet** — Etter oppgradering av Chamilo, kontroller at alle aktive programtillegg fortsatt fungerer korrekt