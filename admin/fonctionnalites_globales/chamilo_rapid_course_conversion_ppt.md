## Chamilo Rapid Course (conversion ppt) {#chamilo-rapid-course-conversion-ppt}

La fonctionnalité de conversion de présentations _PowerPoint_ ou _LibreOffice_ _Impress_ vers un parcours d&#039;apprentissage est assez complexe à installer. Il n&#039;existe qu&#039;un raccourci connu : avoir installé une version de LibreOffice ainsi que l&#039;applicatif _GNU_ _screen_ sur votre serveur et lancer la commande suivante dans un _screen_ :

sudo soffice -nologo -nofirststartwizard -headless -norestore -invisible “-accept=socket,host=localhost,port=2002,tcpNoDelay=1;urp;”

Toute explication plus détaillée serait largement hors du contexte de ce guide, mais la formule fonctionne sous Ubuntu Server. Notez que l&#039;installation du serveur de vidéoconférence _BigBlueButton_ couvre déjà l&#039;installation et le démarrage (sur le port 8100) du serveur _LibreOffice__._

Si vous ne parvenez pas à l&#039;installer, n&#039;hésitez pas à faire appels aux fournisseurs officiels de Chamilo qui vous assisteront ou loueront volontiers un accès à leurs serveurs de conversion pré-configurés.