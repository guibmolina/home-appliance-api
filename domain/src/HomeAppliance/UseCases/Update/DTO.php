<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\Update;

class DTO
{
    public int $id;

    public string $name;

    public string $description;

    public string $voltage;

    public string $brand;

    public function __construct(
        int $id,
        string $name,
        string $description,
        string $voltage,
        string $brand,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->voltage = $voltage;
        $this->brand = $brand;
    }
}
