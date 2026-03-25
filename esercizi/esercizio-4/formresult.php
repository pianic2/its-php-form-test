<?php

function validate_name($name)
{
    // Name: 3-20 characters, letters, numbers, underscores
    return preg_match("/^[a-zA-Z0-9_]{3,20}$/", $name);
}

function validate_mood($mood)
{
    // Mood: must be one of the predefined options
    $valid_moods = ['felice', 'triste', 'arrabbiato'];
    return in_array($mood, $valid_moods, true);
}

function generate_message($mood)
{
    $messages = [
        'felice' => [
            1=> 'Oggi è una giornata fantastica! Sfrutta al massimo la tua felicità.',
            2=> 'Sempre meglio vedere il bicchiere mezzo pieno.',
            3=> 'Che bello vederti così! Continua a sorridere e contagia gli altri con la tua gioia.',
        ],
        'triste'=> [
            1=> 'Piove e tira vento.',
            2=> 'Ci vuole un pezzo di torta.',
            3=> 'Non preoccuparti, andrà meglio domani.',
        ],
        'arrabbiato'=> [
            1=> 'Calmati e respira profondamente.',
            2=> 'Fai una passeggiata per schiarirti le idee.',
            3=> 'Parla con qualcuno di fidato per sfogarti.',
        ],
    ];

    return $messages[$mood][array_rand([1,2,3])] ?? '';
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato - Esercizio 4 - Generatore di messaggi personalizzati</title>
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
                <p><strong>Nome:</strong>
                    <?php echo htmlspecialchars((string) ($_POST['nome'] ?? '')) ?: '<span class="badge badge--error">Dato Mancante</span>'; ?>
                </p>
                <p><strong>Mood:</strong>
                    <?php echo htmlspecialchars((string) ($_POST['mood'] ?? '')) ?: '<span class="badge badge--error">Dato Mancante</span>'; ?>
                </p>
                <p><strong>Emoji:</strong>
                    <?php echo isset($_POST['emoji']) ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?>
                </p>
                <p><strong>Messaggio formale:</strong>
                    <?php echo isset($_POST['messaggio_formale']) ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?>
                </p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Validazione dati:</h2>
            </div>
            <div class="card__body">
                <p><strong>Nome:</strong> <?php echo validate_name($_POST['nome'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
                <p><strong>Mood:</strong> <?php echo validate_mood($_POST['mood'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Risultato:</h2>
            </div>
            <div class="card__body">
                <?php
                $nome = (string) $_POST['nome'];
                $mood = (string) $_POST['mood'];
                $messaggio_formale = isset($_POST['messaggio_formale']);
                $emoji = isset($_POST['emoji']);
                    
                if (isset($nome, $mood) && validate_name($nome) && validate_mood($mood)) {
                    if ($messaggio_formale) {
                        echo '<p><strong>Messaggio generato:</strong> Buonasera Messere ' . htmlspecialchars($nome) . ', ' . generate_message($mood) . '</p>';
                    } else {
                        echo '<p><strong>Messaggio generato:</strong> Ciao ' . htmlspecialchars($nome) . ', ' . generate_message($mood) . '</p>';
                    }
                    
                    switch ($mood) {
                        case 'felice':
                            echo $emoji ? '<p>😊</p>' : '';
                            break;
                        case 'triste':
                            echo $emoji ? '<p>😢</p>' : '';
                            break;
                        case 'arrabbiato':
                            echo $emoji ? '<p>😠</p>' : '';
                            break;
                    }

                } else {
                    echo '<p><span class="alert alert--danger">Non è possibile generare il messaggio: dati mancanti o non validi.</span></p>';
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