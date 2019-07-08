<?php

namespace  DI\Format;

class XML extends AbstractBaseFormat implements FormatInterface
{
    public function convert(): string
    {
        $result = '';
        foreach ($this->data as $key => $value) {
            $result .= '<'.$key.'>'.$value.'</'.$key.'>';
        }

        return $result;
    }
}
