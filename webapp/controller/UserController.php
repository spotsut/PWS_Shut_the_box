<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;


class UserController
{
    public function register (){
        $msg = new Register();
        $nick = Post::get('nick');
        $email = Post::get('email');
        $pass = Post::get('password');
        $msg = $msg->register_user($nick, $email, $pass);

        return View::make('user.register', ['msg' => $msg]);
    }
}