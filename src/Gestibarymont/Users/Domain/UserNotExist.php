<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Domain\DomainError;

final class UserNotExist extends DomainError
{
    public function __construct(private UserId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The user <%s> does not exist', $this->id->value());
    }
}
