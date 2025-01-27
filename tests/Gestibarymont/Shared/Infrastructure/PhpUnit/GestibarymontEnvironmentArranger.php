<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Shared\Infrastructure\PhpUnit;

use CodelyTv\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use CodelyTv\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class GestibarymontEnvironmentArranger implements EnvironmentArranger
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
