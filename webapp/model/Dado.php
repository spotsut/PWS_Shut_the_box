<?php


class Dado
{
    public function rolarDados(){
        $dado = 0;
        $dado = rand (1,6) ;
        return $dado;
    }
}