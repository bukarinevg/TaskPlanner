<?php
namespace app\source;


use app\source\http\RequestHandler;
use app\source\http\UrlRouting;

/**
 * This is the main application class.
 */
readonly class App
{
    /**
     * @var array $config The application configuration.
     */

    /**
     * @var mixed $request The request object.
     */
    private RequestHandler $request;

    /**
     * App constructor.
     *
     * @param array $config The configuration options for the App.
     */
    function __construct(#[SensitiveParameter] private array $config){}

    /**
     * Runs the application.
     */
    public function run()
    {
        $this->setRequest(new RequestHandler());
        $this->callController((new UrlRouting())->getController() );        
    }

    /**
     * Calls the controller and method from the URL.
     *
     * @param array $route An array containing the controller and method.
     */
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
     * Get the value of request
     */ 
    public function getRequest(): RequestHandler
    {
        return $this->request;
    }

    /**
     * Set the value of request
     *
     * Handles the request.
     * @return  void
     */ 
    public function setRequest(RequestHandler $requestHandler): void
    {
        $this->request = $requestHandler;

    }
}
