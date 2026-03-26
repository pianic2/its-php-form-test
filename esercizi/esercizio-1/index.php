<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1 - Registrazione Utente</title>
    <link rel="stylesheet" href="/css/min.core.css">
    <link rel="stylesheet" href="/css/project-theme.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container container--md u-p-6">
        <section class="card card--elevated u-gap-4">
            <div class="card__header">
                <h2 class="card__title">Modulo</h2>
                <p class="card__description">Inserisci i dati e invia il form per visualizzare il risultato.</p>
            </div>

            <form class="form" action="formresult.php" method="post">
                <div class="form__group">
                    <label class="form__label" for="nome">Nome</label>
                    <input class="form__control" type="text" id="nome" name="nome" placeholder="Scrivi il tuo nome..." required>
                </div>

                <div class="form__group">
                    <label class="form__label" for="cognome">Cognome</label>
                    <input class="form__control" type="text" id="cognome" name="cognome" placeholder="Scrivi il tuo cognome..." required>
                </div>

                <div class="form__group">
                    <label class="form__label" for="email">Email</label>
                    <input class="form__control" type="email" id="email" name="email" placeholder="Scrivi la tua email..." required>
                </div>


                <div class="form__group">
                    <label class="form__label" for="eta">Età</label>
                    <input class="form__control" type="number" id="eta" name="eta" placeholder="Scrivi la tua età..." required min="0" max="120">
                </div>

                <div class="form__group">
                    <label class="form__label" for="ruolo">Ruolo</label>
                    <select name="ruolo" id="ruolo" class="form__control" required>
                        <option value="" disabled selected>Seleziona un ruolo</option>
                        <option value="studente">Studente</option>
                        <option value="insegnante">Insegnante</option>
                        <option value="admin">Amministratore</option>
                    </select>
                </div>

                <div class="u-inline-flex u-gap-2">
                        <input class="icon--lg" type="checkbox" id="termini" name="termini">
                        <label class="form__label" for="termini">Accetta i termini e condizioni</label>
                </div>

                <div class="form__actions">
                    <button class="button button--primary" type="submit">Invia</button>
                </div>
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>