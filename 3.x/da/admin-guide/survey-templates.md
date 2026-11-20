# Spørgeskemaskabeloner

Administratorer kan oprette genbrugelige spørgeskemaer og stille dem til rådighed for undervisere eller tildele dem direkte til kurser og sessioner. Denne funktion blev implementeret i [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) for [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Opret og vedligehold skabeloner

1. Åbn **Survey templates** i administrationspanelet, og vælg **Create**.
2. Angiv en titel og en valgfri undertitel; konfigurer anonymitet, spørgsmålslayout, blanding, varighed samt introduktions- og takketekst.
3. Gem, og tilføj eller rediger de genbrugelige spørgsmål i skabelonens spørgsmålseditor.
4. Aktivér **Visible as template**, hvis undervisere skal kunne se og genbruge den. En usynlig skabelon forbliver tilgængelig for administratoren.

Skabeloner tilhører den aktuelle adgangs-URL. Kun platformsadministratorer må oprette, redigere eller slette masterskabelonen. Undervisere kan bruge synlige skabeloner, men kan ikke ændre deres masterdefinition.

## Genbrug en skabelon i et kursus eller en session

I et autoriseret kursus eller en autoriseret session kan en underviser vælge en synlig skabelon, når der oprettes et nyt spørgeskema. Resultatet er et spørgeskema i den pågældende kursuskontekst, ikke en ændring af den genbrugelige masterskabelon. Underviseren kan gennemgå spørgsmålene og følge den sædvanlige arbejdsgang for publicering og invitation.

Fra administrationslisten over skabeloner kan en administrator i stedet tildele en skabelon direkte til et valgt **course** og eventuelt til en af det pågældende kursus' **sessions**. Chamilo kontrollerer, at kurset tilhører den aktuelle portal, og at den valgte session faktisk indeholder kurset. Undervisergrænsefladen kan ikke bruges til at tildele en skabelon til en andens kursus eller session.

Det nye spørgeskema publiceres ikke automatisk, blot fordi det er oprettet ud fra en skabelon; gennemgå det, før deltagerne inviteres. Se [Spørgeskemaer](../teacher-guide/assessing-learners/surveys.md) for den standardiserede arbejdsgang for spørgeskemaer.

## Skjul følsomme resultater for undervisere eller tutorer

Når et faktisk spørgeskema redigeres, kan en platformsadministrator aktivere **Results hidden from teacher/tutor**. Denne begrænsning pr. spørgeskema er beregnet til følsomme spørgeskemaer, f.eks. evalueringer af undervisningspersonale. Undervisere og tutorer kan stadig se antallet af besvarelser og sende påmindelser, men **kan ikke åbne rapporteringsvisninger eller eksportere resultaterne**. Platformsadministratorer bevarer adgang til rapportering, underlagt øvrige platformsindstillinger.

Denne indstilling adskiller sig fra det almindelige felt **Results visibility** og fra den platformsbrede indstilling **Hide survey reporting button**. Kun en administrator kan ændre flaget for begrænsede resultater.

## Tilladelser og omfang

* **Administrator:** administrere skabeloner, angive skabelonens synlighed, tildele til berettigede kurser/sessioner og styre adgang til begrænsede resultater.
* **Teacher / session teacher:** se og instantiere kun synlige skabeloner inden for deres autoriserede kursuskontekst.
* **Access URLs:** skabelonkataloget og tildelingen håndhæver den aktuelle adgangs-URL; skabeloner fra andre portaler kan ikke instantieres på tværs af grænsen.

Hvis skabeloner ikke vises for undervisere, skal du kontrollere **Visible as template** og deres kursus-/sessionskontekst. Hvis en skabelon ikke kan instantieres, skal du kontrollere de globale begrænsninger for oprettelse af spørgeskemaer og det tilsigtede mål-kursus/-session.