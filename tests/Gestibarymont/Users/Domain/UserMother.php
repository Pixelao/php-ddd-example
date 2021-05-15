<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Users\Application\Create\CreateUserCommand;
use CodelyTv\Gestibarymont\Users\Domain\User;
use CodelyTv\Gestibarymont\Users\Domain\UserPassword;
use CodelyTv\Gestibarymont\Users\Domain\UserName;
use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;

final class UserMother
{
    public static function create(
        ?UserId $id = null,
        ?UserName $name = null,
        ?UserPassword $password = null
    ): User {
        return new User(
            $id ?? UserIdMother::create(),
            $name ?? UserNameMother::create(),
            $password ?? UserPasswordMother::create()
        );
    }

    public static function fromRequest(CreateUserCommand $request): User
    {
        return self::create(
            UserIdMother::create($request->id()),
            UserNameMother::create($request->name()),
            UserPasswordMother::create($request->password())
        );
    }
}
