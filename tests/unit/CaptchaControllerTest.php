<?php

class CaptchaControllerTest extends PHPUnit_Framework_TestCase
{
    public function test_create_CaptchaController()
    {
        $captchaService = new CaptchaService();
        $captchaController = new CaptchaController($captchaService);
        $this->assertInstanceOf('CaptchaController', $captchaController);
    }

    public function test_get_captcha_from_CaptchaController()
    {
        $captcha = new Captcha(1,1,1,1);

        $captchaServiceStub = $this->getMock('CaptchaService');
        $captchaServiceStub->expects($this->once())->method('getCaptcha')->will($this->returnValue($captcha));

        #$captchaService = new CaptchaService();
        $captchaController = new CaptchaController($captchaServiceStub);
        $this->assertEquals('One + 1 =', $captchaController->captcha());
    }
}
