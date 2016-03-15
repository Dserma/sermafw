<?php

    namespace Config;
    
    use System\Router\Router;
    use System\Load\Load;

    class Routes{
        
        public function __construct() {
           
            $router  = new Router();
            
            $router->add('/', function() {
                 new Load('Main');
            });
            
            $router->add('/Users', function() {
                new Load('Users');
            });
            
            $router->add('/Users/.+', function($action) {
                new Load('Users', array( 'action' => $action ));
            });
            
            $router->add('/Users/.+/.+', function($action, $value) {
                new Load('Users', array( 'action' => $action, "value" => $value ));
            });
            
            
            $router->submit();
            
        }
       
        
    }
