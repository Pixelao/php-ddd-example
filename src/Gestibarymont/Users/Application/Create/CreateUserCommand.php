<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Application\Create;

use CodelyTv\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    public function __construct(private string $id, private string $name, private string $password)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function password(): string
    {
        return $this->password;
    }
}
