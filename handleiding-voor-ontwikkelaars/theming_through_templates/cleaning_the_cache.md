# De cache opschonen

Als je sjablonen gaat wijzigen, moet je één ding weten en onthouden: nadat je je wijzigingen hebt geschreven en voordat je ze test, moet je de inhoud van de map `app/cache/twig/` verwijderen.

Anders blijft de cache aanwezig en zie je geen \(of je ziet slechts enkele\) van je wijzigingen, waardoor je zou kunnen denken dat ze niet van kracht zijn geworden.

Deze opschoning wordt ook uitgevoerd wanneer u de optie "Archief/Cache opschonen" gebruikt op het hoofdbeheerscherm van uw Chamilo-portaal \("Systeem" -blok\).

Als alternatief kunt u Chash \(een opdrachtregelprogramma voor Chamilo\) gebruiken met het volgende commando:

```text
chash files:clean_temp_folder
```

Dat wil zeggen, als u Chash[6](https://github.com/chamilo/chash) heeft geïnstalleerd.

