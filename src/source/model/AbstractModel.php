<?php 
namespace app\source\model;

use app\source\db\DataBase;

/**
 * This is an abstract class that serves as the base for all models.
 */
abstract class AbstractModel {
    protected $db;

    /**
     * Class AbstractModel
     * 
     * This class represents an abstract model.
     */
    public function __construct() {
        $config = require 'config/config.php';
        $this->db =  (new DataBase($config['components']['db']))->db;
    }

    // Other methods and properties...
}

