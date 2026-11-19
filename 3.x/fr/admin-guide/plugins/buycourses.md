# BuyCourses : paiements et services récurrents

Le plugin **BuyCourses** vend l'accès à des cours et à des sessions et peut proposer des services payants. Les modes de paiement dépendent des passerelles configurées pour l'installation.

## Configuration des paiements

Ouvrez **Administration > Plugins > BuyCourses** et accédez à sa zone de configuration des paiements. Conservez les identifiants des passerelles sur le serveur, et non sur une page destinée aux apprenants. Les méthodes existantes telles que Stripe et PayPal continuent de fonctionner indépendamment de BTCPay Server.

### BTCPay Server (achats de cours et de sessions)

Le plugin prend également en charge **BTCPay Server** pour les achats de cours et de sessions :

1. Activez le mode de paiement BTCPay dans la configuration de BuyCourses.
2. Définissez l'**URL du serveur** BTCPay, l'**identifiant de boutique** (**Store ID**), la **clé d'API Greenfield** et le **secret du webhook**.
3. Utilisez le **test de connexion** de la configuration des paiements pour confirmer l'accès à l'API Greenfield.
4. Configurez le webhook côté BTCPay en utilisant l'URL de webhook affichée par le plugin et le même secret.
5. Effectuez un petit achat de test avant de proposer cette option aux apprenants.

L'acheteur est redirigé vers la page de paiement hébergée par BTCPay. Chamilo vérifie les signatures des webhooks et récupère à nouveau la facture afin de valider la **boutique, le montant, la devise et les détails de la commande** avant de marquer la commande comme payée et d'inscrire l'acheteur. Un retour dans le navigateur peut réconcilier un webhook manqué ou retardé. Les notifications répétées ne créent pas d'exécution en double.

Seuls les paiements réglés et vérifiés (y compris les trop-perçus acceptés et les factures explicitement marquées comme réglées par un administrateur) accordent l'accès. **Les paiements partiels, tardifs, expirés ou invalides ne doivent pas être traités comme automatiquement exécutés** ; les paiements exceptionnels nécessitent un examen manuel.

**Installations existantes :** exécutez une fois la procédure de mise à jour du plugin afin de créer `plugin_buycourses_btcpay_account`. Un administrateur peut ouvrir `/plugin/BuyCourses/update.php` ou enregistrer la configuration de paiement BTCPay, ce qui garantit également l'existence de la table du plugin. Cette mise à jour est propre à BuyCourses et ne constitue pas une migration globale de la base de données.

BTCPay n'est **pas** documenté ici comme passerelle pour les services récurrents ; ne supposez pas qu'il mette en œuvre des renouvellements automatiques d'abonnement de type Stripe/PayPal.

## Cycle de vie des services récurrents

Les apprenants peuvent utiliser **Mes services** pour consulter leurs services récurrents actifs ainsi que leur historique d'achats et de paiements. Pour les services disposant de renouvellements automatiques pris en charge :

* Chaque paiement de renouvellement possède son propre enregistrement historique et son propre reçu.
* L'annulation d'un renouvellement empêche les prélèvements futurs, mais laisse le service payé accessible jusqu'à l'expiration de la période déjà payée.
* Les administrateurs peuvent également annuler des renouvellements depuis le **rapport des ventes de services**.
* Un abonnement récurrent actif, en attente ou autrement en cours est protégé contre les achats en double.
* Un service expiré ou entièrement annulé peut être acheté à nouveau.

L'**historique des achats** et l'**historique des paiements** sont distincts : un seul achat de service peut comporter plusieurs paiements de renouvellement. N'en déduisez pas qu'un paiement renouvelé constitue un second achat.

## Totaux des paiements dans les ventes de services

Dans le **rapport des ventes de services** de l'administrateur, deux colonnes permettent de distinguer le montant de la commande initiale des paiements encaissés au fil du temps :

* **Dernier paiement** affiche la date du paiement réussi le plus récent enregistré pour cette vente de service. Si aucune date de paiement n'est disponible, le rapport affiche un tiret.
* **Total encaissé** indique le montant initial de l'achat encaissé, augmenté des montants de renouvellement réussis enregistrés, formaté dans la devise du service. Il ne correspond pas au prix d'une seule période de facturation.

Le calcul s'appuie sur l'historique d'audit de la vente de service, évite de compter deux fois les événements de renouvellement en double et prend en compte le prélèvement initial de l'abonnement Stripe sans le compter deux fois. Pour les cas exceptionnels de paiement ou de remboursement, rapprochez le rapport du prestataire de paiement ; le montant affiché n'est ni un versement de la passerelle ni un registre distinct des remboursements.

## Abonnements Stripe historiques

BuyCourses peut rapprocher l'historique des factures Stripe pour les services récurrents plus anciens dont les transactions de renouvellement n'ont pas été entièrement enregistrées dans le journal d'audit du plugin. La vue **Mes services** et le rapport des ventes de services peuvent actualiser ces enregistrements et mettre à jour la période payée et les totaux connus localement. Les administrateurs doivent vérifier les écarts exceptionnels de l'historique des paiements auprès de Stripe plutôt que de modifier directement les ventes.

## Filtrage des rapports de ventes

Le **rapport des ventes de cours et de sessions** peut être filtré par statut de commande, utilisateur, plage de dates ou adresse e-mail. Des filtres de produit facultatifs permettent de restreindre les résultats par type de produit et par nom de produit. Le **rapport des ventes de services** prend en charge le filtrage par statut, ainsi qu'une recherche par utilisateur, e-mail, nom ou référence de commande, et une recherche par nom de service. Vérifiez les filtres actifs avant d'exporter ou de rapprocher les ventes ; les deux écrans de rapport disposent de contrôles de filtre différents.

Voir [PR n° 9387 sur les filtres de ventes BuyCourses](https://github.com/chamilo/chamilo-lms/pull/9387).

## Cycle de vie des cours liés aux abonnements et protections contre la suppression

BuyCourses peut fermer, masquer et réactiver les cours associés à des abonnements de services récurrents lorsque leur statut de paiement change. Dans le **JSON de comportement d’abonnement** d’un service, `hide_after_days` indique le délai après la fermeture avant de masquer un cours (30 jours par défaut), tandis que `delete_after_days` indique le délai après le masquage avant la suppression définitive. La suppression est désactivée par défaut (`null`) ; seule une valeur positive rend un cours éligible.

Les administrateurs peuvent examiner les cours éligibles, en attente et bloqués à l’adresse `/admin/buycourses/course-lifecycle`. L’interface prend en charge une simulation non destructive et la suppression ciblée d’**un cours éligible par exécution**, protégée par une confirmation explicite. Le processeur CLI `chamilo:buycourses:process-recurring-subscriptions` prend également en charge `--dry-run`, `--delete-expired` et `--max-deletions` (1–25). Sans `--delete-expired`, il ne supprime pas définitivement les cours.

**La suppression définitive est destructive.** Conservez des sauvegardes et testez d’abord avec des cours jetables. Les contrôles d’éligibilité protègent les ventes actives, les cours liés à une session et les propriétés incohérentes ; la suppression automatique est bloquée pour les installations à plusieurs URL d’accès. Examinez le comportement concurrent de renouvellement et de suppression avant de planifier un nettoyage destructif en production. Voir [PR sur le cycle de vie des cours d’abonnement #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Contrôles opérationnels

Après une mise à niveau, testez un achat complet de cours, un achat de session s’il est proposé, un webhook retardé ou rejoué, des factures BTCPay expirées et partielles, un renouvellement automatique, ainsi qu’une annulation avec un accès maintenu jusqu’à la fin de la période payée. Ne faites pas apparaître les identifiants ni les secrets de webhook dans les captures d’écran, les journaux et les tickets d’assistance.

## Renforcement des paiements

### Vérification du montant par la passerelle (Redsys / Cecabank)

Lorsque la banque notifie à la plateforme qu’un paiement a réussi, BuyCourses compare le montant facturé par la banque (en centimes, issu de la notification signée) au prix de la vente. S’ils diffèrent, la notification est refusée, la vente reste en attente et une ligne `[BuyCourses] Redsys notification refused` ou `[BuyCourses] Cecabank notification refused` est écrite dans le journal d’erreurs PHP. Les paiements normaux ne sont pas affectés.

Si une vente reste en attente alors que l’acheteur a payé, consultez le journal : un prix modifié après la création de la commande, ou un paiement partiel, y apparaîtra. Finalisez manuellement une telle vente depuis le rapport des ventes une fois la vérification effectuée.

### Jetons de sécurité

* Les formulaires de coupons (ajout / configuration), le formulaire public des cartes de formules et les actions de versement utilisent le même jeton d’administration BuyCourses que toutes les autres pages d’administration du plugin. Un formulaire laissé ouvert longtemps continue de fonctionner tant que la session est active ; après une déconnexion puis une reconnexion, rechargez la page avant d’enregistrer (sinon un message « Not validated » s’affiche).
* La page « demander une facture » (`request_invoice.php`) et le déclencheur web de `process_recurring_subscriptions.php` exigent le jeton dans le lien (`buycourses_admin_sec_token=...`). Les liens mis en favori ou envoyés par courriel sans ce jeton affichent « Not validated ». L’exécution en ligne de commande ou par cron (`php .../process_recurring_subscriptions.php` ou la commande console) reste inchangée et ne nécessite aucun jeton.
* Les pages de succès (PayPal, Stripe, abonnements, services) n’affichent une vente qu’à l’utilisateur qui l’a effectuée.
* Les actions de versement (paiement groupé PayPal, annulation d’un versement) sont réservées aux administrateurs de la plateforme (les administrateurs de session ne sont plus acceptés) et doivent être envoyées en POST avec le jeton.

### Dates

La date de fin d’une vente d’abonnement est désormais toujours calculée en UTC, comme la date de vente, quelle que soit le fuseau horaire du serveur.

### Limites multi-URL

Les limites de création de cours et d’hébergement appliquées à l’expiration d’un service suivent la même règle que le reste de la plateforme : un paramètre verrouillé, ou marqué comme non modifiable, sur l’URL principale ne peut pas être remplacé par une autre URL.

Modifications : [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [services récurrents #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [rapprochement Stripe #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [totaux des ventes de services #9220](https://github.com/chamilo/chamilo-lms/pull/9220).