<?php

namespace DI\Controller;

use DI\Services\Serializer;
use DI\Annotations\Route;


/**
 * @Route(route="/posts")
 */
class PostController
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
     *
     * @return string
     */
    public function index(): string
    {
        return $this->serializer->serialize([
            'Action' => 'Post',
            'Time' => time(),
        ]);
    }

    /**
     * @Route(route="/one")
     *
     * @return string
     */
    public function one(): string
    {
        return $this->serializer->serialize([
            'Action' => 'PostOne',
            'Time' => time(),
        ]);
    }
}
