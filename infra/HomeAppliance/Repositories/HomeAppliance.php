<?php

declare(strict_types=1);

namespace HomeAppliance\Infra\HomeAppliance\Repositories;

use App\Models\Brand as ModelsBrand;
use App\Models\HomeAppliance as ModelsHomeAppliance;
use Exception;
use HomeAppliance\Domain\HomeAppliance\Entities\HomeApplianceEntity;
use HomeAppliance\Domain\HomeAppliance\List\HomeApplianceList;
use HomeAppliance\Domain\HomeAppliance\Repositories\HomeAppliance as HomeApplianceInterface;
use HomeAppliance\Domain\HomeAppliance\ValueObjects\Brand;
use HomeAppliance\Domain\HomeAppliance\ValueObjects\Voltage;

class HomeAppliance implements HomeApplianceInterface
{
    public function getHomeAppliances(): HomeApplianceList
    {
        $homeApplianceList = new HomeApplianceList();
        foreach (ModelsHomeAppliance::all() as $homeAppliance) {
            $homeApplianceList->add(
                new HomeApplianceEntity(
                    $homeAppliance->name,
                    $homeAppliance->description,
                    new Voltage($homeAppliance->voltage),
                    new Brand($homeAppliance->brand->name)
                )
            );
        }

        return $homeApplianceList;
    }

    public function getHomeApplianceById(int $id): HomeApplianceEntity
    {
        $homeAppliance = ModelsHomeAppliance::find($id);

        $homeApplianceEntity = new HomeApplianceEntity(
            $homeAppliance->name,
            $homeAppliance->description,
            new Voltage($homeAppliance->voltage),
            new Brand($homeAppliance->brand->name)
        );

        $homeApplianceEntity->id = $homeAppliance->id;

        return $homeApplianceEntity;
    }

    public function create(HomeApplianceEntity $homeApplianceEntity): HomeApplianceEntity
    {
        $brand = ModelsBrand::where('name', $homeApplianceEntity->brand())->first();

        $homeAppliance = new ModelsHomeAppliance();
        $homeAppliance->name = $homeApplianceEntity->name;
        $homeAppliance->description = $homeApplianceEntity->description;
        $homeAppliance->voltage = $homeApplianceEntity->voltage();

        $homeApplianceSaved = $brand->homeAppliances()->save($homeAppliance);

        $homeApplianceEntity->id = $homeApplianceSaved->id;

        return $homeApplianceEntity;
    }

    public function update(HomeApplianceEntity $homeApplianceEntity): HomeApplianceEntity
    {
        $brand = ModelsBrand::where('name', $homeApplianceEntity->brand())->first();

        $homeAppliance = ModelsHomeAppliance::find($homeApplianceEntity->id);
        $homeAppliance->name = $homeApplianceEntity->name;
        $homeAppliance->description = $homeApplianceEntity->description;
        $homeAppliance->voltage = $homeApplianceEntity->voltage();

         $brand->homeAppliances()->save($homeAppliance);

        return $homeApplianceEntity;
    }

    public function delete(HomeApplianceEntity $homeApplianceEntity): void
    {
        $homeAppliance = ModelsHomeAppliance::find($homeApplianceEntity->id);

        $homeAppliance->delete();
    }
}
