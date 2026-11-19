# Export sécurisé des diagnostics de configuration

Chamilo 3.1 fournit un rapport JSON téléchargeable permettant de diagnostiquer les problèmes de configuration sans exporter intentionnellement les valeurs confidentielles des paramètres. Le rapport est limité à l'**URL d'accès actuelle** et nécessite un rôle d'administrateur.

## Télécharger le rapport

1. Ouvrez **Administration > Paramètres** sur le portail que vous souhaitez inspecter.
2. Sélectionnez **Télécharger la configuration pour le débogage**.
3. Enregistrez en lieu sûr le fichier `chamilo-configuration-dump.json` généré.
4. **Examinez l'intégralité du fichier avant de l'envoyer à quiconque**, même s'il semble avoir été assaini.

Le rapport comprend un horodatage d'export, le périmètre de l'URL d'accès, les paramètres de la plateforme assainis, ainsi que l'état d'installation et d'activation des plugins et la configuration assainie des plugins. Il s'agit d'un export en lecture seule ; son téléchargement ne modifie pas les paramètres du système.

## Confidentialité et limites des URL d'accès

Les valeurs sensibles sont masquées par la couche d'assainissement. Les paramètres des plugins sont considérés comme confidentiels par défaut, sauf s'ils sont explicitement classés pour un export sécurisé. Malgré cela, les noms de paramètres, les noms de plugins et d'autres métadonnées de diagnostic peuvent révéler des détails d'implémentation ; ne distribuez donc le fichier qu'au personnel d'assistance de confiance.

Dans les installations multi-URL, le backend vérifie que l'URL d'accès résolue correspond à l'hôte de la requête, plutôt que d'exporter silencieusement la configuration d'un autre portail. Confirmez l'adresse du portail avant le téléchargement.

## Dépannage

Si l'export n'est pas disponible, assurez-vous que le compte dispose des privilèges d'administrateur et que le portail demandé se résout vers sa propre URL d'accès. Consultez les journaux du serveur web et de l'application sans copier d'identifiants ni d'informations personnelles dans les tickets d'assistance.

Voir [Outils système](system-tools.md) et [Paramètres de sécurité](../platform-settings/security-settings.md). Implémentation : [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).