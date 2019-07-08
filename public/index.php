<?php
require __DIR__.'/../vendor/autoload.php';

use DI\Kernel;
use Doctrine\Common\Annotations\AnnotationException;

error_reporting(E_ALL);
ini_set('display_errors', 1);


$kernel = new Kernel();
try {
    $kernel->boot();
    $kernel->handleRequest();
    $container = $kernel->getContainer();

} catch (ReflectionException $e) {
} catch (AnnotationException $e) {
}
