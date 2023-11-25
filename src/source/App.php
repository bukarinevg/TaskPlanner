<?php
namespace app\source;

use app\source\db\DataBase;
use app\source\http\RequestHandler;
use app\source\http\UrlRouting;

class App
{
    private $config;
    private $db;
    private $request;

    function __construct($config )
    {
        $this->config = $config;
        
    }


    public function run()
    {
        $this->setDb(new DataBase($this->config['components']['db'])); 
        $this->setRequest(new RequestHandler());
        $this->callController((new UrlRouting())->getController() );        
    }

    public function callController($route)
    {
        try {
            $controller =  $route['controller'];
            $method = $route['method'];

            if (!class_exists($controller)) {
                throw new \Exception("Controller $controller does not exist");
            }
            $controllerInstance = new $controller($this);
    
            if (!method_exists($controllerInstance, $method)) {
                throw new \Exception("Method $method does not exist in controller $controller");
            }
    
            $controllerInstance->$method();
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */ 
    public function setDb(DataBase $db)
    {
        $this->db = $db;

        return $this;
    }


    /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the value of request
     *
     * @return  self
     */ 
    public function setRequest(RequestHandler $requestHandler)
    {
        $this->request = $requestHandler;
        return $this;
    }
}
