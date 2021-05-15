<?php

declare(strict_types=1);

namespace CodelyTv\Gestibarymont\Users\Domain;

use CodelyTv\Shared\Domain\Bus\Event\DomainEvent;

final class UserCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private string $name,
        private string $password,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'user.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['password'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'name'     => $this->name,
            'password' => $this->password,
        ];
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }
}
