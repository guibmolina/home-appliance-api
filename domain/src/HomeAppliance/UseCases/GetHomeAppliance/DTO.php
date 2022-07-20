<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliance;

class DTO
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
