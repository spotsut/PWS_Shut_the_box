<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

class GameController
{
    public function ComecarJogo(){
        $iniciajogo = new GameEngine();
    

        return View::make('home.home');
    }


    }
