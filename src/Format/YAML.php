<?php

namespace  DI\Format;

class YAML extends AbstractBaseFormat implements NamedFormatInterface, FormatInterface
{
    public function convert(): string
    {
        $result = '';
        foreach ($this->data as $key => $value) {
            $result .= $key.':'.$value.'\n';
        }

        return $result;
    }

    public function getName(): string
    {
        return 'YAML';
    }
}
