<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\Update;

use HomeAppliance\Domain\HomeAppliance\Entities\HomeApplianceEntity;

class Response
{
    private HomeApplianceEntity $homeAppliance;

    public function __construct(HomeApplianceEntity $homeAppliance)
    {
        $this->homeAppliance = $homeAppliance;
    }

    public function response(): array
    {
        return [
            'id' => $this->homeAppliance->id,
        ];
    }
}
