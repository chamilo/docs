# Etasjeplaner for avdelinger og romkart

Chamilo 3.1 kan knytte et etasjeplanbilde til en avdeling og markere romposisjoner på bildet med interaktive polygoner. Funksjonen hjelper deltakere med å finne tildelte rom; den er **ikke** et geografisk GPS-kart.

## Knytt til en etasjeplan for avdelingen

1. Åpne administrasjonsområdet for **Avdelinger** og rediger den aktuelle avdelingen.
2. Finn panelet **Etasjeplan**.
3. Velg eller last opp bildet, og velg **Knytt til etasjeplan** (eller **Endre etasjeplan** hvis en allerede finnes).
4. Lagre eller bekreft avdelingsendringene etter behov, og kontroller deretter at etasjeplanbildet lastes inn.

Hvis en plan ikke lenger er gyldig, bruk **Fjern etasjeplan** etter å ha kontrollert hvilke rom som refererer til den. Last bare opp pålitelig innhold, og følg tillatelsene på administrasjonsskjermen for avdelinger.

## Tegn opp rom

1. Rediger et rom som er tilordnet den avdelingen.
2. Finn **Rom på etasjeplan** i romskjemaet.
3. Bruk polygonverktøyet til å tegne rommets omriss. Bruk **Rediger** for å justere hjørnepunkter; alle punkter må ligge innenfor bildet.
4. Velg **Lagre romområde**, og lagre deretter romskjemaet for å beholde endringene.
5. Åpne en romvisning for å bekrefte riktig posisjon. Bruk **Fjern romområde** hvis kartleggingen skal fjernes.

Et rom har ett redigerbart polygon om gangen. Romkartlegging er atskilt fra bildet på avdelingsnivå, så oppdatering av bildet kan kreve kontroll av eksisterende romgrenser.

## Hvor kartene vises

Autoriserte brukere kan se etasjeplaner for rom når rom velges eller vises i kursinformasjon, kalenderhendelser og oppmøterelaterte flyter. Kontroller synligheten med rollene som faktisk skal se informasjonen, særlig studenter og sesjonsdeltakere.

Tilgangstillatelser for avdeling og rom gjelder også for etasjeplanressurser. I installasjoner med flere URL-er må du kontrollere riktig isolasjon mellom portal og avdeling før kart publiseres.

Se [Administrere rom](managing-rooms.md) og [Søk etter romtilgjengelighet](room-availability-finder.md). Implementeringer: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).