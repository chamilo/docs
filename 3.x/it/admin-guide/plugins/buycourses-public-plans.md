# Piani pubblici e promozionali di BuyCourses

Il plugin **BuyCourses** può visualizzare un piano gratuito pubblico insieme a schede promozionali che rimandano a offerte esterne. Questa funzione è distinta dal flusso di acquisto di corsi/sessioni a pagamento del plugin e dalla configurazione dei pagamenti dei servizi ricorrenti.

## Configurare i piani pubblici

1. Aprire l'area di amministrazione di BuyCourses e il relativo editor delle schede dei piani pubblici.
2. Nel piano **Gratuito**, scegliere se **Mostra gratuito** è abilitato.
3. Inserire il titolo, la descrizione e l'elenco delle funzionalità tradotti del piano gratuito utilizzando le schede delle lingue.
4. Aggiungere le schede promozionali secondo necessità. Configurare per ciascuna scheda lo stato di abilitazione, la posizione, l'URL di destinazione, l'URL dell'immagine facoltativo e il titolo, la descrizione, le funzionalità e il testo del pulsante tradotti.
5. Salvare, quindi utilizzare il collegamento di anteprima/catalogo disponibile per verificare la presentazione pubblica in ciascuna lingua configurata.

L'editor salva i contenuti tradotti per più lingue. Una scheda promozionale è un **collegamento a un'offerta esterna**, non la prova di un pagamento completato né di un abbonamento automatico in Chamilo.

## Limiti di creazione dei corsi

Il piano gratuito utilizza i limiti standard di creazione dei corsi della piattaforma. BuyCourses distingue le quote standard di corsi dalle quote di corsi a pagamento. Quando è configurato un limite finito, l'interfaccia di creazione dei corsi può mostrare l'utilizzo e l'avanzamento; i piani illimitati non necessitano di un indicatore percentuale.

Verificare i limiti con un account che dispone solo della quota standard e con uno che dispone della quota a pagamento applicabile. Una scheda promozionale pubblica non deve mai aggirare le autorizzazioni di creazione dei corsi lato server.

## Comportamento dei pagamenti

Le schede dei piani pubblici non sostituiscono BTCPay, Stripe, PayPal né i flussi consolidati di acquisto dei corsi e dei servizi ricorrenti del plugin. Continuare a gestire e verificare i gateway di pagamento nella configurazione esistente di BuyCourses.

Vedere [BuyCourses: pagamenti e servizi ricorrenti](buycourses.md). Implementazione: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).