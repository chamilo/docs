# Vérification de liens

Dans Chamilo, il vous est possible de vérifier la validité d'un lien. Pour cela, cliquez sur la petite icône de double flèche à droite du lien. Après quelques secondes, une icône apparaît à côté du lien. Si elle est verte, cela signifie que le lien est accessible. Si l'icône est rouge, le liens est cassé.

![](../../.gitbook/assets/image202%20%281%29.png)Illustration 131: Liens - Vérificateur de lien – Lien valide

![](../../.gitbook/assets/image203%20%281%29.png)Illustration 132: Liens - Vérificateur de lien - Lien mort

Le vérificateur de liens fait un essai de connexion à la page indiquée **depuis le serveur**, ce qui implique que le serveur doit avoir la capacité de lancer des appels de ce genre. Il est nécessaire, pour que cette fonctionnalité soit opérative, que le serveur dispose de la librairie CURL ainsi que de son « binding » avec PHP sous forme de l'extension php-curl. Vérifiez auprès de votre administrateur si c'est bien le cas.

