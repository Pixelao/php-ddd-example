<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Shared\Infrastructure\PhpUnit;

use CodelyTv\Apps\Gestibarymont\Backend\GestibarymontBackendKernel;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class GestibarymontContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new GestibarymontEnvironmentArranger($this->service(EntityManager::class));

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new GestibarymontEnvironmentArranger($this->service(EntityManager::class));

        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return GestibarymontBackendKernel::class;
    }
}
