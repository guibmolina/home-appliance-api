<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliance;

use HomeAppliance\Domain\HomeAppliance\Repositories\HomeAppliance as Repository;

class HomeAppliance
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(DTO $DTO): Response
    {
        $homeAppliance = $this->repository->getHomeApplianceById($DTO->id);

        return new Response($homeAppliance);
    }
}
