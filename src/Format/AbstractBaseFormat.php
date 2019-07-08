<?php

namespace DI\Format;

abstract class AbstractBaseFormat
{
    public $data;

    public function __toString()
    {
        return $this->convert();
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    abstract public function convert(): string;

}
