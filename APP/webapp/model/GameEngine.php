<?php


class GameEngine
{
    public $tabuleiro;
    private $estadoJogo;

    public function iniciarJogo() {
        $this->tabuleiro = new Tabuleiro();
        $this->estadoJogo = 0;
    }

    public function getEstadoJogo() {
    return $this->estadoJogo;
    }

    public function updateEstadoJogo($estado) {
        $this->estadoJogo = $estado;
    }

    public function rolarDados() {
        //Inicializar os dados
        $this->tabuleiro -> rolarDados();
    }
}