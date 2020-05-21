<?php
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Session;

class GameController
{
    public function home() {
        $engine= null;
        if(!Session::has('gameEngine')) {
            $engine = new GameEngine();
            Session::set('gameEngine', $engine);
        }
        $engine = new GameEngine();
        return View::make('home.home', ['ge'=> $engine]);
    }

    public function iniciarJogo() {

        if(!Session::has('gameEngine')) {
            $engine = new GameEngine();
        }
        else {
            $engine = Session::get('gameEngine');
        }
        $engine->iniciarJogo();
        $engine->updateEstadoJogo(1);
        Session::set('gameEngine', $engine);
        return View::make('home.home', ['ge'=> $engine]);
    }

    public function rolarDados() {
        $engine = Session::get('gameEngine');
        $engine->rolarDados();
        $engine->updateEstadoJogo(2);
        Session::set('gameEngine', $engine);

        return View::make('home.home', ['ge'=> $engine]);
    }
}
