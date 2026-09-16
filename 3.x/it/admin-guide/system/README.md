# Sistema

Il blocco **Sistema** nella dashboard di amministrazione raggruppa gli strumenti di manutenzione a livello server, il flusso di auto-aggiornamento, le utilità di ispezione di archiviazione/risorse e il branding della piattaforma.

![Il blocco Sistema nella dashboard di amministrazione, con Elenco pulizia file temporanei, Stato del sistema, Aggiornamento di sistema, Colori, Informazioni sui file, Risorse per tipo e Elenco icone](/.gitbook/assets/admin-system-block.png)

## Accesso al blocco Sistema

Dal pannello di amministrazione, il blocco **Sistema** compare accanto agli altri blocchi della dashboard. Fare clic su uno qualsiasi dei suoi collegamenti per aprire lo strumento corrispondente.

## Contenuto del blocco

* **[Strumenti di sistema](system-tools.md)** — Pulizia dei file temporanei, esecuzione del flusso di auto-aggiornamento, ispezione dei file e delle risorse archiviati e consultazione del set di icone integrato
* **Stato del sistema** — Trattato in [Stato del sistema](../maintenance/system-status.md), nella sezione Manutenzione
* **[Branding](branding/README.md)** — Temi di colore (il collegamento «Colori» del blocco apre la stessa pagina Temi di colore), personalizzazione del portale e modelli

Due voci aggiuntive — **Data filler** e **E-mail tester** — compaiono solo quando sul server è presente una directory `tests/`, configurazione di sviluppo/QA e non di produzione. Non appariranno in un'installazione di produzione tipica; vedere [Strumenti di sistema](system-tools.md#development-only-tools) per il loro funzionamento quando presenti.