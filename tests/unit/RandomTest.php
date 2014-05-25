<?php

class RandomTest extends PHPUnit_Framework_TestCase
{
    public function test_randomPattern_return_1_or_2()
    {
        $random = new Random();
        $this->assertContains($random->getPattern(), array(1, 2));
    }

    public function test_randomOperand_return_1_to_9()
    {
        $random = new Random();
        $this->assertContains($random->getOperand(), array(1, 2, 3, 4, 5, 6, 7, 8, 9));
    }

    public function test_randomOperator_return_1_to_3()
    {
        $random = new Random();
        $this->assertContains($random->getOperator(), array(1, 2, 3));
    }
}

?>
