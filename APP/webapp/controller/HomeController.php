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
        return View::make('user.index');
    }

    public function register(){
        return View::make('user.register');
    }

    public function scores(){
        $user = Session::get('user');
        $scores =  Score::find('all', array('conditions' => 'user='.$user->id_user, 'order' => 'data desc'));
        return View::make('home.scores', ['scores' => $scores]);
    }

    public function ban(){
        $user = Session::get('user');
        if ($user->acesso != 1) {
            Redirect::toRoute('home/home');
        }
        return View::make('home.gerir_bans');
    }

    public function top_10(){
        $scores = Score::find('all', array('order' => 'score desc', 'limit' => 10));
        return View::make('home.top_10',['scores' => $scores]);
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