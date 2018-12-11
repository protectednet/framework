<?php
define('PHP_START', microtime(true));

use Cubex\Context\Context;
use Cubex\Cubex;
use Cubex\Routing\Router;
use Project\DefaultHandler;

$loader = require_once(dirname(__DIR__) . '/vendor/autoload.php');
$launcher = new Cubex(dirname(__DIR__), $loader);
$launcher->listen(
  Cubex::EVENT_HANDLE_START,
  function (Context $ctx) {
    //Configure your request here
  }
);
try
{
  $router = Router::i();
  $router->handle("/", new DefaultHandler());
  $launcher->handle($router);
}
catch(Throwable $e)
{
  die("Your request could not be handled");
}
