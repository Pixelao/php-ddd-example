<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Application\Update;

use CodelyTv\Gestibarymont\Users\Application\Find\UserFinder;
use CodelyTv\Gestibarymont\Users\Domain\UserName;
use CodelyTv\Gestibarymont\Users\Domain\UserRepository;
use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class UserRenamer
{
    private UserFinder     $finder;

    public function __construct(private UserRepository $repository, private EventBus $bus)
    {
        $this->finder = new UserFinder($repository);
    }

    public function __invoke(UserId $id, UserName $newName): void
    {
        $user = $this->finder->__invoke($id);

        $user->rename($newName);

        $this->repository->save($user);
        $this->bus->publish(...$user->pullDomainEvents());
    }
}
