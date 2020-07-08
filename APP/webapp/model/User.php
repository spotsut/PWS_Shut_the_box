<?php


class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array (
        array('nickname'),
        array('firstname'),
        array('email'),
        array('lastname'),
        array('password')
    );
}