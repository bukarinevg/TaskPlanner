<?php 
namespace app\source\http;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequestHandler
 * 
 * This class handles HTTP requests.
 * Based on the Symfony HttpFoundation component.
 * PSR-7 compatible.
 */
class RequestHandler {

    /**
     * @var Request $request The request object.
     */
    private $request;

    /**
     * Constructor for the RequestHandler class.
     */
    public function __construct() {
        $this->setRequest(Request::createFromGlobals());
    }

    /**
     * Retrieves the value of a GET parameter by its name.
     *
     * @param string $name The name of the GET parameter.
     * @return mixed|null The value of the GET parameter if found, null otherwise.
     */
    public function getGetParram($name) {
       return $this->getRequest()->query->get($name);
    }

    /**
     * Retrieves the content from the request.
     *
     * @return mixed The content of the request.
     */
    public function getContent() {
        if($this->isJson($this->request->getContent())){
            return $this->request->toArray();
        }
    }

    /**
     * Checks if a given string is a valid JSON.
     *
     * @param string $string The string to be checked.
     * @return bool Returns true if the string is a valid JSON, false otherwise.
     */
    function isJson($string) {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
     }
    
    /**
     * Get the value of request
     * 
     * @return mixed The request .
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
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }
}
