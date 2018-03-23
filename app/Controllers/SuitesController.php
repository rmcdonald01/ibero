<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Helpers\Telnet\TelnetClient;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

use Exception;

class SuitesController extends Controller
{
    
    protected $telnetClient;
    protected $c;
    public function __construct($c)
    {
        $this->telnetClient = new TelnetClient;
        $this->c = $c;
    }
    
    public function index(Request $request, Response $response, $args)
    {
        return $this->c->view->render($response, 'ap/suites/index.twig', [
            'appName' => $this->c->settings['app']['name'],
        ]);
    }

    public function reboot(Request $request, Response $response)
    {
        
       $ip =  $request->getParam('ip');
       //$client = new TelnetClient;
      
       if( @$this->telnetClient->ping($ip)){
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

    public function pingAp(Request $request, Response $response )
    {
        echo $result = $this->telnetClient->ping('127.0.0.1');
        var_dump(_);
    }
}