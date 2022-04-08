<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Application\Find;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Gestibarymont\Users\Domain\User;
use CodelyTv\Gestibarymont\Users\Domain\UserNotExist;
use CodelyTv\Gestibarymont\Users\Domain\UserRepository;

final class UserFinder
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(UserId $id): User
    {
        $user = $this->repository->search($id);

        if (null === $user) {
            throw new UserNotExist($id);
        }

        return $user;
    }
}
