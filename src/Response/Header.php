<?php

declare(strict_types=1);

namespace ApiClients\Tools\OpenApiClient\Utils\Response;

final readonly class Header
{
    public function __construct(
        public string $name,
        public mixed $value,
    ) {
    }
}
