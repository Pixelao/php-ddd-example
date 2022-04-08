<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Infrastructure\Persistence;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Gestibarymont\Users\Domain\User;
use CodelyTv\Gestibarymont\Users\Domain\UserRepository;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    public function save(User $user): void
    {
        $this->persist($user);
    }

    public function search(UserId $id): ?User
    {
        return $this->repository(User::class)->find($id);
    }
}
