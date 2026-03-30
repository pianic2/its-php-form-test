# its-php-form-test

Avvio progetto PHP con Docker, scegliendo quale esercizio servire tramite variabile d'ambiente `NUMERO`.

## Requisiti

- Docker Desktop avviato
- Docker Compose disponibile (`docker compose`)

## Avvio rapido

Il servizio espone il sito su `http://localhost:8080`.

### PowerShell (Windows)

```powershell
$env:NUMERO=1
docker compose up --build
```

### cmd (Windows)

```cmd
set NUMERO=1
docker compose up --build
```

### Bash (macOS/Linux)

```bash
NUMERO=1 docker compose up --build
```

## Comandi base

```bash
# Avvio in foreground
docker compose up --build

# Avvio in background
docker compose up --build -d

# Stop e rimozione container/rete
docker compose down
```

## Variabile `NUMERO`

- `NUMERO` seleziona la cartella `esercizi/esercizio-<NUMERO>`
- Se non impostata, il default è `1`
- Il valore è valido solo se compreso tra `1` e il numero di directory che matchano `esercizio-*`

## Lista esercizi

1. Esercizio 1: Registrazione Utente
2. Esercizio 2: Calcolatore
3. Esercizio 3: Mini login senza database
4. Esercizio 4: Generatore di messaggi personalizzati
5. Esercizio 5: Analizzatore di testo

### classi, Ereditarietà e Modificatori di Accesso
5. Esercizio 6: Classe Studente
