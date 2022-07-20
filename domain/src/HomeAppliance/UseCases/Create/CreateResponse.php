<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\Create;

use HomeAppliance\Domain\HomeAppliance\Entities\HomeApplianceEntity;

class CreateResponse
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
