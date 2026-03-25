<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 5 - Analizzatore di testo</title>
    <link rel="stylesheet" href="/css/min.core.css">
    <link rel="stylesheet" href="/css/project-theme.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container container--md u-p-6">
        <section class="card card--elevated u-gap-4">
            <div class="card__header">
                <h2 class="card__title">Modulo di analisi del testo</h2>
                <p class="card__description">Inserisci il testo e invia il form per visualizzare il risultato.</p>
            </div>

            <form class="form" action="formresult.php" method="post">
                <div class="form__group">
                    <label class="form__label" for="testo">Testo</label>
                    <textarea rows="5" class="form__control" id="testo" name="testo" placeholder="Scrivi il tuo testo..."></textarea>
                </div>

                <div class="form__group">
                    <label class="form__label" for="ricerca">Ricerca</label>
                    <input class="form__control" id="ricerca" name="ricerca" placeholder="Scrivi il testo da cercare...">
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