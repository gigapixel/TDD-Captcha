<?php

class Captcha
{
    private $pattern;
    private $leftOperand;
    private $rightOperand;
    private $operator;

    private $mapOperator = array(
        '1' => '+',
        '2' => '*',
        '3' => '-',
    );

    private $mapNumber = array(
        '1' => 'One',
        '2' => 'Two',
        '3' => 'Three',
        '4' => 'Four',
        '5' => 'Five',
        '6' => 'Six',
        '7' => 'Seven',
        '8' => 'Eight',
        '9' => 'Nine',
    );

    public function __construct($pattern, $leftOperand, $operator, $rightOperand)
    {
        $this->pattern  = $pattern;
        $this->leftOperand = $leftOperand;
        $this->operator = $operator;
        $this->rightOperand = $rightOperand;
    }

    public function getRightOperand()
    {
        if ($this->pattern == 1)
        {
            $result = $this->rightOperand;
        }
        else
        {
            $result = $this->mapNumber[$this->rightOperand];
        }

        return (string) $result;
    }

    public function getLeftOperand() {
        if ($this->pattern == 2)
        {
            $result = $this->leftOperand;
        }
        else
        {
            $result = $this->mapNumber[$this->leftOperand];
        }

        return (string) $result;
    }

    public function getOperator()
    {
        return $this->mapOperator[$this->operator];
    }

    public function toString()
    {
        $leftOperand = $this->getLeftOperand();
        $rightOperand = $this->getRightOperand();
        $operator = $this->getOperator();

        $result =  $leftOperand . " " . $operator . " " . $rightOperand . " =";

        return $result;
    }

    public function getResult()
    {
        $result = '';

        if ($this->operator == 1)
        {
            $result = $this->leftOperand + $this->rightOperand;
        }
        else if ($this->operator == 2)
        {
            $result = $this->leftOperand * $this->rightOperand;
        }
        else
        {
            if ($this->leftOperand < $this->rightOperand)
            {
                throw new MinusErrorException("Left operand must be greater than right operand");
            }

            $result = $this->leftOperand - $this->rightOperand;
        }

        return (string) $result;
    }
}

class MinusErrorException extends Exception { }

?>
