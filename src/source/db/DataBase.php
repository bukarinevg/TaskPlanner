<?php
namespace app\source\db;

use app\source\db\connectors\MySQLConnection;
use app\source\db\connectors\PostgreSQLConnection;
use app\source\db\connectors\MSSQLConnection;
/**
 * Class DataBase
 *
 * This class is responsible for establishing a connection to a database based on the provided configuration.
 * It supports multiple database drivers.
 */
class DataBase  {

    use QueryBuilderTrait {
		insert as traitInsert;
	}
    /**
     * @var array $config The configuration array containing the database connection details.
     */
    private $config;
    /**
     * @var DBConnectionInterface $db The database connection object.
     */
    public $db;

    /**
     * DataBase constructor.
     *
     * @param array $config The configuration array containing the database connection details.
     */
    public function __construct($config) {
        $this->config = $config;
        $this->connect();
        
    }
    
    public function insert($table, $columns, $requestDictionary){
        $query = $this->traitInsert($table , $columns);
        $query = $this->db->prepare($query);
        $query->execute($requestDictionary);

    } 

    /**
     * Establishes a connection to the database based on the provided configuration.
     */
    private function connect() {
        $driver = $this->config['driver'];

        switch ($driver) {
            case 'mysql':
                $connection = new MySQLConnection($this->config);
                break;
            case 'pgsql':
                $connection = new PostgreSQLConnection($this->config);
                break;
            case 'sqlite':
                $connection = new MSSQLConnection($this->config);
                break;
            // Add more cases for other supported drivers

            default:
                throw new \Exception("Unsupported driver: $driver");
        }
        $this->setDataBaseConnection($connection);
    }

    /**
     * Sets the database connection object.
     *
     * @param DBConnectionInterface $DBConnectionInterface The database connection object.
     */
    private function setDataBaseConnection(DBConnectionInterface $DBConnectionInterface) {
        $this->db = $DBConnectionInterface->getConnection();
    }

}
  
