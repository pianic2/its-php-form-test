<?php 
include 'classes/studente.php'; 

$students = [
    new Studente("Mario", "12345", "Full Stack Developer"),
    new Studente("Luigi", "67890", "Data Science")
];

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 6 - Classe studente</title>
    <link rel="stylesheet" href="/css/min.core.css">
    <link rel="stylesheet" href="/css/project-theme.css">
</head>

<body>
    <?php include 'header.php'; ?>
    
    <main class="container container--md u-p-6">
        <section class="card card--elevated u-gap-4">
            <div class="card__body">
                <h3 class="card__subtitle">Crea una classe Studente</h3>
                <p>Creiamo la classe Studente con le seguenti caratteristiche:</p>
                <ol>
                    <li>una proprietà public chiamata nome</li>
                    <li>una proprietà private chiamata matricola</li>
                    <li>una proprietà protected chiamata corso</li>
                </ol>
                <p>Aggiungi:</p>
                <ol>
                    <li>un costruttore che riceve i tre valori</li>
                    <li>un metodo public saluta() che stampa un messaggio del tipo: Ciao, sono Mario e frequento il corso Full Stack Developer.</li>
                    <li>un metodo public getMatricola() che restituisce la matricola</li>
                    <li>un metodo public setCorso($nuovoCorso) che modifica il corso</li>
                </ol>
                <xmp>
class Studente
{
    public $nome;
    private $matricola;
    protected $corso;

    public function __construct($nome, $matricola, $corso)
    {
        $this->nome = $nome;
        $this->matricola = $matricola;
        $this->corso = $corso;
    }

    public function saluta()
    {
        return "Ciao, sono $this->nome, e frequento il corso di $this->corso.";
    }

    public function getMatricola()
    {
        return $this->matricola;
    }

    public function setCorso($nuovoCorso)
    {
        $this->corso = $nuovoCorso;
    }
}
                </xmp>
            </div>
            
            <div class="card__body">
                <h3 class="card__subtitle">Cosa verificare</h3>
                <ul>
                    <li>
                        creare almeno 2 oggetti Studente con dati diversi
                        <xmp>
$students = [
    new Studente("Mario", "12345", "Full Stack Developer"),
    new Studente("Luigi", "67890", "Data Science")
];
                        </xmp>
                    </li>
                    <li>
                        provare a leggere nome
                        <xmp>
echo $students[0]->nome;
<?php echo $students[0]->nome;?>
<?php echo "\n";?>
echo $students[1]->nome;
<?php echo $students[1]->nome;?>

                        </xmp>
                    </li>
                    <li>
                        <p>provare a ottenere la matricola tramite metodo</p>
                        <xmp>
echo $students[0]->getMatricola();
<?php echo $students[0]->getMatricola();?>

                        </xmp>
                    </li>
                    <li>
                        <p>modificare il corso usando il metodo dedicato</p>
                        <xmp>
$students[0]->setCorso("Cybersecurity");
<?php echo $students[0]->saluta(); ?>

                        </xmp>
                    </li>
                    <li>
                        <p>la matricola non deve essere accessibile direttamente dall'esterno</p>
                        <xmp>
$studente = new Studente("Mario", "12345", "Full Stack Developer");
echo $studente->matricola; // Errore: proprietà privata

                        </xmp>
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>