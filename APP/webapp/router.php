    <?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('user/',		'HomeController/index');
Router::get('user/index',	'HomeController/index');
Router::get('user/register',	'HomeController/register');

Router::get('home/perfil',	'HomeController/perfil');
Router::get('home/scores',	'HomeController/scores');
Router::get('home/top_10',	'HomeController/top_10');
Router::get('home/ban',	'HomeController/ban');

/************ USER ***********/
Router::post('user/register', 'UserController/register');
Router::post('user/index', 'UserController/login');
Router::get('user/logout', 'UserController/logout');
Router::post('user/atualizar', 'UserController/atualizar');


/************ GAME ***********/
Router::post('home/home', 'GameController/iniciarJogo');
Router::get('jogo/iniciarjogo', 'GameController/iniciarJogo');
Router::get('jogo/rolardados','GameController/rolarDados');
Router::get('home/home',	'GameController/home');
Router::get('jogo/selecionaP1',	'GameController/selecionaNumeroP1');

/************** End of URLEncoder Routing Rules ************************************/