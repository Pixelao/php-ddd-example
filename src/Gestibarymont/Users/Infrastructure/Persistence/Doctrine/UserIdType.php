<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Infrastructure\Persistence\Doctrine;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class UserIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return UserId::class;
    }
}
