<?php

namespace DI\Controller;

use DI\Services\Serializer;
use DI\Annotations\Route;

/**
 * @Route(route="/")
 */
class IndexController
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route(route="/")
     */
    public function index(): string
    {
        return $this->serializer->serialize([
            'Action' => 'Index',
            'Time' => time(),
        ]);
    }


    /**
     * @Route(route="/two")
     */
    public function two(): string
    {
        return $this->serializer->serialize([
            'Action' => 'IndexTwo',
            'Time' => time(),
        ]);
    }
}
