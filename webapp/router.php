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
Router::get('home/home',	'HomeController/home');
Router::get('home/perfil',	'HomeController/perfil');
Router::get('home/scores',	'HomeController/scores');
Router::get('home/top_10',	'HomeController/top_10');

/************ USER ***********/
Router::post('user/register', 'UserController/register');

Router::post('user/index', 'UserController/login');



/************** End of URLEncoder Routing Rules ************************************/