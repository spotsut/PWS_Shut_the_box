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
        $msg->nickname_user = Post::get('nick');
        $msg->email_user = Post::get('email');
        $pass = Post::get('password');
        $msg->msg = $msg->register_user($msg->nickname_user,  $msg->email_user, $pass);

        return View::make('user.register', ['msg' => $msg]);
    }

    public function login (){
        $msg = new Login();
        $msg->email_user = Post::get('email');
        $pass = Post::get('password');
        $msg->msg = $msg->login_user( $msg->email_user, $pass);

        return View::make('user.login', ['msg' => $msg]);
    }
}