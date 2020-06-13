<?php

use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;


class UserController
{
    public function register()
    {
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
        $msg->msg = $msg->login_user($msg->email_user, $pass);

        return View::make('user.index', ['msg' => $msg]);
    }

    public function logout()
    {
        Session::destroy();
        return View::make('user.index');
    }

    public function atualizar()
    {
        $id = Session::get('user');
        $atualizar = new AtualizarUser();
        $nick = Post::get('nickname');
        $nome = Post::get('firstname');
        $apelido = Post::get('lastname');
        $email = Post::get('email');
        $atualizar->autalizar($id[0], $nick,$nome,$apelido, $email);
        return View::make('home.perfil');
    }
}