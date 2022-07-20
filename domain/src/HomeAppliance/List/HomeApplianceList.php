<?php

declare(strict_types=1);

namespace HomeAppliance\Domain\HomeAppliance\List;

use ArrayIterator;
use HomeAppliance\Domain\HomeAppliance\Entities\HomeApplianceEntity;
use IteratorAggregate;
use Traversable;

/** @implements IteratorAggregate<Setting> */
class HomeApplianceList implements IteratorAggregate
{
    /** @var array<HomeApplianceEntity> */
    private array $homeAppliances;

    public function __construct()
    {
        $this->homeAppliances = [];
    }

    public function add(HomeApplianceEntity $homeAppliance): void
    {
        $this->homeAppliances[] = $homeAppliance;
    }

    /** @return array<HomeApplianceEntity> */
    public function homeAppliances(): array
    {
        return $this->homeAppliances;
    }

    /** @return Traversable<HomeApplianceEntity> */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->homeAppliances);
    }
}
