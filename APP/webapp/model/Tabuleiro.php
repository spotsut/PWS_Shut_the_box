<?php


class Tabuleiro
{
    private $dado;
    public $resultadoDado1, $resultadoDado2, $somaDados;
    public $numeroBloqueioP1, $numeroBloqueioP2;

    public function __construct()
    {
        $this->dado = new Dado();

        $this->numeroBloqueioP1 = new NumerosBloqueio();
        $this->numeroBloqueioP2 = new NumerosBloqueio();
    }

    public function rolarDados()
    {
        $this->resultadoDado1 = $this->dado->rolarDado();
        $this->resultadoDado2 = $this->dado->rolarDado();

        $this->somaDados = $this->resultadoDado1 + $this->resultadoDado2;
    }

    public function checkFinalJogadaP1($soma)
    {
        if ($this->numeroBloqueioP1->checkFinalJogada($soma)) {
            return true;
        }
        return false;
    }

    public function checkFinalJogadaP2($soma)
    {
        if ($this->numeroBloqueioP2->checkFinalJogada($soma)) {
            return true;
        }
        return false;
    }

    public function checkFinalJogo($soma)
    {
        if ($this->checkFinalJogadaP2($soma)) {
            return true;
        }
        return false;
    }

    public function getVencedor()
    {
        if ($this->numeroBloqueioP1->getFinalPointSum() < $this->numeroBloqueioP2->getFinalPointSum()) {
            return 1;
        } else if ($this->numeroBloqueioP1->getFinalPointSum() > $this->numeroBloqueioP2->getFinalPointSum()) {
            return 2;
        } else {
            return 3;
        }
    }

    public function getPointsVencedor()
    {
        $pontos = 0;
         if ($this->getVencedor() == 1){
             $pontos = $this->numeroBloqueioP1->getSomaNumerosBloqueados() - $this->numeroBloqueioP2->getSomaNumerosBloqueados();
         }
         elseif ($this->getVencedor() == 2 ){
             $pontos = $this->numeroBloqueioP2->getSomaNumerosBloqueados() - $this->numeroBloqueioP1->getSomaNumerosBloqueados();
         }

         return $pontos;
    }
}