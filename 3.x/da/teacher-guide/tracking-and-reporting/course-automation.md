# Kursusautomatisering (manuelle udløsere)

Afsnittet **Automatisering** under kursusrapportering giver autoriserede undervisere mulighed for at konfigurere handlinger ved starten og afslutningen af et kursus. I den aktuelle implementering af Chamilo 3.1 **udløses handlingerne manuelt**: antag ikke, at de kører automatisk på en kalenderdato eller via cron.

## Konfigurer handlinger

1. Åbn et kursus som underviser eller som en anden bruger, der har tilladelse til at administrere kursusrapportering.
2. Åbn **Rapportering**, og find afsnittet **Automatisering**.
3. Vælg hændelsen (**Kurset åbner nu** eller **Kurset slutter nu**) og en handlingstype.
4. Angiv det mål, som handlingen kræver, og vælg derefter **Tilføj handling**.
5. Gennemgå listen **Konfigurerede handlinger**, og fjern en uønsket post med dens handling **Slet**.

Understøttede handlinger omfatter publicering eller skjulning af kursusressourcer, afsendelse af invitations til undersøgelser, udstedelse af eksisterende certifikater og ændring af kursussynlighed. De tilgængelige ressourcer, undersøgelser, Gradebook-indstillinger og synlighedsværdier afhænger af kurset og den aktuelle brugers tilladelser.

## Kør den konfigurerede hændelse

Vælg **Kurset åbner nu** eller **Kurset slutter nu**, og bekræft handlingen. Gennemgå det rapporterede resultat. Chamilo registrerer gennemførte kørsler, forhindrer dublerede konfigurationer og springer handlinger over, der allerede er gennemført med succes ved efterfølgende kørsler. Et andet klik bør ikke betragtes som en måde at gensende en gennemført handling på.

Ved udstedelse af certifikater skal det relevante certifikat først forberedes og testes. Ved invitations til undersøgelser skal det kontrolleres, at undersøgelsen er konfigureret, og at de tilsigtede kursister tilhører den aktuelle kursus- eller sessionskontekst.

## Vigtige begrænsninger

- Denne grænseflade giver **manuel udførelse**, ikke planlagt automatisering.
- Handlinger udføres inden for den aktuelle kursus-/sessionskontekst; test adgang og mål for begge kontekster, hvor det er relevant.
- Handlinger, der er gennemført med succes, gentages ikke automatisk ved senere kørsler.
- På tidspunktet for funktionens PR var udstedelse af certifikater, ændringer af kursussynlighed og sessionsspecifik udførelse kodegennemgået, men ikke funktionelt verificeret i den pågældende PR. Test dem på din installation, før du baserer driften på dem.

Se [Kursusrapporter](course-reports.md) og [Certifikater og færdigheder](certificates-and-skills.md). Implementering: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).