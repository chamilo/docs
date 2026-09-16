# Algemene workflow van plug-ins

De \(verkorte\) plug-ins workflow als volgt:

* je maakt het plugin.php-bestand en de index.php aan
* je configureert dan waar het te zien zal zijn \(in de plugins sectie van het administratie paneel\)
* de main/inc/lib/template.lib.php class \(rond regel 140 \) "laadt" de plug-ins regio's
* regio's worden gedefinieerd in main/inc/lib/plugin.lib.php en de methode &quot;get\ _installed\ _plugins\ _by\ _region&quot; stelt u in staat om te weten welke plug-in moet worden ingeschakeld in een specifieke regio van de gebruikersinterface
* \(terug naar template.lib.php ~140\) de template lib &quot;laadt&quot; de plug-ins binnen specifieke template variabelen genaamd "plugin\_\[region\]"
* de gedefinieerde sjabloonvariabelen worden vervolgens weergegeven door elke .tpl die ze laadt

TPL \(template\) bestanden in de directory main/template/default/ directory \(zie sjabloongedeelte hierboven\).

Bijvoorbeeld, voor de normale "2-kolommen" weergave van de cursuslijst \(zoals in user_portal.php\), kun je layout/layout\_2col.tpl controleren, en in het algemeen laden ze {{plugin_\[region\]}} variabelen afhankelijk van de regio die de plug-in definieert. Op dit moment is er geen "regio" gedefinieerd voor de cursuslijst, dus als je daar een plug-in wilt laten verschijnen, moet je een nieuwe regio \(beide binnen een van de .tpl-bestanden en in plugin.lib.php\), of je zou respectievelijk het menu\_top en menu\_bottom kunnen gebruiken \(ik denk dat deze voor het linker/rechter menu zijn\).

