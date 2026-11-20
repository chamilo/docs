# Verifiering av signerade certifikat

Chamilo kan utfärda **digitalt signerade meriter** för betygsbokscertifikat och valfritt förankra ett meritfingeravtryck på **Sepolia Ethereum-testnätverket**. Signatur- och verifieringssidan skiljer sig från vanliga PDF-certifikat.

## Aktivera signerade meriter

Under **Administration > Konfigurationsinställningar > Certifikat**, aktivera `certificate.blockchain_verification_enabled` om din institution avser att använda denna funktion. Den är inaktiverad som standard. Portalen måste använda HTTPS för att utfärda meriter.

## Deltagarens samtycke kommer först

Ett certifikats ägare öppnar **Mina certifikat** och väljer uttryckligen **Godkänn publicering**. Samtycket omfattar en offentligt verifierbar merit som visar innehavarens namn, kurs, poäng och utfärdandedatum, samt valfritt SHA-256-fingeravtrycket på Sepolia. Godkännande sker inte automatiskt. Deltagaren kan senare välja **Återkalla samtycke**; återkallelsen påverkar giltigheten som visas på verifieringssidan men **kan inte radera ett redan bekräftat blockkedjefingeravtryck**.

## Utfärda, verifiera och återkalla

En direkt autentiserad plattformsadministratör kan använda betygsbokens lista **Certifikat** för att utfärda den signerade meriten när dess ägare har samtyckt. Den resulterande verifieringslänken använder `/certificates/verify/{token}`; ett `.json`-verifieringssvar finns också tillgängligt. Sidan kontrollerar den kryptografiska signaturen, samtycket, återkallelsen, utgången och huruvida den underliggande certifikatinformationen fortfarande överensstämmer med den signerade källan.

Om en merit återkallas, samtycket dras tillbaka, certifikatet ändras eller signaturen är ogiltig, anger verifieraren den statusen i stället för att rapportera en giltig merit.

## Valfri förankring på Sepolia

En administratör kan välja **Förankra på Sepolia-testnätet** med en webbläsarplånbok som stöds eller **Bekräfta befintlig Sepolia-transaktion** för att stämma av en väntande transaktion. Plånboken måste vara ansluten till Sepolia (chain ID `11155111`). Applikationen bekräftar transaktionen med en serverkonfigurerad **HTTPS Sepolia RPC-endpoint** (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Ingen RPC-URL som tillhandahålls i begäran accepteras.

Endast meritens fingeravtryck förankras; personuppgifter skickas inte som transaktionsdata. Sepolia är ett **testnät**. Dess poster och tillgänglighet får inte presenteras som en produktionsklassad garanti från en offentlig blockkedja. Lagra institutionens nycklar och RPC-konfiguration säkert och planera för procedurer för nyckelåterställning och återkallelse av meriter.

Implementering: [Verifiering av certifikatmeriter #9298](https://github.com/chamilo/chamilo-lms/pull/9298).