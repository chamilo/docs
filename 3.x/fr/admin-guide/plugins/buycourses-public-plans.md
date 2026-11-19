# Plans publics et promotionnels de BuyCourses

Le plugin **BuyCourses** peut afficher un plan gratuit public aux côtés de cartes promotionnelles qui mènent vers des offres externes. Cela est distinct du flux d'achat de cours/sessions payants du plugin et de la configuration des paiements de services récurrents.

## Configurer les plans publics

1. Ouvrez la zone d'administration de BuyCourses et son éditeur de cartes de plan public.
2. Sous le plan **Gratuit**, choisissez si **Afficher le gratuit** est activé.
3. Saisissez le titre, la description et la liste des fonctionnalités traduits du plan gratuit à l'aide des onglets de langue.
4. Ajoutez des cartes promotionnelles selon les besoins. Configurez pour chaque carte l'état d'activation, la position, l'URL cible, l'URL d'image facultative, ainsi que le titre, la description, les fonctionnalités et le texte du bouton traduits.
5. Enregistrez, puis utilisez le lien d'aperçu/catalogue disponible pour vérifier la présentation publique dans chaque langue configurée.

L'éditeur enregistre le contenu traduit pour plusieurs langues. Une carte promotionnelle est un **lien vers une offre externe**, et non la preuve d'un paiement effectué ou d'un abonnement automatique dans Chamilo.

## Limites de création de cours

Le plan gratuit utilise les limites standard de création de cours de la plateforme. BuyCourses distingue les quotas de cours standard des quotas de cours payants. Lorsqu'une limite finie est configurée, l'interface de création de cours peut afficher l'utilisation et la progression ; les plans illimités n'ont pas besoin d'un indicateur de pourcentage.

Testez les limites avec un compte qui ne dispose que du quota standard et avec un compte qui dispose du quota payant applicable. Une carte promotionnelle publique ne doit jamais contourner les autorisations de création de cours côté serveur.

## Comportement des paiements

Les cartes de plan public ne remplacent pas BTCPay, Stripe, PayPal ni les flux établis d'achat de cours et de services récurrents du plugin. Continuez à gérer et à tester les passerelles de paiement dans la configuration BuyCourses existante.

Voir [BuyCourses : paiements et services récurrents](buycourses.md). Implémentation : [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).