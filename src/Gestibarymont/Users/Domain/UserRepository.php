<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;

interface UserRepository
{
    public function save(User $user): void;

    public function search(UserId $id): ?User;
}
