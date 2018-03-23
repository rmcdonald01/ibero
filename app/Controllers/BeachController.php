<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Helpers\Telnet\TelnetClient;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

use Exception;

class BeachController extends Controller
{
    
    public function index(Request $request, Response $response, $args)
    {
        return $this->c->view->render($response, 'ap/beach/index.twig', [
            'appName' => $this->c->settings['app']['name'],
        ]);
    }

    public function reboot(Request $request, Response $response)
    {
        
       $ip =  $request->getParam('ip');
       $client = new TelnetClient;
      
       if( @$client->ping($ip)){
           try {
            $client->connect($ip);
            $client->login($username='admin', $password='1ber0w1f1');
           }catch(Exception $e){
            return $response->withJson(['message' => $e->getMessage(), 'ip' => $ip]);
           }
        
       }else {
        return $response->withJson(['message' => 'not online', 'ip' => $ip]);
       }


        var_dump($return);
    }
}