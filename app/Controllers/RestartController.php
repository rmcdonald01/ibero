<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};
use App\Controllers\Traits\TelnetClient;

class RestartController extends Controller
{
    
    public function index(Request $request, Response $response, $args)
    {
        return $this->c->view->render($response, 'ap/index.twig', [
            'appName' => $this->c->settings['app']['name'],
        ]);
    }

    public function reboot(Request $request, Response $response)
    {
        $ip =  $request->getParam('ip');
       $client = new TelnetClient;
       $client->ping();
       $client->connect();
       $client->login($username, $password);

        var_dump($return);
    }
}