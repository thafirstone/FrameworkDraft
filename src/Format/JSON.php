<?php

namespace  DI\Format;

class JSON extends AbstractBaseFormat implements FromStringInterface, NamedFormatInterface, FormatInterface
{
    public function convert(): string
    {
        return json_encode($this->getData());
    }

    public function convertFromString($string)
    {
        return json_decode($string, true);
    }

    public function getName(): string
    {
        return 'JSON';
    }
}
