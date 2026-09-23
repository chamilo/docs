# Authentification à deux facteurs

L’authentification à deux facteurs (2FA) ajoute une seconde étape à la connexion — un code à 6 chiffres provenant d’une application sur votre téléphone, en plus de votre mot de passe — de sorte que la seule connaissance de votre mot de passe ne suffit pas à accéder à votre compte.

Cette fonctionnalité n’apparaît que si votre administrateur l’a activée pour l’ensemble de la plateforme. Si vous ne la voyez pas sur la page de votre compte, elle n’a pas été activée pour votre plateforme.

## Activer la 2FA

1. Ouvrez votre **menu de l’avatar** et cliquez sur **Mon profil**.
2. Cliquez sur **Modifier le mot de passe**.
3. Saisissez votre **mot de passe actuel**, cochez la case **Activer l’authentification à deux facteurs (2FA)**, puis cliquez sur **Mettre à jour les paramètres**.
4. La page se recharge avec un QR code et le message « Scannez le QR code pour activer la 2FA ». Scannez-le avec une application d’authentification sur votre téléphone (toute application compatible TOTP convient, comme Google Authenticator, Microsoft Authenticator ou Authy).

![Le formulaire Modifier le mot de passe après envoi, affichant le QR code à scanner et le champ de code 2FA](../../.gitbook/assets/student-2fa-qr-code.png)

5. Saisissez à nouveau votre mot de passe actuel, ainsi que le code à 6 chiffres que votre application affiche désormais, dans le champ **Code 2FA**, puis cliquez une nouvelle fois sur **Mettre à jour les paramètres**. Vous verrez une confirmation indiquant que la 2FA a été activée.

Cocher la case ne suffit pas à afficher le QR code — vous ne le voyez qu’après ce premier envoi, et les champs de mot de passe sont vidés à chaque rechargement de la page, vous devrez donc aussi ressaisir votre mot de passe actuel lors de ce second envoi.

## Se connecter avec la 2FA activée

Après avoir saisi votre identifiant et votre mot de passe comme d’habitude, le formulaire de connexion affiche un champ supplémentaire **Code 2FA** sur le même écran — saisissez le code à 6 chiffres actuel de votre application d’authentification et validez (le bouton indique **Envoyer le code** au lieu de **Se connecter** à ce stade).

## Si vous perdez l’accès à votre application d’authentification

Chamilo ne génère pas de codes de sauvegarde ou de récupération pour la 2FA. Si vous perdez l’appareil contenant votre application d’authentification, vous ne pourrez pas produire vous-même un code valide — contactez l’administrateur de votre plateforme, qui pourra désactiver la 2FA sur votre compte afin que vous puissiez vous reconnecter et, si vous le souhaitez, la configurer sur un nouvel appareil.

## Désactiver la 2FA

Retournez à **Modifier le mot de passe**, décochez **Activer l’authentification à deux facteurs (2FA)**, saisissez votre mot de passe actuel et validez.

## Conseils

* **Configurez-la avant d’en avoir besoin** — activer la 2FA ne prend qu’une minute et protège réellement votre compte.
* **Gardez votre application d’authentification accessible** — la perdre signifie dépendre de votre administrateur pour retrouver l’accès, car il n’existe pas de codes de sauvegarde.
* **Ne partagez pas vos codes 2FA** — quiconque possède votre mot de passe et un code valide peut se connecter à votre place.