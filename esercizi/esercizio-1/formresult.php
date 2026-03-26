<?php
// Funzioni di validazione

function validate_string($value)
{
    // Valore vuoto o solo spazi
    if (trim($value) === '') {
        return null;
    }

    // Valore non valido
    if (!preg_match("/^[\p{L}\s'’]+$/u", $value)) {
        return false;
    }

    return $value;
}

function validate_email($value)
{
    // Valore vuoto o solo spazi
    if (trim($value) === '') {
        return null;
    }

    // Email non valida
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return $value;
}

function validate_age($age)
{
    return isset($age) && is_numeric($age) && $age >= 18 ? (int) $age : false;
}

function validate_role($value)
{
    $valid_roles = ['studente', 'insegnante', 'admin'];

    if (!in_array($value, $valid_roles, true)) {
        // Valore non valido o non selezionato
        return false;
    }

    return $value;
}



// Funzioni per visualizzare i risultati

function get_icon($value)
{
    if ($value === null) {
        return '<span class="badge badge--error">Dato mancante</span>';
    } elseif ($value === false) {
        return '<span class="badge badge--warning">Dato non valido</span>';
    } else {
        return '<span class="badge badge--success">' . htmlspecialchars($value) . '</span>';
    }
}

function get_mark($value)
{
    return $value ? '<span class="badge badge--success">✓</span>' : '<span class="badge badge--error">✗</span>';
}



// Assegnazione dei dati e validazione

// Controllo che la richiesta sia POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$data = [
    'nome' => validate_string($_POST['nome']),
    'cognome' => validate_string($_POST['cognome']),
    'email' => validate_email($_POST['email']),
    'eta' => validate_age($_POST['eta']),
    'ruolo' => validate_role($_POST['ruolo']),
    'termini' => isset($_POST['termini']) && $_POST['termini'] === 'on' ? true : false
];

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta nome="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato - Esercizio 1 - Registrazione Utente</title>
    <link rel="stylesheet" href="/css/min.core.css">
    <link rel="stylesheet" href="/css/project-theme.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container container--md u-p-6 u-gap-6">
        <?php
        $is_valid = !in_array(null, $data, true) && !in_array(false, $data, true);
        echo $is_valid ? '<span class="alert alert--success u-mb-4 u-mt-4">Tutti i dati sono validi</span>' : '<span class="alert alert--danger u-mb-4 u-mt-4">Ci sono dati non validi</span>';
        ?>

        <section class="card card--elevated u-gap-4">
            <div class="card__header">
                <h2 class="card__title">Dati inseriti:</h2>
            </div>

            <div class="card__body">
                <p><strong>Nome:</strong>
                    <?php echo get_icon($data['nome']); ?>
                </p>
                <p><strong>Cognome:</strong>
                    <?php echo get_icon($data['cognome']); ?>
                </p>
                <p><strong>Email:</strong>
                    <?php echo get_icon($data['email']); ?>
                </p>
                <p><strong>Età:</strong>
                    <?php echo get_icon($data['eta']); ?>
                    <?php if ($data['eta'] === false) : ?>
                        <span class="badge badge--warning">Devi essere maggiorenne</span>
                    <?php endif; ?>
                </p>
                <p><strong>Ruolo:</strong>
                    <?php echo get_icon($data['ruolo']); ?>
                </p>
                <p><strong>Termini e Condizioni:</strong>
                    <?php echo $data['termini'] ? '<span class="badge badge--success">Accettato</span>' : '<span class="badge badge--error">Non accettato</span>'; ?>
                </p>
            </div>

            <div class="card__footer">
                <a class="button button--secondary" href="index.php">Torna al form</a>
            </div>
        </section>


    </main>

    <?php include 'footer.php'; ?>
</body>

</html>