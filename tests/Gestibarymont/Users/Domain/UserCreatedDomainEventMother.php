<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Users\Domain\User;
use CodelyTv\Gestibarymont\Users\Domain\UserCreatedDomainEvent;
use CodelyTv\Gestibarymont\Users\Domain\UserPassword;
use CodelyTv\Gestibarymont\Users\Domain\UserName;
use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;

final class UserCreatedDomainEventMother
{
    public static function create(
        ?UserId $id = null,
        ?UserName $name = null,
        ?UserPassword $password = null
    ): UserCreatedDomainEvent {
        return new UserCreatedDomainEvent(
            $id?->value() ?? UserIdMother::create()->value(),
            $name?->value() ?? UserNameMother::create()->value(),
            $password?->value() ?? UserPasswordMother::create()->value()
        );
    }

    public static function fromUser(User $user): UserCreatedDomainEvent
    {
        return self::create($user->id(), $user->name(), $user->password());
    }
}
