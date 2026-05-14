# Videoconferenza

Chamilo si integra con piattaforme di videoconferenza per consentire sessioni dal vivo all'interno dei corsi.

## Piattaforme Supportate

### BigBlueButton

**BigBlueButton** (BBB) è un sistema di videoconferenza web open-source progettato per l'apprendimento online. È la soluzione di videoconferenza più comunemente utilizzata con Chamilo.

#### Configurazione

1. Installa BigBlueButton su un server separato (consulta la [documentazione di BigBlueButton](https://docs.bigbluebutton.org/))
2. Usa il comando bbb-conf --salt sul server BBB per ottenere i dettagli di integrazione
3. Nelle impostazioni della piattaforma Chamilo, sotto **Plugins**, installa il plugin Videoconference e inserisci la sua configurazione per impostare:
   * **URL del server BBB** — L'indirizzo del tuo server BBB
   * **Salt/secret BBB** — Il segreto API del tuo server BBB
4. Salva
5. **Abilita** il plugin Videoconference
6. Alcune funzionalità speciali sono disponibili per gli amministratori, quindi assicurati di abilitarlo nella regione *admin_page*

#### Funzionalità Disponibili in Chamilo

* Avvia/partecipa a riunioni direttamente da un corso
* Creazione automatica di stanze per ogni corso
* Registrazioni delle riunioni (se abilitate)
* Condivisione dello schermo, lavagna, stanze separate
* Chat accanto al video

### Zoom

Chamilo può anche integrarsi con **Zoom** per la videoconferenza.

#### Configurazione

1. Crea un'app Zoom nel Zoom Marketplace
2. In Chamilo, configura le credenziali API di Zoom
3. Abilita l'integrazione con Zoom

#### Come Funziona

Quando Zoom è configurato, gli insegnanti possono creare e avviare riunioni Zoom direttamente dal loro corso. Gli studenti partecipano tramite l'interfaccia di Chamilo.

## Scegliere tra BBB e Zoom

| Funzionalità | BigBlueButton | Zoom |
|--------------|--------------|------|
| Costo | Gratuito (open-source), ma richiede un proprio server | Richiede un abbonamento Zoom |
| Hosting | Auto-ospitato | Ospitato nel cloud da Zoom |
| Profondità di integrazione | Profonda (progettato per l'uso con LMS) | Standard |
| Registrazione | Lato server, archiviata sulla tua infrastruttura | Cloud Zoom o locale |
| Lavagna | Integrata | Integrata |
| Stanze separate | Sì | Sì |

## Consigli

* **Server separato per BBB** — BigBlueButton dovrebbe essere eseguito su un server dedicato per ottenere le migliori prestazioni, non sullo stesso server di Chamilo
* **Test prima delle lezioni** — Testa sempre la configurazione della videoconferenza prima di una sessione dal vivo
* **Verifica la banda** — Assicurati che il tuo server e la tua rete possano gestire il numero previsto di utenti simultanei