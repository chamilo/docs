# Vertrouwelijke meldingen

Chamilo bevat een optionele workflow voor **vertrouwelijke meldingen** waarmee zorgen over een andere gebruiker kunnen worden ingediend bij bevoegde onderzoekers. Dit is niet het gewone ondersteuningsticketinstrument en ook geen openbaar discussieforum.

## De functie inschakelen

Open **Beheer > Configuratie-instellingen > Beveiliging** en configureer:

| Instelling | Standaard | Doel |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | De workflow voor vertrouwelijke meldingen inschakelen |
| `security.confidential_reporting_min_reporters` | `2` | Minimumaantal afzonderlijke melders (2–10) voordat een onderzoek zichtbaar wordt |
| `security.confidential_reporting_attachments_enabled` | `true` | Bewijsbijlagen toestaan |
| `security.confidential_reporting_notifications_enabled` | `false` | Interne indicatoren tonen voor in aanmerking komende onderzoeken (geen e-mails) |

De implementatie vereist ook dat de versleuteling en de privéopslag voor vertrouwelijke meldingen op de server gereed zijn. Chamilo gebruikt de cryptografische PHP Sodium-functies en een privésleutel voor versleuteling; **bewaar en back-up die sleutel veilig**. Verlies ervan kan opgeslagen meldingen onleesbaar maken. Kopieer de sleutel niet naar een Git-repository. Schakel de functie niet in voordat u hebt gecontroleerd dat de opslag van de privésleutel en de vereiste databasemigraties operationeel zijn.

## Een melding indienen

1. Meld u rechtstreeks aan bij Chamilo en open **Vertrouwelijke meldingen** (wanneer dit voor het portaal is ingeschakeld).
2. Kies de betrokken persoon, voer een onderwerp in en beschrijf het incident.
3. Voeg bewijs toe als bijlagen zijn ingeschakeld.
4. Bepaal of onderzoekers voor deze specifieke melding uw **naam en e-mailadres** mogen zien. Deze toestemming kan later worden ingetrokken.
5. Verstuur de melding. Gebruik **Mijn vertrouwelijke meldingen** om de zaak te volgen en berichten uit te wisselen met een onderzoeker.

De identiteit van de melder wordt **standaard niet aan onderzoekers getoond**. Dit is een vertrouwelijkheidsmaatregel, geen belofte van absolute anonimiteit ten opzichte van de beheerders van het systeem.

## Onderzoeksrechten en drempels

Onderzoeken vereisen de specifieke machtiging `welfare:investigate` en een in aanmerking komende beheerders- of HR-rol. Een zaak wordt pas beschikbaar voor onderzoek nadat het geconfigureerde aantal **afzonderlijke melders** voor hetzelfde doel is bereikt. Een onderzoeker kan geen melding over zichzelf onderzoeken. HR-toegang is beperkt tot de gebruikers die de HR-manager volgt.

Onderzoekers openen **Vertrouwelijke onderzoeken** om in aanmerking komende zaken te bekijken, bewijs te beoordelen en berichten uit te wisselen. Zaken onder de drempel of zonder autorisatie worden niet via de onderzoeks-API beschikbaar gesteld. Administratieve **impersonatie** geeft geen toegang tot vertrouwelijke meldingen.

## Privacy en operationele zorg

Meldingen en bijgevoegd bewijs bevatten gevoelige persoonsgegevens. Beperk onderzoeksrechten, beperk toegang tot back-ups, stel een passend organisatorisch bewaarbeleid vast en test de workflow met afzonderlijke accounts voor melder, betrokkene en onderzoeker. Vermijd het kopiëren van volledige meldingen naar technische logboeken of issuetrackers.

Implementatie: [Vertrouwelijke meldingen #9310](https://github.com/chamilo/chamilo-lms/pull/9310).