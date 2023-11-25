<?php 
namespace app\source\model;

abstract class AbstractModel {
    protected $db;

    public function __construct($app) {
        $this->db = $app->getDb();
    }

    // Other methods and properties...
}

