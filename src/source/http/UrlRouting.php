<?php
namespace app\source\http;

use app\source\http\Url;

class UrlRouting  extends Url{

    const CONTROLLER_NAMESPACE = 'app\controllers\\';

    public function __construct() {
        parent::__construct($_SERVER);     
    }

    public function getController() {
        $url = $this->getPath();
        $url = explode('/', ltrim( $url, '/'));
  
        if($url[0]){
            return [ 
                'controller' => self::getControllerName($url[0]), 
                'method'     => self::getMethodName ( $url[1] ? $url[1] :  'index') 
            ];
        }
        else{
            return [ 
                'controller' =>  self::getControllerName()	, 
                'method'     => self::getMethodName()
            ];
        }
        
    }

    private function getControllerName($url = null) {
        return self::CONTROLLER_NAMESPACE . ( $url ? ucfirst($url) : 'Default' ). 'Controller';
    }

    private function getMethodName($url = null) {
        return 'action' . ( $url ? ucfirst($url) : 'Index' );
    }
}
