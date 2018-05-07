<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class UserController
{
    private $logger;
    protected $table;

    public function __construct(
        LoggerInterface $logger,
        Builder $table
    ) {

        $this->logger = $logger;
        $this->table = $table;
    }

    public function index(Request $request, Response $response, $args)
    {

        $users = $this->table->get();

        $result = $response->withJson($users, 200);

        return $result;
    }
}