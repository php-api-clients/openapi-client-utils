<?php

declare(strict_types=1);

namespace ApiClients\Tools\OpenApiClient\Utils\Response;

final readonly class WithoutBody
{
    public function __construct(
        public int $code,
        /** @var array<Header> */
        public array $headers,
    ) {
    }
}
