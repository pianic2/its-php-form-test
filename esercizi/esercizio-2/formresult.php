<?php
function validate_operation($operation)
{
    $valid_operations = ['somma', 'sottrazione', 'moltiplicazione', 'divisione'];
    return in_array($operation, $valid_operations) ? true : false;
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato - Esercizio 2 - Calcolatrice</title>
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
                <p><strong>Numero 1:</strong>
                    <?php echo htmlspecialchars($_POST['numero1'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Operazione:</strong>
                    <?php echo htmlspecialchars($_POST['operazione'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
                <p><strong>Numero 2:</strong>
                    <?php echo htmlspecialchars($_POST['numero2'] ?? '<span class="badge badge--error">Dato Mancante</span>'); ?>
                </p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Validazione dati:</h2>
            </div>
            <div class="card__body">
                <p><strong>Numero 1:</strong> <?php echo is_numeric($_POST['numero1'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
                <p><strong>Numero 2:</strong> <?php echo is_numeric($_POST['numero2'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
                <p><strong>Operazione:</strong> <?php echo validate_operation($_POST['operazione'] ?? '') ? '<span class="badge badge--success">Sì</span>' : '<span class="badge badge--error">No</span>'; ?></p>
            </div>
        </section>

        <section class="card card--elevated u-gap-4 u-mb-4">
            <div class="card__header">
                <h2 class="card__title">Risultato:</h2>
            </div>
            <div class="card__body">
                <?php
                $num1 = (float) $_POST['numero1'];
                $num2 = (float) $_POST['numero2'];
                $operazione = (string) $_POST['operazione'];
                    
                if (isset($num1, $num2, $operazione) && is_numeric($num1) && is_numeric($num2) && validate_operation($operazione)) {
                    $risultato = null;
                    switch($operazione)
                    {
                        case "somma": { $risultato = $num1 + $num2; break; }
                        case "sottrazione": { $risultato = $num1 - $num2; break; }
                        case "moltiplicazione": { $risultato = $num1 * $num2; break; }
                        case "divisione": { if ($num2 != 0) { $risultato = $num1 / $num2; } else { $risultato = 'Errore: divisione per zero'; } break; }
                        default: { $risultato = 'Errore: operazione non valida'; break; }
                    }

                    echo '<p><strong>Il risultato è:</strong> ' . $risultato . '</p>';
                } else {
                    echo '<p><span class="alert alert--danger">Non è possibile calcolare il risultato: dati mancanti o non validi.</span></p>';
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