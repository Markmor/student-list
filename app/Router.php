<?php

/**
 * Router
 */

class Router
{
    private $routes;
    
    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include $routesPath;
    }
    
    public function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])) {
            #return $_SERVER['REQUEST_URI'];
            return substr_replace($_SERVER['REQUEST_URI'], "", 0, 1);
        }
    }

    public function run()
    {
        $uri = $this->getURI();
        
        # Create action name from uri
        if (in_array($uri, $this->routes)) {
            $actionName = "action" . ucfirst($uri);
        } else {
            $actionName = "actionIndex";
        }
        
        $controllerObject = new SiteController();
        $result = call_user_func(array($controllerObject, $actionName));
        
    }
    
}

