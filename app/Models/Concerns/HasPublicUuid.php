<?php

namespace App\Models\Concerns;

use Ramsey\Uuid\Uuid;

trait HasPublicUuid
{
    public function initializeHasPublicUuid(): void
    {
        $uuid = $this->getAttribute('uuid');

        if (empty($uuid)) {
            $this->setAttribute('uuid', (string) Uuid::uuid7());
        }
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
