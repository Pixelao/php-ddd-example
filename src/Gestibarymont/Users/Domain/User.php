<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    public function __construct(private UserId $id, private UserName $name, private UserPassword $password)
    {
    }

    public static function create(UserId $id, UserName $name, UserPassword $password): self
    {
        $user = new self($id, $name, $password);

        $user->record(new UserCreatedDomainEvent($id->value(), $name->value(), $password->value()));

        return $user;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function rename(UserName $newName): void
    {
        $this->name = $newName;
    }
}
