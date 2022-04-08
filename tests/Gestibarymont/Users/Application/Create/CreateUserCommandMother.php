<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Application\Create;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Gestibarymont\Users\Application\Create\CreateUserCommand;
use CodelyTv\Gestibarymont\Users\Domain\UserName;
use CodelyTv\Gestibarymont\Users\Domain\UserPassword;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserIdMother;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserNameMother;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserPasswordMother;

final class CreateUserCommandMother
{
    public static function create(
        ?UserId $id = null,
        ?UserName $name = null,
        ?UserPassword $password = null
    ): CreateUserCommand {
        return new CreateUserCommand(
            $id?->value() ?? UserIdMother::create()->value(),
            $name?->value() ?? UserNameMother::create()->value(),
            $password?->value() ?? UserPasswordMother::create()->value()
        );
    }
}
