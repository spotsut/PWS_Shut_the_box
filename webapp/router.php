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
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/register',	'HomeController/register');
Router::get('home/home',	'HomeController/home');
Router::get('home/perfil',	'HomeController/perfil');
Router::get('home/scores',	'HomeController/scores');
Router::get('home/scores_globais',	'HomeController/scores_globais');









/************** End of URLEncoder Routing Rules ************************************/