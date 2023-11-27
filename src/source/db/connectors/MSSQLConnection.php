<?php 
namespace app\source\db\connectors;
use PDO;
use PDOException;
use app\source\db\BaseDBConnectionInterface;
use app\source\db\DBConnectionInterface;

/**
 * Class MSSQLConnection
 *
 * This class is responsible for establishing and managing a connection to a Microsoft SQL Server database.
 * It extends the BaseDBConnectionInterface class and implements the DBConnectionInterface interface.
 */
class MSSQLConnection extends BaseDBConnectionInterface implements DBConnectionInterface
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
                'sqlsrv:Server=' . $this->host . ';Database=' . $this->db_name,
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