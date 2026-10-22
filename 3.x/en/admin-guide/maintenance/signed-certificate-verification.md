# Signed Certificate Verification

Chamilo can issue **digitally signed credentials** for gradebook certificates and optionally anchor a credential fingerprint on the **Sepolia Ethereum test network**. The signature and verification page are distinct from ordinary PDF certificates.

## Enable signed credentials

Under **Administration > Configuration settings > Certificates**, enable `certificate.blockchain_verification_enabled` if your institution intends to use this feature. It is disabled by default. The portal must use HTTPS for issuing credentials.

## Learner consent comes first

A certificate's owner opens **My Certificates** and explicitly chooses **Approve publication**. The consent covers a publicly verifiable credential showing the holder's name, course, score and issue date, and optionally the SHA-256 fingerprint on Sepolia. Approval is not automatic. The learner may later select **Withdraw consent**; withdrawal affects the validity displayed by the verification page but **cannot erase an already confirmed blockchain fingerprint**.

## Issue, verify and revoke

A directly authenticated platform administrator can use the gradebook **Certificates** list to issue the signed credential once its owner has consented. The resulting verification link uses `/certificates/verify/{token}`; a `.json` verification response is also available. The page checks the cryptographic signature, consent, revocation, expiry, and whether the underlying certificate information still matches the signed source.

If a credential is revoked, consent is withdrawn, the certificate changes, or the signature is invalid, the verifier indicates that status instead of reporting a valid credential.

## Optional Sepolia anchoring

An administrator may choose **Anchor on Sepolia testnet** using a supported browser wallet or **Confirm existing Sepolia transaction** to reconcile a pending transaction. The wallet must be connected to Sepolia (chain ID `11155111`). The application confirms the transaction using a server-configured **HTTPS Sepolia RPC endpoint** (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). No request-supplied RPC URL is accepted.

Only the credential fingerprint is anchored; personal data is not submitted as transaction data. Sepolia is a **testnet**. Its records and availability must not be presented as a production-grade public blockchain guarantee. Store institution keys and RPC configuration securely and plan for key recovery and credential revocation procedures.

Implementation: [Certificate credential verification #9298](https://github.com/chamilo/chamilo-lms/pull/9298).
