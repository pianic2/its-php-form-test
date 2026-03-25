<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 3 - Mini login senza database</title>
    <link rel="stylesheet" href="/css/min.core.css">
    <link rel="stylesheet" href="/css/project-theme.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container container--md u-p-6">
        <section class="card card--elevated u-gap-4">
            <div class="card__header">
                <h2 class="card__title">Modulo di login</h2>
                <p class="card__description">Inserisci i tuoi dati e invia il form per accedere.</p>
            </div>

            <form class="form" action="formresult.php" method="post">
                    <div class="form__group">
                        <label class="form__label" for="username">Username:</label>
                        <input class="form__control" type="text" id="username" name="username" required>
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="password">Password:</label>
                        <input class="form__control" type="password" id="password" name="password" required>
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