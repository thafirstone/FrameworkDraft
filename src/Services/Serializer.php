<?php

namespace DI\Services;

use DI\Format\FormatInterface;

class Serializer
{
    private $format;
    public function __construct(FormatInterface $format)
    {
        $this->format = $format;
    }

    public function serialize(array $data): string
    {
        $this->format->setData($data);
        return $this->format->convert();
    }
}
