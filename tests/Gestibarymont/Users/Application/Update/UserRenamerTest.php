<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Application\Update;

use CodelyTv\Gestibarymont\Users\Application\Update\UserRenamer;
use CodelyTv\Gestibarymont\Users\Domain\UserNotExist;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserIdMother;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserMother;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserNameMother;
use CodelyTv\Tests\Gestibarymont\Users\UsersModuleUnitTestCase;
use CodelyTv\Tests\Shared\Domain\DuplicatorMother;

final class UserRenamerTest extends UsersModuleUnitTestCase
{
    private UserRenamer|null $renamer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->renamer = new UserRenamer($this->repository(), $this->eventBus());
    }

    /** @test */
    public function it_should_rename_an_existing_user(): void
    {
        $user = UserMother::create();
        $newName = UserNameMother::create();
        $renamedUser = DuplicatorMother::with($user, ['name' => $newName]);

        $this->shouldSearch($user->id(), $user);
        $this->shouldSave($renamedUser);
        $this->shouldNotPublishDomainEvent();

        $this->renamer->__invoke($user->id(), $newName);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_user_not_exist(): void
    {
        $this->expectException(UserNotExist::class);

        $id = UserIdMother::create();

        $this->shouldSearch($id, null);

        $this->renamer->__invoke($id, UserNameMother::create());
    }
}
