<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

class GameController
{
    public function ComecarJogo(){
        $gameEngine = new GameEngine();
        $gameEngine->iniciarJogo();

        Session::get('ge', $gameEngine);
    

        return View::make('home.home', $gameEngine);
    }
    public function rolarDados(){
        $gameEngine = Session::get('ge');
        $gameEngine->rolarDados();
        $gameEngine->updateEstadoJogo();

        Session::get('ge', $gameEngine);


        return View::make('home.home', $gameEngine);
    }


}
