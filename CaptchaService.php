<?php
require_once 'Captcha.php';
require_once 'Random.php';

class CaptchaService
{
    private $random;

    public function setRandom($random)
    {
        $this->random = $random;
    }

    public function getCaptcha()
    {
        $random = $this->random;

        $leftOperand = $random->getOperand();
        $rightOperand = $random->getOperand();
        $operator = $random->getOperator();
        $pattern = $random->getPattern();

        return new Captcha($pattern, $leftOperand, $operator, $rightOperand);
    }
}
?>
