<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\Entities;

use HomeAppliance\Domain\HomeAppliance\ValueObjects\Brand;
use HomeAppliance\Domain\HomeAppliance\ValueObjects\Voltage;

class HomeApplianceEntity
{
    public int $id;

    public string $name;

    public string $description;

    private Voltage $voltage;

    private Brand $brand;

    public function __construct(
        string $name,
        string $description,
        Voltage $voltage,
        Brand $brand,
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->voltage = $voltage;
        $this->brand = $brand;
    }

    public function setVoltage(Voltage $voltage): void
    {
        $this->voltage = $voltage;
    }

    public function voltage(): string
    {
        return $this->voltage->voltage();
    }

    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    public function brand(): string
    {
        return $this->brand->brand();
    }
}
