<?php


class SeletorNumeros
{
    private $numerosSelecionados = array();


    public function validadeNumber($userNumber, $numerosBloqueio)
    {
        if ($numerosBloqueio[$userNumber] == true) {
            return false;

        } else {
            return true;
        }
    }

    public function updateSelection($userNumber)
    {
        if($this->selectionHasNumber($userNumber)){
            $index = array_search($userNumber, $this->numerosSelecionados);
            unset($this->numerosSelecionados[$index]);
        }
        else {
            array_push($this->numerosSelecionados, $userNumber);
        }
    }

    public function checkSeletionTotal($totalDados)
    {
        $soma = 0;
        foreach ($this->numerosSelecionados as $numero) {
            $soma += $numero;

        }
        if ($soma == $totalDados) {
            return true;

        }
    }

    public function clearSelection()
    {
        unset($this->numerosSelecionados);
        $this->numerosSelecionados = array();
    }

    public function selectionHasNumber($number)
    {
        return in_array($number, $this->numerosSelecionados);
    }
}