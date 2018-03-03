<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class RestartController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        return $this->c->view->render($response, 'ap/index.twig', [
            'appName' => $this->c->settings['app']['name'],
        ]);
    }
}