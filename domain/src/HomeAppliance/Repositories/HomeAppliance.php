<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\Repositories;

use HomeAppliance\Domain\HomeAppliance\Entities\HomeApplianceEntity;
use HomeAppliance\Domain\HomeAppliance\List\HomeApplianceList;

interface HomeAppliance
{
    public function getHomeAppliances(): HomeApplianceList;

    public function getHomeApplianceById(int $id): HomeApplianceEntity;

    public function create(HomeApplianceEntity $homeApplianceEntity): HomeApplianceEntity;

    public function update(HomeApplianceEntity $homeApplianceEntity): HomeApplianceEntity;

    public function delete(HomeApplianceEntity $homeApplianceEntity): void;
}
