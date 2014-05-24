<?php
require_once "CaptchaService.php";

class CaptchaServiceTest extends PHPUnit_Framework_TestCase
{
    public function test_getCaptcha_return_1111()
    {
        $randomStub = $this->getMock('Random');
        $randomStub->expects($this->any())->method('getPattern')->will($this->returnValue(1));
        $randomStub->expects($this->any())->method('getOperator')->will($this->returnValue(1));
        $randomStub->expects($this->any())->method('getOperand')->will($this->returnValue(1));

        $captchaService = new CaptchaService();
        $captchaService->setRandom($randomStub);
        $this->assertEquals(new Captcha(1,1,1,1), $captchaService->getCaptcha());
    }
}

?>
