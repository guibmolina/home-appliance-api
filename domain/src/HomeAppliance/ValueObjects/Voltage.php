<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\ValueObjects;

use HomeAppliance\Domain\HomeAppliance\Exceptions\InvalidVoltageException;

class Voltage
{
    private string $voltage;

    public function __construct(string $voltage)
    {
        $this->voltage = $this->validVoltage($voltage);
    }

    private function validVoltage(string $voltage): string
    {
        try {
            return match ($voltage) {
                "110" , "110v" => '110v',
                "220" , "220v" => '220v',
            };
        } catch (\UnhandledMatchError $e) {
            throw new InvalidVoltageException("Voltage $voltage is invalid");
        }
    }

    public function voltage(): string
    {
        return $this->voltage;
    }
}
