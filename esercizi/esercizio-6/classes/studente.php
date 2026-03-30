<?php

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

?>