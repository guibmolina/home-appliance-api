<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\Create;

use HomeAppliance\Domain\HomeAppliance\Entities\HomeApplianceEntity;
use HomeAppliance\Domain\HomeAppliance\Repositories\HomeAppliance;
use HomeAppliance\Domain\HomeAppliance\ValueObjects\Brand;
use HomeAppliance\Domain\HomeAppliance\ValueObjects\Voltage;

class Create
{
    private HomeAppliance $repository;

    public function __construct(HomeAppliance $repository)
    {
        $this->repository = $repository;
    }

    public function execute(DTO $DTO): CreateResponse
    {
        $homeAppliance = new HomeApplianceEntity(
            $DTO->name,
            $DTO->description,
            new Voltage($DTO->voltage),
            new Brand($DTO->brand)
        );

         $homeApplianceCreated = $this->repository->create($homeAppliance);

        return new CreateResponse($homeApplianceCreated);
    }
}
