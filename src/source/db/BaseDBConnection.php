<?php
namespace app\source\db;
/**
 * Class BaseDBConnection
 *
 * This abstract class provides a base for establishing and managing a connection to a database.
 * It defines common properties and a constructor that are shared by all database connection classes.
 */
abstract class BaseDBConnection {
    /**
     * @var string $host The hostname of the database server.
     */
    protected $host;
    
    /**
     * @var string $db_name The name of the database.
     */
    protected $db_name;
    
    /**
     * @var string $username The username used to connect to the database.
     */
    protected $username;

    /**
     * @var string $password The password used to connect to the database.
     */
    protected $password;
    
    /**
     * @var PDO $connection The PDO connection object.
     */
    protected $connection;

    /**
     * BaseDBConnection constructor.
     *
     * @param array $config The configuration array containing host, database name, username, and password.
     */
    public function __construct($config)
    {
        $this->host = $config['host'];
        $this->db_name = $config['db_name'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }
}
?>