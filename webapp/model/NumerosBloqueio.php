<?php


class NumerosBloqueio
{
    private $numerosBloqueio;

    public function __construct($selecionarNumeros)
    {
        $this->selecionarNumeros = new SeletorNumeros();
    }

    public function iniciar() {

    }

    public function bloquearNumeros($numeros, $somaDados) {
     if ( $this->selecionarNumeros->validadeNumber($numeros, $somaDados) == true){

     }
    }

    public function checkFinalJogada($numeros, $somaDados) {

    }

    public function getFinalPointSum() {

    }
}