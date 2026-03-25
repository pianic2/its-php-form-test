<?php
function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>';
}

function validate_age($age)
{
    return is_numeric($age) && $age >= 18 ? '<span class="badge badge--success">Maggiorenne</span>' : '<span class="badge badge--error">Minorenne</span>';
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato - Esercizio 1 - Registrazione Utente</title>
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
                    <?php echo htmlspecialchars($_POST['nome'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Cognome:</strong>
                    <?php echo htmlspecialchars($_POST['cognome'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Email:</strong>
                    <?php echo htmlspecialchars($_POST['email'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Età:</strong>
                    <?php echo htmlspecialchars($_POST['eta'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Ruolo:</strong>
                    <?php echo htmlspecialchars($_POST['ruolo'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Termini e Condizioni:</strong>
                    <?php echo isset($_POST['termini']) ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?>
                </p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <!-- 
                    Aggiunta di una sezione per la validazione dei dati
                    Usato:
                    - filter_var per validare l'email: https://www.php.net/manual/en/function.filter-var.php#:~:text=%3C%3Fphp%0Avar_dump(filter_var(%27bob%40example.com%27%2C%20FILTER_VALIDATE_EMAIL))%3B%0Avar_dump(filter_var(%27https%3A//example.com%27%2C%20FILTER_VALIDATE_URL%2C%20FILTER_FLAG_PATH_REQUIRED))%3B%0A%3F%3E    
                    - is_numeric per validare l'email: https://www.php.net/manual/en/function.filter-var.php#:~:text=%3C%3Fphp%0Avar_dump(filter_var(%27bob%40example.com%27%2C%20FILTER_VALIDATE_EMAIL))%3B%0Avar_dump(filter_var(%27https%3A//example.com%27%2C%20FILTER_VALIDATE_URL%2C%20FILTER_FLAG_PATH_REQUIRED))%3B%0A%3F%3E    
                -->
                <p><strong>Email Valida:</strong> <?php echo validate_email($_POST['email'] ?? ''); ?></p>
                <p><strong>Eta Valida:</strong> <?php echo validate_age($_POST['eta'] ?? ''); ?></p>
                <p><strong>Termini e Condizioni Accettati:</strong>
                    <?php echo isset($_POST['termini']) ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?>
                </p>

                <br>

                <?php echo validate_email($_POST['email'] ?? '') && validate_age($_POST['eta'] ?? '') && isset($_POST['termini']) ? '<span class="alert alert--success">Tutti i dati sono validi</span>' : '<span class="alert alert--danger">Ci sono dati non validi</span>'; ?>
            </div>
        </section>

        <section class="u-flex">
            <a class="button button--secondary" href="index.php">Torna al form</a>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>