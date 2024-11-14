CRM Gestionale Clienti / Fatture

Questo è un progetto programmato in Laravel con database MySQL. 
Per realizzare il progetto ho inizialmente avviato la connessione al Database, avviando MySQL workbench per  configurare il DB e verificarne la connessione. I dettagli di connessione, ovvero nome del DB, utente, password, etc, sono stati inseriti nel file .env del progetto Laravel al fine di una connessione automatica al DB MySQL. 
In secondo luogo, dopo aver configurato la connessione, ho strutturato il progetto utilizzando l'ultima versione di Laravel, il che si è rivelata un'ottima scelta perchè ha semplificato la creazione di tabelle, controller e dei model necessari per gestire Clienti e Fatture. 
Ho quindi creato le migrazioni per le tabelle clients e invoices con i campi richiesti. Le migrazioni sono state eseguite con il comando php artisan migrate, che ha generato le tabelle nel database MySQL secondo la struttura definita.
La parte restante del lavoro è stata la creazione del CRM lato client servendomi di un semplice codice HTML5, Bootstrap e talvolta di Javascript. 