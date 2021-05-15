<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Gestibarymont\Users\Application\Create;

use CodelyTv\Gestibarymont\Users\Application\Create\UserCreator;
use CodelyTv\Gestibarymont\Users\Application\Create\CreateUserCommandHandler;
use CodelyTv\Tests\Gestibarymont\Users\UsersModuleUnitTestCase;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserCreatedDomainEventMother;
use CodelyTv\Tests\Gestibarymont\Users\Domain\UserMother;

final class CreateUserCommandHandlerTest extends UsersModuleUnitTestCase
{
    private CreateUserCommandHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateUserCommandHandler(new UserCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $command = CreateUserCommandMother::create();

        $user      = UserMother::fromRequest($command);
        $domainEvent = UserCreatedDomainEventMother::fromUser($user);

        $this->shouldSave($user);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
