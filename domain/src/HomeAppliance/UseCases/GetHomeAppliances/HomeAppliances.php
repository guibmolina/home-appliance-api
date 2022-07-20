<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\UseCases\GetHomeAppliances;

use HomeAppliance\Domain\HomeAppliance\Repositories\HomeAppliance as Repository;

class HomeAppliances
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): Response
    {
        $homeAppliances = $this->repository->getHomeAppliances();

        return new Response($homeAppliances);
    }
}
