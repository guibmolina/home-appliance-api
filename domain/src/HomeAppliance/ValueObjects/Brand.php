<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\ValueObjects;

use HomeAppliance\Domain\HomeAppliance\Exceptions\InvalidBrandException;

class Brand
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $this->validName($name);
    }

    private function validName(string $name): string
    {
        try {
            return match (true) {
                strtoupper($name) === 'ELECTROLUX' => 'Electrolux',
                strtoupper($name) === 'BRASTEMP' => 'Brastemp',
                strtoupper($name) === 'Fischer' => 'Fischer',
                strtoupper($name) === 'SAMSUNG' => 'Samsung',
                strtoupper($name) === 'LG' => 'LG',
            };
        } catch (\UnhandledMatchError $e) {
            throw new InvalidBrandException("Brand $name is invalid");
        }
    }

    public function brand(): string
    {
        return $this->name;
    }
}
