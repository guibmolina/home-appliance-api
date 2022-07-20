<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliance;

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
            'name' => $this->homeAppliance->name,
            'description' => $this->homeAppliance->description,
            'voltage' => $this->homeAppliance->voltage(),
            'brand' => $this->homeAppliance->brand()
        ];
    }
}
