<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\Delete;

use HomeAppliance\Domain\HomeAppliance\Repositories\HomeAppliance;

class Delete
{
    private HomeAppliance $repository;

    public function __construct(HomeAppliance $repository)
    {
        $this->repository = $repository;
    }

    public function execute(DTO $DTO): void
    {
        $homeAppliance = $this->repository->getHomeApplianceById($DTO->id);

        $homeAppliance = $this->repository->delete($homeAppliance);
    }
}
