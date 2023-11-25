<?php 
namespace app\source\db;
use PDO;
use PDOException;

/**
 * Class MySQLConnection
 *
 * This class is responsible for establishing and managing a connection to a MySQL database.
 * It implements the DBConnection interface.
 */
class MySQLConnection  extends BaseDBConnection implements DBConnection
{
    /**
     * Establishes a connection to the database.
     *
     * @return PDO|null The PDO connection object if successful, null otherwise.
     */
    public function getConnection()
    {
        $this->connection = null;
        try {
            $this->connection = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->connection;
    }
}

?>