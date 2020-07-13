<?php


class NumerosBloqueio
{
    public $numerosBloqueio;
    public $seletorNumeros;

    public function __construct()
    {
        $this->seletorNumeros = new SeletorNumeros();
        $this->iniciar();
    }

    public function iniciar()
    {
        for ($i = 1; $i < 10; $i++) {
            $this->numerosBloqueio['' . $i] = false;
        }
    }

    public function bloquearNumeros($somaDados)
    {
        if ($this->seletorNumeros->checkSeletionTotal($somaDados)) {
            for ($i = 1; $i <= 9; $i++) {
                if ($this->seletorNumeros->selectionHasNumber($i)) {
                    $this->numerosBloqueio['' . $i] = true;
                }
            }
            return true;
        }
        return false;
    }

    public function getNumerosBloqueio($numero)
    {
        return $this->numerosBloqueio['' . $numero];
    }

    public function checkFinalJogada($somaDados)
    {
        switch ($somaDados) {
            case 2:
                if ($this->numerosBloqueio['2'])
                    return true;
                break;

            case 3:
                if ($this->numerosBloqueio['3'] && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['1']))
                    return true;
                break;

            case 4:
                if ($this->numerosBloqueio['4'] && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['3']))
                    return true;
                break;

            case 5:
                if ($this->numerosBloqueio['5'] && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['3']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['4']))
                    return true;
                break;

            case 6:
                if ($this->numerosBloqueio['6'] && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['4']))
                    return true;
                break;

            case 7:
                if ($this->numerosBloqueio['7'] && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['3'] || $this->numerosBloqueio['4']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['4']))
                    return true;
                break;

            case 8:
                if ($this->numerosBloqueio['8'] && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['4']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['4']) && ($this->numerosBloqueio['3'] || $this->numerosBloqueio['5']))
                    return true;
                break;

            case 9:
                if ($this->numerosBloqueio['9'] && ($this->numerosBloqueio['4'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['3'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['8']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['4']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['6']))
                    return true;
                break;

            case 10:
                if (($this->numerosBloqueio['4'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['9']) && ($this->numerosBloqueio['3'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['8']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['4'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['4']))
                    return true;
                break;

            case 11:
                if (($this->numerosBloqueio['5'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['4'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['3'] || $this->numerosBloqueio['8']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['9']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['4'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['4'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['8']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['5']))
                    return true;
                break;

            case 12:
                if (($this->numerosBloqueio['5'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['4'] || $this->numerosBloqueio['8']) && ($this->numerosBloqueio['3'] || $this->numerosBloqueio['9']) && ($this->numerosBloqueio['3'] || $this->numerosBloqueio['4'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['4'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['2'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['5'] || $this->numerosBloqueio['6']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['4'] || $this->numerosBloqueio['7']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['8']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['9']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['4'] || $this->numerosBloqueio['5']) && ($this->numerosBloqueio['1'] || $this->numerosBloqueio['2'] || $this->numerosBloqueio['3'] || $this->numerosBloqueio['6']))
                    return true;
                break;
        }
        return false;
    }

    public function getFinalPointSum()
    {
        $soma = 0;
        for ($i = 1; $i <= 9; $i++) {
            if (!$this->numerosBloqueio['' . $i]) {
                $soma += $i;
            }
        }
        return $soma;
    }

    public function getSomaNumerosBloqueados()
    {
        $soma = 0;
        for ($i = 1; $i <= 9; $i++) {
            if ($this->numerosBloqueio['' . $i]) {
                $soma += $i;
            }
        }
        return $soma;
    }
}