<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users;

use CodelyTv\Gestibarymont\Users\Domain\User;
use CodelyTv\Gestibarymont\Users\Domain\UserRepository;
use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class UsersModuleUnitTestCase extends UnitTestCase
{
    private UserRepository|MockInterface|null $repository;

    protected function shouldSave(User $user): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($user))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(UserId $id, ?User $user): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($user);
    }

    protected function repository(): UserRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(UserRepository::class);
    }
}
