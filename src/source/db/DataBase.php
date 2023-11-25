<?php
namespace app\source\db;

/**
 * Class DataBase
 *
 * This class is responsible for establishing a connection to a database based on the provided configuration.
 * It supports multiple database drivers.
 */
class DataBase  {
    use QueryBuilder;

    /**
     * @var array $config The configuration array containing the database connection details.
     */
    private $config;
    /**
     * @var DBConnection $db The database connection object.
     */
    private $db;

    /**
     * DataBase constructor.
     *
     * @param array $config The configuration array containing the database connection details.
     */
    public function __construct($config) {
        $this->config = $config;
        $this->connect();
        
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
     * @param DBConnection $DBConnection The database connection object.
     */
    private function setDataBaseConnection(DBConnection $DBConnection) {
        $this->db = $DBConnection->getConnection();
    }


}
  
