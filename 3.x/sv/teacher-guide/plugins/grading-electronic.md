# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exporterar de deltagare som har klarat din kurs, med deras poäng från betygsboken, till den fil som ett externt certifieringsorgan importerar: antingen en textfil med fast format eller ett kalkylblad med deltagarlista.

## Öppna exportblocket

När funktionen är aktiverad får verktygsfältet i kursens verktyg **Bedömningar** (betygsbok) en ikon för **Exportera**. Klicka på den för att visa blocket **Grading Electronic** på samma sida; klicka igen för att dölja det.

Blocket har tre fält:

* **Förhandsgranska** — markerat som standard. Så länge det är markerat sparas ingenting: blocket visar bara vad exporten skulle innehålla
* **Datumintervall** — kursens start- och slutdatum. Startdatumet hamnar i textfilens rubrikrad, slutdatumet är det datum då varje deltagare klarade kursen
* **Kurs-ID** — kursens identifierare hos certifieringsorganet. Det är förifyllt med det värde som användes vid föregående export

## Förhandsgranska exporten

När **Förhandsgranska** är markerat erbjuder blocket en enda knapp, **Förhandsgranska**. Den listar varje deltagare i kursen (eller i den session du befinner dig i) med deras poäng och statusen **PASS** eller **SKIP**, och visar textfilens innehåll. Endast deltagare som uppfyller betygsbokens kriterier för godkänt markeras med **PASS**; övriga utelämnas från exporten.

## Skapa filen

Avmarkera **Förhandsgranska** för att ersätta knappen **Förhandsgranska** med två knappar:

* **Generera TXT** — laddar ner textfilen med fast format: en rubrikrad med leverantörs-ID, kurs-ID och startdatum, därefter en rad per deltagare som klarat kursen
* **Generera XLSX** — laddar ner kalkylbladet med deltagarlistan, med en rad per deltagare som klarat kursen och kolumnerna **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** och **Comment**

Båda knapparna gör samma sak utöver filen: de sparar **Kurs-ID** till nästa export och, om betygsboken genererar certifikat, genererar certifikatet för varje deltagare som klarat kursen.

## Vad kalkylbladet innehåller

* **FireTRAQ ID** — deltagarens ID hos certifieringsorganet, hämtat från profilfältet `fcdice_or_acadis_student_id`
* **Score** — betygsbokens poäng som heltalsprocent (0 till 100), oavsett betygsbokens totala viktning
* **Grade** — alltid **Pass**, eftersom endast deltagare som klarat kursen exporteras. Cellen erbjuder fortfarande alternativen **Pass**, **Fail** och **Incomplete** om du behöver redigera filen
* **Date Earned** — slutdatumet i datumintervallet
* **Comment** — lämnas tomt

## Tips

* **Kontrollera deltagarnas ID först** — En deltagare utan ID i sin profil exporteras ändå, med ett tomt **FireTRAQ ID**. Använd förhandsgranskningen för att hitta dem innan du skapar filen
* **Leverantörs-ID och kurstimmar** kommer från kursens extrafält, som administratören anger när pluginet installeras