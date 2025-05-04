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

    public function evaluateCommand(string $command)
    {
        // Patrones para detectar operación y lista de números
        $patterns = [
            '/^(suma|resta)\s+(-?\d+(?:\s*,\s*-?\d+)+)$/',        // suma -3,2,5
            '/^(suma|resta)\((-?\d+(?:\s*,\s*-?\d+)+)\)$/'        // suma(-3,2,5)
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $command, $matches)) {
                $operation = $matches[1];
                $numberString = $matches[2];
                $numbers = $this->parseNumbers($numberString);

                if (count($numbers) < 2) {
                    throw new \InvalidArgumentException("Se requieren al menos dos números.");
                }

                switch ($operation) {
                    case 'suma':
                        return array_sum($numbers);
                    case 'resta':
                        return array_reduce(array_slice($numbers, 1), fn($carry, $item) => $carry - $item, $numbers[0]);
                }
            }
        }

        throw new \InvalidArgumentException("Comando no reconocido: $command");
    }

}