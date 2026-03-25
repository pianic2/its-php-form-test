<?php

function validate_username($username)
{
    // Username: 3-20 characters, letters, numbers, underscores
    return preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username);
}

function validate_password($password)
{
    // Password: 6-20 characters, letters, numbers, and special characters
    return preg_match("/^[a-zA-Z0-9_!@#$%^&*]{6,20}$/", $password);
}

function logging_check($username, $password)
{
    global $_MAX_ATTEMPTS;

    // Simulazione di un controllo di login (in un'app reale, si dovrebbe verificare contro un database)
    $valid_username = "admin";
    $valid_password = "password123";

    if ($username === $valid_username && $password === $valid_password) {
        return true;
    } else {
        $_MAX_ATTEMPTS++;
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato - Esercizio 3 - Mini login senza database</title>
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
                <p><strong>Username:</strong>
                    <?php echo htmlspecialchars($_POST['username'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Password:</strong>
                    <?php echo htmlspecialchars($_POST['password'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Validazione dati:</h2>
            </div>
            <div class="card__body">
                <p><strong>Username:</strong> <?php echo validate_username($_POST['username'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
                <p><strong>Password:</strong> <?php echo validate_password($_POST['password'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Risultato:</h2>
            </div>
            <div class="card__body">
                <?php
                $username = (string) $_POST['username'];
                $password = (string) $_POST['password'];
                    
                if (isset($username, $password) && validate_username($username) && validate_password($password)) {
                    if (logging_check($username, $password)) {
                        echo '<p><strong>Accesso riuscito:</strong> Benvenuto, ' . htmlspecialchars($username) . '!</p>';
                    } else {
                        echo '<p><span class="alert alert--danger">Accesso negato: username o password non validi.</span></p>';
                    }
                } else {
                    echo '<p><span class="alert alert--danger">Non è possibile fare il login: dati mancanti o non validi.</span></p>';
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