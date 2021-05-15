<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Users\Domain\UserName;
use CodelyTv\Tests\Shared\Domain\WordMother;

final class UserNameMother
{
    public static function create(?string $value = null): UserName
    {
        return new UserName($value ?? WordMother::create());
    }
}
