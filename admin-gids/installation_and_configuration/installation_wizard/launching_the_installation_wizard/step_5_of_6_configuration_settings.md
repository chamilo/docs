# Stap 5 van 6: Configuratie-instellingen

Elke instelling van deze stap kan na de installatie worden gewijzigd via de Chamilo _Administration_-pagina, **behalve** voor de _Encryption-methode_ en de _Portal-URL._

Het is bijna onmogelijk om achteraf de _Encryptiemethode_ te wijzigen, omdat het zou betekenen dat alle gebruikers nieuwe wachtwoorden moeten genereren en deze per e-mail zouden verzenden. De standaardoptie is altijd de veiligste, dus we raden u aan **deze te laten** zoals hij is.

_Portal URL_ kan worden bijgewerkt, maar alleen via het configuratiebestand, wat lastig kan zijn. Selecteer deze twee verstandig.

* _Hoofdtaal:_ standaardtaal op uw portaal.
* _Chamilo URL:_ URL van uw Chamilo-portaal \(lokaal: [http://localhost/chamilo](http://localhost/chamilo); op afstand: [http://www.mijndomein.com/chamilo](http://www.mijndomein.com/chamilo)\).
* _Admin's e-mail:_ portaalbeheerder e-mail contactadres \(of ondersteuningsteam\)
* _Admin's voornaam en achternaam:_ zullen in de voettekst worden getoond als de link naar het e-mailadres van de admin. U kunt daar alle informatie plaatsen, zoals "Support team" als voorbeeld.
* _Admin's login en wachtwoord:_ **BELANGRIJK** - hiermee kunt u later als administrator verbinding maken met uw portaal. Een optie is om hier een algemeen functioneel beheerdersaccount \(genaamd "admin"\) in te stellen en meerdere mensen dat account te laten gebruiken. Het wordt echter aanbevolen om voor elke beheerder een persoonlijker account aan te maken \(dus deze eerste moet van jou zijn\), om alle acties van andere beheerders te kunnen volgen.
* _De naam van het portaal en de korte naam van de organisatie:_ zijn alleen zichtbaar in specifieke visuele thema's in de linkerbovenhoek van de pagina \(op alle pagina's\).
* _Versleutelingsmethode:_ hashing en cryptografische functies die zullen worden gebruikt om de wachtwoorden van gebruikers in uw database te beveiligen. We raden \(en selecteren standaard\) de veiligste aan die beschikbaar is in Chamilo: SHA1.
* _Zelfregistratie:_ staat de gebruiker toe om alleen te registreren; ingesteld op _No_ voor een privéportaal.
* _Zelfregistratie als leraar:_ stelt de gebruiker in staat om zich alleen als leraar te registreren; wordt alleen in aanmerking genomen als de vorige instelling is ingesteld op _Ja_. Hierdoor kunnen nieuwe gebruikers zich registreren als docent en zo nieuwe cursussen aanmaken.

**Opmerking**: de gebruiker die op dit scherm is gedefinieerd, heeft volledige beheerdersrechten. Hij kan daarna de instellingen op deze pagina bijwerken.
