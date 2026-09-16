# Cursusafbeeldinggenerator

De AI-cursusafbeeldinggenerator laat u een miniatuurafbeelding voor uw cursus maken rechtstreeks vanuit het scherm met cursusinstellingen, in plaats van er zelf een te zoeken of te ontwerpen. Dit is de afbeelding die voor uw cursus wordt getoond in overzichten en in de [cursuscatalogus](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## De generator openen

De knop **Genereren met AI** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Genereren met AI" data-size="line"> is beschikbaar naast het veld **Cursusafbeelding**, mits:

1. AI-helpers op platformniveau zijn ingeschakeld
2. Ten minste één AI-provider die op uw platform is geconfigureerd, afbeeldingsgeneratie ondersteunt
3. De functie in uw cursus is toegestaan (zie **Instellingen AI-helpers** in [Cursusinstellingen](../creating-your-course/course-settings.md))

Open de **Instellingen** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Instellingen" data-size="line"> van uw cursus en scroll naar het veld **Cursusafbeelding**:

![Het veld Cursusafbeelding in Cursusinstellingen, met een knop Bestand kiezen en daaronder een knop Genereren met AI](/.gitbook/assets/course-picture-ai-button.png)

## Een afbeelding genereren

1. Klik op **Genereren met AI**
2. Er opent een dialoogvenster met een veld **Prompt** dat vooraf is ingevuld met een standaardbeschrijving; bewerk het om de illustratie te beschrijven die u wilt, of laat de standaardtekst staan

![Het dialoogvenster Genereren met AI met het veld Prompt en de standaardtekst, en de knoppen Annuleren/Genereren](/.gitbook/assets/course-picture-ai-modal.png)

3. Klik op **Genereren** en wacht — het genereren van een afbeelding kan enkele seconden duren
4. De gegenereerde afbeelding wordt automatisch in het veld **Cursusafbeelding** geplaatst en vervangt alles wat u daar eerder had geselecteerd
5. Bekijk een voorbeeld in het paneel **Voorbeeld** en klik vervolgens op de knop **Opslaan** van het formulier om de afbeelding daadwerkelijk op uw cursus toe te passen — het genereren van de afbeelding slaat deze niet vanzelf op

Als u het resultaat niet mooi vindt, kunt u zo vaak als u wilt opnieuw genereren met een andere prompt voordat u opslaat.

## Wat in de prompt terechtkomt

Naast wat u typt, voegt Chamilo automatisch context toe zodat de AI een relevante, bij het merk passende afbeelding kan maken:

* De titel van uw cursus
* Het eerste onderdeel van de [Cursusbeschrijving](../creating-your-course/course-description.md) van uw cursus, als u er een hebt ingevuld — zodat de AI een indruk krijgt van de daadwerkelijke stof
* Het kleurthema van uw platform (primair, secundair, tertiair), zodat de illustratie kleuren gebruikt die consistent zijn met uw portal

De afbeelding wordt gegenereerd in een vlakke, breedbeeldillustratiestijl (16:9), zonder leesbare tekst, logo's of fotorealistische personen — passend bij het formaat dat voor een cursusminiatuur wordt verwacht.

## Tips

* **Vul eerst een cursusbeschrijving in** — omdat die de prompt voedt, krijgt een cursus met een echte beschrijving doorgaans een relevantere illustratie dan een zonder
* **Wees specifiek over stijl, niet over inhoud** — de cursustitel en -beschrijving verankeren het onderwerp al; gebruik uw prompt voor stijlaanwijzingen (kleurstemming, metafoor, compositie) in plaats van het onderwerp opnieuw te beschrijven
* **Genereer opnieuw in plaats van te berusten** — elke klik levert een nieuwe poging op zonder extra stappen; probeer een paar varianten voordat u er een kiest
* **Vergeet niet op te slaan** — de knop vult alleen het afbeeldingsveld in; als u weggaat zonder op te slaan, gaat de gegenereerde afbeelding verloren
* **Als het genereren mislukt, vraag uw beheerder** — een uitgeschakelde functie, een niet-geconfigureerde afbeeldingsprovider of een uitgeput maandelijkse AI-gebruiksquota leiden hier tot een foutmelding; uw beheerder kan de [AI-configuratie](../../admin-guide/integrations/ai-configuration.md) controleren