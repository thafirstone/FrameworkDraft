<?php

namespace DI\Format;

interface FormatInterface
{
    public function convert(): string;

    public function setData(array $data): void;
}
