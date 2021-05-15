<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Domain;

use CodelyTv\Gestibarymont\Users\Domain\UserPassword;
use CodelyTv\Tests\Shared\Domain\IntegerMother;
use CodelyTv\Tests\Shared\Domain\RandomElementPicker;

final class UserPasswordMother
{
    public static function create(?string $value = null): UserPassword
    {
        return new UserPassword($value ?? self::random());
    }

    private static function random(): string
    {
        return sprintf(
            '%s %s',
            IntegerMother::lessThan(100),
            RandomElementPicker::from('months', 'years', 'days', 'hours', 'minutes', 'seconds')
        );
    }
}
