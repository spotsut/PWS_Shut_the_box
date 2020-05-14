<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:30
 */
class HomeController extends BaseController
{

    public function index(){

        return View::make('user.index');
    }

    public function start(){

        //View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'Quick Start']);
        return View::make('home.start');
    }

    public function login(){
        $msg = new Login();
        return View::make('user.login', ['msg' => $msg]);
    }

    public function register(){
        $msg = new Register();
        return View::make('user.register', ['msg' => $msg]);
    }

    public function home(){
        return View::make('home.home');
    }

    public function scores(){
        return View::make('home.scores');
    }
    public function top_10(){
        return View::make('home.top_10');
    }

    public function perfil(){
        return View::make('home.perfil');
    }

    public function worksheet(){

        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'MVC Worksheet']);

        return View::make('home.worksheet');
    }

    public function setsession(){
        $dataObject = MetaArmCoreModel::getComponents();
        Session::set('object', $dataObject);

        Redirect::toRoute('home/worksheet');
    }

    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/worksheet');
    }


}