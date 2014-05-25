<?php

class CaptchaController
{
    private $captchaService;

    public function __construct($captchaService)
    {
        $this->captchaService = $captchaService;
    }

    public function captcha()
    {
        return $this->captchaService->getCaptcha()->toString();
    }
}
?>
