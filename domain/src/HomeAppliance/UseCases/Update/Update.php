<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\Update;

use HomeAppliance\Domain\HomeAppliance\Repositories\HomeAppliance;
use HomeAppliance\Domain\HomeAppliance\ValueObjects\Brand;
use HomeAppliance\Domain\HomeAppliance\ValueObjects\Voltage;

class Update
{
    private HomeAppliance $repository;

    public function __construct(HomeAppliance $repository)
    {
        $this->repository = $repository;
    }

    public function execute(DTO $DTO): Response
    {
        $homeAppliance = $this->repository->getHomeApplianceById($DTO->id);

        $homeAppliance->id = $DTO->id;
        $homeAppliance->name = $DTO->name;
        $homeAppliance->description = $DTO->description;
        $homeAppliance->setVoltage(new Voltage($DTO->voltage));
        $homeAppliance->setBrand(new Brand($DTO->brand));

         $homeApplianceCreated = $this->repository->update($homeAppliance);

        return new Response($homeApplianceCreated);
    }
}
