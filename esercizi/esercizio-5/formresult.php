<?php

function validate_text($text)
{
    return strlen($text) > 0;
}

function validate_search($search)
{
    return strlen($search) > 0;
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato - Esercizio 5 - Analizzatore di testo</title>
        <link rel="stylesheet" href="/css/min.core.css">
    <link rel="stylesheet" href="/css/project-theme.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container container--md u-p-6 u-gap-6">
        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Dati inseriti:</h2>
            </div>

            <div class="card__body">
                <p><strong>Testo:</strong>
                    <?php echo htmlspecialchars((string) ($_POST['testo'] ?? '')) ?: '<span class="badge badge--error">Dato Mancante</span>'; ?>
                </p>
                <p><strong>Ricerca:</strong>
                    <?php echo htmlspecialchars((string) ($_POST['ricerca'] ?? '')) ?: '<span class="badge badge--error">Dato Mancante</span>'; ?>
                </p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Validazione dati:</h2>
            </div>
            <div class="card__body">
                <p><strong>Testo:</strong> <?php echo validate_text($_POST['testo'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
                <p><strong>Ricerca:</strong> <?php echo validate_search($_POST['ricerca'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Risultato:</h2>
            </div>
            <div class="card__body">
                <?php
                $text = (string) $_POST['testo'];
                $search = (string) $_POST['ricerca'];
                    
                if (isset($text, $search) && validate_text($text) && validate_search($search)) {
                    $caracters = strlen($text);
                    $words = str_word_count($text);
                    $search_count = substr_count($text, $search);

                    $text_with_highlight = str_replace($search, '<mark>' . htmlspecialchars($search) . '</mark>', htmlspecialchars($text));

                    echo '<p><strong>Numero di caratteri:</strong> ' . $caracters . '</p>';
                    echo '<p><strong>Numero di parole:</strong> ' . $words . '</p>';
                    echo '<p><strong>Occorrenze della ricerca:</strong> ' . $search_count . '</p>';
                    echo '<p><strong>Testo con evidenziazione:</strong> ' . $text_with_highlight . '</p>';
                } else {
                    echo '<p><span class="alert alert--danger">Non è possibile generare il risultato: dati mancanti o non validi.</span></p>';
                }
                ?>
            </div>
        </section>

        <section class="u-flex">
            <a class="button button--secondary" href="index.php">Torna al form</a>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>