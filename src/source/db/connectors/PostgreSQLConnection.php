<?php 
namespace app\source\db\connectors;
use PDO;
use PDOException;
use app\source\db\BaseDBConnectionInterface;
use app\source\db\DBConnectionInterface;

/**
 * Class PostgreSQLConnection
 *
 * This class is responsible for establishing and managing a connection to a PostgreSQL database.
 * It extends the BaseDBConnectionInterface class and implements the DBConnectionInterface interface.
 */
class PostgreSQLConnection  extends BaseDBConnectionInterface implements DBConnectionInterface
{
    /**
     * Establishes a connection to the PostgreSQL database.
     *
     * @return PDO|null The PDO connection object if successful, null otherwise.
     */
    public function getConnection()
    {
        $this->connection = null;

        try {
            $this->connection = new PDO(
                'pssql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

    }
}

?>