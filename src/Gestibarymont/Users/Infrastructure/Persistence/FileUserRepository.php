<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Infrastructure\Persistence;

use CodelyTv\Gestibarymont\Shared\Domain\Users\UserId;
use CodelyTv\Gestibarymont\Users\Domain\User;
use CodelyTv\Gestibarymont\Users\Domain\UserRepository;

final class FileUserRepository implements UserRepository
{
    private const FILE_PATH = __DIR__.'/users';

    public function save(User $user): void
    {
        file_put_contents($this->fileName($user->id()->value()), serialize($user));
    }

    public function search(UserId $id): ?User
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}
