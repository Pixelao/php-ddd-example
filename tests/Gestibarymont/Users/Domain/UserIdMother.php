<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Tests\Shared\Domain\UuidMother;

final class UserIdMother
{
    public static function create(?string $value = null): UserId
    {
        return new UserId($value ?? UuidMother::create());
    }
}
