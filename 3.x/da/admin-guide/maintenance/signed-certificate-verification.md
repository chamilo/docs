# Verifikation af underskrevne certifikater

Chamilo kan udstede **digitalt underskrevne legitimationsoplysninger** for karakterbogscertifikater og eventuelt forankre et fingeraftryk af legitimationsoplysningen på **Sepolia Ethereum-testnetværket**. Signatur- og verifikationssiden adskiller sig fra almindelige PDF-certifikater.

## Aktivér underskrevne legitimationsoplysninger

Under **Administration > Konfigurationsindstillinger > Certifikater** skal du aktivere `certificate.blockchain_verification_enabled`, hvis din institution ønsker at bruge denne funktion. Den er deaktiveret som standard. Portalen skal bruge HTTPS til udstedelse af legitimationsoplysninger.

## Den lærendes samtykke kommer først

Ejeren af et certifikat åbner **Mine certifikater** og vælger udtrykkeligt **Godkend offentliggørelse**. Samtykket omfatter en offentligt verificerbar legitimationsoplysning, der viser indehaverens navn, kursus, score og udstedelsesdato samt eventuelt SHA-256-fingeraftrykket på Sepolia. Godkendelse sker ikke automatisk. Den lærende kan senere vælge **Træk samtykke tilbage**; tilbagetrækning påvirker den gyldighed, der vises på verifikationssiden, men **kan ikke slette et allerede bekræftet blockchain-fingeraftryk**.

## Udsted, verificér og tilbagekald

En direkte autentificeret platformsadministrator kan bruge karakterbogens liste **Certifikater** til at udstede den underskrevne legitimationsoplysning, når ejeren har givet samtykke. Det resulterende verifikationslink bruger `/certificates/verify/{token}`; et `.json`-verifikationssvar er også tilgængeligt. Siden kontrollerer den kryptografiske signatur, samtykke, tilbagekaldelse, udløb og om de underliggende certifikatoplysninger stadig stemmer overens med den underskrevne kilde.

Hvis en legitimationsoplysning tilbagekaldes, samtykket trækkes tilbage, certifikatet ændres, eller signaturen er ugyldig, angiver verifikatoren denne status i stedet for at rapportere en gyldig legitimationsoplysning.

## Valgfri Sepolia-forankring

En administrator kan vælge **Forankr på Sepolia-testnet** ved hjælp af en understøttet browser-wallet eller **Bekræft eksisterende Sepolia-transaktion** for at afstemme en afventende transaktion. Walleten skal være forbundet til Sepolia (chain ID `11155111`). Applikationen bekræfter transaktionen ved hjælp af et serverkonfigureret **HTTPS Sepolia RPC-endpoint** (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Ingen RPC-URL leveret i anmodningen accepteres.

Kun fingeraftrykket af legitimationsoplysningen forankres; personoplysninger indsendes ikke som transaktionsdata. Sepolia er et **testnet**. Dets registreringer og tilgængelighed må ikke præsenteres som en produktionsklar garanti fra en offentlig blockchain. Opbevar institutionsnøgler og RPC-konfiguration sikkert, og planlæg procedurer for nøglegendannelse og tilbagekaldelse af legitimationsoplysninger.

Implementering: [Verifikation af certifikatlegitimationsoplysninger #9298](https://github.com/chamilo/chamilo-lms/pull/9298).