<?php

namespace MiProyecto;

class MyParser
{
    public function parseString(string $input): array
    {
        return explode(',', $input);
    }

    public function parseNumbers(string $input): array
    {
        return array_map('intval', $this->parseString($input));
    }
}