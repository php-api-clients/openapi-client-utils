<?php

declare(strict_types=1);

namespace ApiClients\Tools\OpenApiClient\Utils\Response;

use Jawira\CaseConverter\Convert;
use function array_map;
use function basename;
use function count;
use function dirname;
use function explode;
use function implode;
use function in_array;
use function str_replace;
use function strtolower;
use function trim;

final readonly class WithoutBody
{
    public function __construct(
        public int $code,
        /**
         * @var array<Header>
         */
        public array $headers,
    )
    {

    }
}
