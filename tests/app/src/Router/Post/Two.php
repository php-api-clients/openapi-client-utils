<?php

declare (strict_types=1);
namespace ApiClients\Client\PetStore\Router\Post;

use ApiClients\Client\PetStore\Error as ErrorSchemas;
use ApiClients\Client\PetStore\Hydrator;
use ApiClients\Client\PetStore\Operation;
use ApiClients\Client\PetStore\Operator;
use ApiClients\Client\PetStore\Schema;
use ApiClients\Client\PetStore\WebHook;
use ApiClients\Client\PetStore\Router;
use League\OpenAPIValidation;
use React\Http;
use ApiClients\Contracts;
final class Two
{
    private array $router = array();
    public function __construct(private \League\OpenAPIValidation\Schema\SchemaValidator $requestSchemaValidator, private \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, private \ApiClients\Client\PetStore\Hydrators $hydrators, private \React\Http\Browser $browser, private \ApiClients\Contracts\HTTP\Headers\AuthenticationInterface $authentication)
    {
    }
    /**
     * @return array{code: int}
     */
    public function call(string $call, array $params, array $pathChunks) : array
    {
        $matched = false;
        if ($pathChunks[0] == '') {
            if ($pathChunks[1] == 'pets') {
                if ($call == 'POST /pets') {
                    $matched = true;
                    if (\array_key_exists(Router\Post\Pets::class, $this->router) == false) {
                        $this->router[Router\Post\Pets::class] = new Router\Post\Pets($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators, $this->browser, $this->authentication);
                    }
                    return $this->router[Router\Post\Pets::class]->Create($params);
                }
            }
        }
        if ($matched === false) {
            throw new \InvalidArgumentException();
        }
    }
}
