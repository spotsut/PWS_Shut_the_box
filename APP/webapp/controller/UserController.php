<?php

use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;


class UserController
{
    public function register()
    {
        $user = new User();
        $user->nickname = Post::get('nickname');
        $user->firstname = Post::get('firstname');
        $user->lastname = Post::get('lastname');
        $user->email = Post::get('email');
        $password = base64_encode(hash("sha256", mb_convert_encoding(Post::get('password'), "UTF-16LE"), true));
        $user->password = $password;

        if ($user->is_valid()) {
            $user->save();
            Redirect::toRoute('user/index');
        } else {
            Redirect::flashToRoute('user/register', ['user' => $user]);
        }
    }

    public function login()
    {
        $password = base64_encode(hash("sha256", mb_convert_encoding(Post::get('password'), "UTF-16LE"), true));
        if (User::exists(array('email' => Post::get('email'), 'password' => $password))) {
            $user = User::find(array('email' => Post::get('email')));
            if ($user->bloqueado != 1) {
                Session::set('user', $user);
                Redirect::toRoute('home/home');
            } else {
                Redirect::flashToRoute('user/index', ['bloqueado' => true, 'errado' => false]);
            }
        } else {
            Redirect::flashToRoute('user/index', ['errado' => true, 'bloqueado' => false]);
        }
    }

    public function logout()
    {
        Session::destroy();
        return View::make('user.index');
    }

    public function atualizar()
    {
        $user = Session::get('user');

        $user->nickname = Post::get('nickname');
        $user->firstname = Post::get('firstname');
        $user->lastname = Post::get('lastname');
        $user->email = Post::get('email');
        if (Post::get('password') != '') {
            $password = base64_encode(hash("sha256", mb_convert_encoding(Post::get('password'), "UTF-16LE"), true));
            $user->password = $password;
        }
        $user->genero = Post::get('gender');

        Session::set('user', $user);

        if ($user->is_valid()) {
            $user->save();
            Redirect::toRoute('home/perfil');
        } else {
            Redirect::toRoute('jogo/perfil');
        }
    }

    public function ban($id)
    {
        $user = User::find($id);

        if ($user->bloqueado == 0) {
            $user->bloqueado = 1;
        } else {
            $user->bloqueado = 0;
        }
        $user->save();

        Redirect::toRoute('home/ban');
    }
}