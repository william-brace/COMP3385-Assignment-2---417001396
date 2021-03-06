<?php 

namespace Framework;

class FrontController extends FrontController_Abstract {

    private function __construct() {

    }

    public static function run() {
        $controller = new FrontController();
        $controller->init();
        $controller->handleRequest();

    }

    protected function init() {
        Validator::getInstance();
        SessionManager::getInstance();
    }

    protected function handleRequest() {

        $context = new CommandContext();
      
        $req = $context->get('get', 'controller');

        //echo $req;

        if (!$req) {
            $handler = RequestHandlerFactory::makeRequestHandler();
            //echo $req;
        }
        else 
        {
            $handler = RequestHandlerFactory::makeRequestHandler($req);//put $req inside brackets
        }

        

      
         //var_dump($context);
        //var_dump($newReq);
        //get request through url

        // $req = $context->get('controller');
        // echo $req;

        //$req = $_GET['controller'];
        
        if ($handler->execute($context) == false) {
            //do error handling
        }
    }

}