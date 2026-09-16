# Videoconferenza

Chamilo si integra con piattaforme di videoconferenza per consentire sessioni dal vivo all'interno dei corsi.

## Piattaforme supportate

### BigBlueButton

**BigBlueButton** (BBB) è un sistema di web conferencing open-source progettato per l'apprendimento online. È la soluzione di videoconferenza più comunemente utilizzata con Chamilo.

#### Configurazione

1. Installare BigBlueButton su un server separato (vedere la [documentazione di BigBlueButton](https://docs.bigbluebutton.org/))
2. Usare bbb-conf --salt sul server BBB per ottenere i dettagli di integrazione
3. Nelle impostazioni della piattaforma Chamilo, **Plugins**, installare il plugin Videoconference e inserirne la configurazione per impostare:
   * **BBB server URL** — L'indirizzo del server BBB
   * **BBB salt/secret** — Il secret API del server BBB
4. Salvare
5. **Abilitare** il plugin Videoconference
6. Alcune funzionalità speciali sono disponibili per gli amministratori, quindi assicurarsi di abilitarlo nella regione *admin_page*

#### Funzionalità disponibili in Chamilo

* Avvio/partecipazione alle riunioni dall'interno di un corso
* Creazione automatica della stanza per corso
* Registrazioni delle riunioni (se abilitate)
* Condivisione dello schermo, lavagna, stanze di breakout
* Chat insieme al video

### Zoom

Chamilo può inoltre integrarsi con **Zoom** per la videoconferenza.

#### Configurazione

1. Creare un'app Zoom nel Zoom Marketplace
2. In Chamilo, configurare le credenziali API di Zoom
3. Abilitare l'integrazione Zoom

#### Come funziona

Quando Zoom è configurato, i docenti possono creare e avviare riunioni Zoom dall'interno del proprio corso. Gli studenti partecipano tramite l'interfaccia di Chamilo.

## Scelta tra BBB e Zoom

| Funzionalità | BigBlueButton | Zoom |
|---------|--------------|------|
| Costo | Gratuito (open-source), ma richiede un proprio server | Richiede un abbonamento Zoom |
| Hosting | Self-hosted | Cloud-hosted da Zoom |
| Profondità di integrazione | Profonda (progettata per l'uso LMS) | Standard |
| Registrazione | Lato server, memorizzata sulla propria infrastruttura | Cloud Zoom o locale |
| Lavagna | Integrata | Integrata |
| Stanze di breakout | Sì | Sì |

## Consigli

* **Server separato per BBB** — BigBlueButton dovrebbe essere eseguito su un server dedicato proprio per le migliori prestazioni, non sullo stesso server di Chamilo
* **Test prima delle lezioni** — Testare sempre la configurazione di videoconferenza prima di una sessione dal vivo
* **Verificare la banda** — Assicurarsi che il server e la rete possano gestire il numero previsto di utenti contemporanei