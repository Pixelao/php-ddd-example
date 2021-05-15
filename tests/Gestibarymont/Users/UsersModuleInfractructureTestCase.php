<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users;

use CodelyTv\Gestibarymont\Users\Domain\UserRepository;
use CodelyTv\Tests\Gestibarymont\Shared\Infrastructure\PhpUnit\GestibarymontContextInfrastructureTestCase;

abstract class UsersModuleInfrastructureTestCase extends GestibarymontContextInfrastructureTestCase
{
    protected function repository(): UserRepository
    {
        return $this->service(UserRepository::class);
    }
}
