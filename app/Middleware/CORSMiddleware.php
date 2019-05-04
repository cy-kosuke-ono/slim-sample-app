<?php
namespace App\Middleware;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class CORSMiddleware
{
    /** @var string */
    protected $origin;

    public function __construct(string $origin = null)
    {
        $this->origin = $origin;
    }

    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $response = $next($request, $response);

        if (isset($this->origin)) {
            return $response
                ->withHeader('Access-Control-Allow-Origin', $this->origin)
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }
        return $response;
    }
}
