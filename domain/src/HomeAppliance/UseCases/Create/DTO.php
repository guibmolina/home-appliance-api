<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\Create;

class DTO
{
    public string $name;

    public string $description;

    public string $voltage;

    public string $brand;

    public function __construct(
        string $name,
        string $description,
        string $voltage,
        string $brand,
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->voltage = $voltage;
        $this->brand = $brand;
    }
}
