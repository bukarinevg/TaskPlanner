<?php 
namespace app\source\db;
use PDO;
use PDOException;

/**
 * Class MSSQLConnection
 *
 * This class is responsible for establishing and managing a connection to a Microsoft SQL Server database.
 * It implements the DBConnection interface.
 */
class MSSQLConnection extends BaseDBConnection implements DBConnection
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
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->connection;
    }
}

?>