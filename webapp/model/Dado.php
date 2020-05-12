<?php


class Dado
{
    public function rolarDado(){
        $dado = 0;
        $dado = rand (1,6) ;
        return $dado;
    }
}