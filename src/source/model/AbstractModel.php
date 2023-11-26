<?php 
namespace app\source\model;

use app\source\db\DataBase;

abstract class AbstractModel {
    protected $db;

    public function __construct() {
        $config = require 'config/config.php';
        $this->db =  (new DataBase($config['components']['db']))->db;
    }

    // Other methods and properties...
}

