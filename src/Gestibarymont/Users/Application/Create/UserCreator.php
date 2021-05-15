<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Application\Create;

use CodelyTv\Gestibarymont\Users\Domain\User;
use CodelyTv\Gestibarymont\Users\Domain\UserPassword;
use CodelyTv\Gestibarymont\Users\Domain\UserName;
use CodelyTv\Gestibarymont\Users\Domain\UserRepository;
use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class UserCreator
{
    public function __construct(private UserRepository $repository, private EventBus $bus)
    {
    }

    public function __invoke(UserId $id, UserName $name, UserPassword $password): void
    {
        $user = User::create($id, $name, $password);

        $this->repository->save($user);
        $this->bus->publish(...$user->pullDomainEvents());
    }
}
