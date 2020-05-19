<?php


class Tabuleiro
{
    private $dado;

    public $resultadoDado1, $resultadoDado2;
    public $numerosBloqueioP1, $numeroBloqueioP2;

    public function rolarDados(){
        /*roda duas vezes*/
        $rolar= new Dado();
        $rolar->rolarDado();
    }

    public function checkFinalJogadorP1($soma){

    }

    public function checkFinalJogadorPointsP2($soma){

    }
}