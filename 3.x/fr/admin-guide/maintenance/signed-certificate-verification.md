# Vérification des certificats signés

Chamilo peut délivrer des **attestations signées numériquement** pour les certificats du carnet de notes et, en option, ancrer une empreinte d'attestation sur le **réseau de test Ethereum Sepolia**. La signature et la page de vérification sont distinctes des certificats PDF ordinaires.

## Activer les attestations signées

Sous **Administration > Paramètres de configuration > Certificats**, activez `certificate.blockchain_verification_enabled` si votre établissement souhaite utiliser cette fonctionnalité. Elle est désactivée par défaut. Le portail doit utiliser HTTPS pour délivrer les attestations.

## Le consentement de l'apprenant d'abord

Le titulaire d'un certificat ouvre **Mes certificats** et choisit explicitement **Approuver la publication**. Le consentement porte sur une attestation vérifiable publiquement indiquant le nom du titulaire, le cours, le score et la date de délivrance, ainsi que, en option, l'empreinte SHA-256 sur Sepolia. L'approbation n'est pas automatique. L'apprenant peut ultérieurement sélectionner **Retirer le consentement** ; le retrait affecte la validité affichée par la page de vérification, mais **ne peut pas effacer une empreinte blockchain déjà confirmée**.

## Délivrer, vérifier et révoquer

Un administrateur de la plateforme authentifié directement peut utiliser la liste **Certificats** du carnet de notes pour délivrer l'attestation signée une fois que son titulaire a donné son consentement. Le lien de vérification obtenu utilise `/certificates/verify/{token}` ; une réponse de vérification `.json` est également disponible. La page contrôle la signature cryptographique, le consentement, la révocation, l'expiration, et si les informations du certificat sous-jacent correspondent toujours à la source signée.

Si une attestation est révoquée, si le consentement est retiré, si le certificat change ou si la signature est invalide, le vérificateur indique cet état au lieu de signaler une attestation valide.

## Ancrage Sepolia optionnel

Un administrateur peut choisir **Ancrer sur le testnet Sepolia** à l'aide d'un portefeuille de navigateur pris en charge, ou **Confirmer une transaction Sepolia existante** pour réconcilier une transaction en attente. Le portefeuille doit être connecté à Sepolia (identifiant de chaîne `11155111`). L'application confirme la transaction au moyen d'un **point de terminaison RPC Sepolia HTTPS** configuré sur le serveur (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Aucune URL RPC fournie par la requête n'est acceptée.

Seule l'empreinte de l'attestation est ancrée ; les données personnelles ne sont pas soumises comme données de transaction. Sepolia est un **testnet**. Ses enregistrements et sa disponibilité ne doivent pas être présentés comme une garantie de blockchain publique de niveau production. Conservez les clés de l'établissement et la configuration RPC de manière sécurisée, et prévoyez des procédures de récupération des clés et de révocation des attestations.

Implémentation : [Vérification des attestations de certificat #9298](https://github.com/chamilo/chamilo-lms/pull/9298).