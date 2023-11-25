<?php 
namespace app\source\http;

use Symfony\Component\HttpFoundation\Request;

class RequestHandler {

    private $request;

    public function __construct() {
        $this->setRequest(Request::createFromGlobals());
    }

    public function getGetParram($name) {
       return $this->getRequest()->query->get($name);
    }

    public function getContent() {
        if($this->isJson($this->request->getContent())){
            return $this->request->toArray();
        }
    }

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
