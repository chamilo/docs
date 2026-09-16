# Modifier les styles

Les styles dans Chamilo peuvent être modifiés au travers de la copie simple de n'importe quel répertoire de styles de _chamilo/**app/Resources/public/css/themes**/_. Vous trouverez dans ce répertoire une série de répertoires de styles, comme par exemple _chamilo\_green_, qui peuvent être copiés, renommés et modifiés à souhait. Pour les tester, il vous suffit d'aller dans la section _Feuilles de styles_ de votre page de paramètres de configuration de Chamilo et de sélectionner le style qui porte le nom du répertoire que vous aurez rajouté.

Ensuite, et seulement depuis la version 1.10, il faudra veiller à lancer la commande _composer install_ dans la racine de Chamilo pour transférer les nouveaux styles vers _web/css/themes/_.

