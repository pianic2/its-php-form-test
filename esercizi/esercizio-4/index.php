<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 4 - Generatore di messaggi personalizzati</title>
    <link rel="stylesheet" href="/css/min.core.css">
    <link rel="stylesheet" href="/css/project-theme.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container container--md u-p-6">
        <section class="card card--elevated u-gap-4">
            <div class="card__header">
                <h2 class="card__title">Modulo di generazione messaggi</h2>
                <p class="card__description">Inserisci i dati e invia il form per visualizzare il risultato.</p>
            </div>

            <form class="form" action="formresult.php" method="post">
                <div class="form__group">
                    <label class="form__label" for="nome">Nome</label>
                    <input class="form__control" type="text" id="nome" name="nome" placeholder="Scrivi il tuo nome...">
                </div>

                <div class="form__group">
                    <label class="form__label" for="mood">Mood</label>
                    <select class="form__control" id="mood" name="mood">
                        <option value="">Seleziona il tuo mood...</option>
                        <option value="felice">Felice</option>
                        <option value="triste">Triste</option>
                        <option value="arrabbiato">Arrabbiato</option>
                    </select>
                </div>

                <div class="u-inline-flex u-gap-2">
                    <input class="icon--lg" type="checkbox" id="emoji" name="emoji">
                    <label class="form__label" for="emoji">Mostra emoji</label>
                </div>

                <div class="u-inline-flex u-gap-2">
                    <input class="icon--lg" type="checkbox" id="messaggio_formale" name="messaggio_formale">
                    <label class="form__label" for="messaggio_formale">Messaggio formale</label>
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