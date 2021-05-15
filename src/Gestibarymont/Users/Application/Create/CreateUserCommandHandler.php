<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Application\Create;

use CodelyTv\Gestibarymont\Users\Domain\UserPassword;
use CodelyTv\Gestibarymont\Users\Domain\UserName;
use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Domain\Bus\Command\CommandHandler;

final class CreateUserCommandHandler implements CommandHandler
{
    public function __construct(private UserCreator $creator)
    {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $id       = new UserId($command->id());
        $name     = new UserName($command->name());
        $password = new UserPassword($command->password());

        $this->creator->__invoke($id, $name, $password);
    }
}
