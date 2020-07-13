<?php

use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

class GameController
{
    public function home()
    {
        $engine = new GameEngine();
        return View::make('home.home', ['ge' => $engine]);
    }

    public function iniciarJogo()
    {

        if (!Session::has('gameEngine')) {
            $engine = new GameEngine();
        } else {
            $engine = Session::get('gameEngine');
        }
        $engine->iniciarJogo();
        $engine->updateEstadoJogo(1);
        Session::set('gameEngine', $engine);

        return View::make('home.home', ['ge' => $engine]);
    }

    public function rolarDados()
    {
        $engine = Session::get('gameEngine');

        if ($engine->getEstadoJogo() != 2 && $engine->getEstadoJogo() != 4) {
            $engine->rolarDados();
        }

        if ($engine->getEstadoJogo() == 1) {
            $engine->updateEstadoJogo(2);
        } else if ($engine->getEstadoJogo() == 3) {
            $engine->updateEstadoJogo(4);
        }

        if ($engine->tabuleiro->checkFinalJogadaP1($engine->tabuleiro->somaDados)) {
            $engine->updateEstadoJogo(4);
        }

        if ($engine->tabuleiro->checkFinalJogadaP2($engine->tabuleiro->somaDados)) {
            $engine->updateEstadoJogo(5);

            $user = Session::get('user');
            $score = new Score();
            $score->score = $engine->tabuleiro->getPointsVencedor();
            $score->user = $user->id_user;

            if ($engine->tabuleiro->getVencedor() == 1) {
                $score->state = 'Win';
            } else if ($engine->tabuleiro->getVencedor() == 2) {
                $score->state = 'Lost';
            } else {
                $score->state = 'Tie';
            }

            $score->save();
          //  $engine->updateEstadoJogo(1);
        }
        Session::set('gameEngine', $engine);
        return View::make('home.home', ['ge' => $engine]);
    }

    public function selecionaNumero($number)
    {
        $engine = Session::get('gameEngine');

        if ($engine->getEstadoJogo() == 2) {
            $engine->tabuleiro->numeroBloqueioP1->seletorNumeros->updateSelection($number);
            if ($engine->tabuleiro->numeroBloqueioP1->bloquearNumeros($engine->tabuleiro->somaDados)) {
                $engine->updateEstadoJogo(1);
                $engine->tabuleiro->numeroBloqueioP1->seletorNumeros->clearSelection();
            }
        } else if ($engine->getEstadoJogo() == 4) {
            $engine->tabuleiro->numeroBloqueioP2->seletorNumeros->updateSelection($number);
            if ($engine->tabuleiro->numeroBloqueioP2->bloquearNumeros($engine->tabuleiro->somaDados)) {
                $engine->updateEstadoJogo(3);
                $engine->tabuleiro->numeroBloqueioP2->seletorNumeros->clearSelection();
            }
        }

        Session::set('gameEngine', $engine);
        return View::make('home.home', ['ge' => $engine]);
    }
}
