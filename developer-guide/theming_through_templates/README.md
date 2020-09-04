# Thema's door middel van sjablonen

![](https://github.com/chamilo/docs/tree/fbd412b43ccca034e3bced0a85bedab44d5b579f/es/developer/assets/images14.png) ![](https://github.com/chamilo/docs/tree/fbd412b43ccca034e3bced0a85bedab44d5b579f/es/developer/assets/images13.png) ![](https://github.com/chamilo/docs/tree/fbd412b43ccca034e3bced0a85bedab44d5b579f/es/developer/assets/images15.png) Chamilo gebruikt sinds versie 1.10 de Twig-sjabloonengine voor de meeste \(en in de toekomst\) alle interface.

Om de sjabloon in Chamilo bij te werken, kunt u een van de volgende twee dingen doen: sommige sjabloonbestanden opnieuw definiëren in `main/template/override/` OF de map `standaard` kopiëren en een regel wijzigen in `app/config/configuration.php`, als volgt deze procedure :

```text
cd main/template/
cp -r default newtemplate
cd newtemplate
// edit the new template to your heart's contempt
vim ../../app/config/configuration.php
// Find the $_configuration['default_template'] setting and replace
// 'default' by 'newtemplate', then uncomment it (remove the // prefix)
// Finally, refresh the archives (find the « Archive cleanup » option on
// the admin page
```

Op deze manier kunt u alles in uw nieuwe sjabloon bewerken, terwijl u de originele sjabloon beschikbaar houdt, en voorkomt u ook dat uw sjabloon wordt overschreven tijdens uw volgende Chamilo-upgrade.

Het is echter belangrijk om te begrijpen dat elke aangepaste sjabloon moet worden gehandhaafd: als een nieuw .tpl-bestand wordt gemaakt in de default/template map in Chamilo, dan moet dit nieuwe .tpl-bestand worden toegevoegd aan uw aangepaste sjabloon. In het geval van de _override/_ map is het, hoewel het niet nodig is om het corresponderende bestand aan te maken, toch nodig om ervoor te zorgen dat er geen nieuwe informatie wordt toegevoegd aan het default/ .tpl-bestand die anders niet in de override zou verschijnen. Deze wijzigingen kunnen worden gevolgd via de geschiedenis van wijzigingen in de default/ directory op Github: [https://github.com/chamilo/chamilo-lms/commits/1.11.x/main/template/default](https://github.com/chamilo/chamilo-lms/commits/1.11.x/main/template/default)

In de _default_ directory vind je de volgende directories, die we indien nodig uitleggen \(de meeste spreken voor zich\).

* admin
* agenda
* auth → alle dingen met betrekking tot authenticatieformulieren en -processen
* course\_description
* create\_course
* export
* form
* glossary
* index → homepage voor anonieme gebruikers en aankondigingen
* layout → koptekst, voettekst, banner en meer worden hier opgeslagen
* learnpath 
* link 
* mail\_editor
* notebook
* pages
* social
* skill
* userportal → lijst cursussen op het tabblad «Mijn cursussen»
* work

