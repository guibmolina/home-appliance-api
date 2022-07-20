<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliances;

use HomeAppliance\Domain\HomeAppliance\List\HomeApplianceList;

class Response
{
    private HomeApplianceList $homeAppliances;

    public function __construct(HomeApplianceList $homeAppliances)
    {
        $this->homeAppliances = $homeAppliances;
    }

    public function response(): array
    {
        $response = [];
        foreach ($this->homeAppliances as $homeAppliance) {
            $response[] = [
                'name' => $homeAppliance->name,
                'description' => $homeAppliance->description,
                'voltage' => $homeAppliance->voltage(),
                'brand' => $homeAppliance->brand()
            ];
        }

        return $response;
    }
}
