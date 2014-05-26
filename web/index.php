<?php
require_once __DIR__.'/../vendor/autoload.php';



$app = new Silex\Application();
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app['captchaService'] = $app->share(function() {
    return new CaptchaService();
});

$app['captchaController'] = $app->share(function() use ($app) {
    return new CaptchaController($app['captchaService']);
});


/*$app->get('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});*/

$app->get('/api/v7/captcha', 'captchaController:captcha');

/*$app->get('/api/v7/captcha', function($name) use($app) {
    return $app['captchaController']->captcha();
});*/

$app->run();
?>
