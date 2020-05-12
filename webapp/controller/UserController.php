<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

class UserController
{
    public function register (){
        $msg = new Register();
        
        $msg->register();

        return View::make('user.register', ['msg' => $msg]);
    }
}