<?php 
namespace app\source\model;



abstract class AbstractModel {
    protected $db;

    public function __construct($db) {
        
        $this->db = $db;
    }

    // Other methods and properties...
}

