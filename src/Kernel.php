<?php

namespace DI;

use DI\Annotations\Route;
use DI\Format\FormatInterface;
use DI\Format\JSON;
use DI\Format\XML;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use ReflectionClass;
use ReflectionException;

class Kernel
{
    private $container;
    private $routes = [];

    public function __construct()
    {
        $this->container = new Container();
    }

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * @throws AnnotationException
     * @throws ReflectionException
     */
    public function boot(): void
    {
        $this->bootContainer($this->container);
    }

    public function handleRequest(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];
            if ($this->container->getService($route['service'])) {
                $response = $this->container->getService($route['service'])->{$route['method']}();
                echo $response;
            }
        }
    }

    /**
     * @param Container $container
     *
     * @throws ReflectionException
     * @throws AnnotationException
     */
    private function bootContainer(Container $container): void
    {
        $container->addService('format.json', static function () {
            return new JSON();
        });

//        $container->addService('format.xml', static function () {
//            return new XML();
//        });

        $container->addService('format', static function () use ($container) {
            return $container->getService('format.json');
        }, FormatInterface::class);

        $container->loadServices('DI\\Services');
        AnnotationRegistry::registerLoader('class_exists');
        $reader = new AnnotationReader();

        $routes = [];
        $container->loadServices(
            'DI\\Controller',
            static function (string $serviceName, ReflectionClass $class) use ($reader, &$routes) {
                $route = $reader->getClassAnnotation($class, Route::class);
                if (!$route) {
                    return null;
                }

                $baseRoute = $route->route;
                foreach ($class->getMethods() as $method) {
                    $route = $reader->getMethodAnnotation($method, Route::class);

                    if (!$route) {
                        continue;
                    }

                    $routes[str_replace('//', '/', $baseRoute.$route->route)] = [
                        'service' => $serviceName,
                        'method' => $method->getName(),
                    ];
                }
            }
        );
        $this->routes = $routes;

    }
}
