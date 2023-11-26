
<?php
require_once 'vendor/autoload.php';

use app\source\db\DataBase;

$config = require_once 'config/config.php';
$pdo =  (new DataBase($config['components']['db']))->db;

/**
 * Finds active a task in the database.
 *
 * @param PDO $pdo The PDO object representing the database connection.
 * @return mixed The task data if found, or false if not found.
 */
function findTask($pdo){
    $query = $pdo->prepare("select * from task");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
      if($row['time_to_run'] == date('Y-m-d H:i')){
        addTicket($pdo, $row['code']);
        deleteTask($pdo, $row['id']);
      }
    }
}


/**
 * Deletes a task from the database.
 *
 * @param PDO $pdo The PDO object representing the database connection.
 * @param int $id The ID of the task to be deleted.
 * @return void
 */
function deleteTask($pdo, $id){
    $query = $pdo->prepare("DELETE FROM task WHERE id = :id");
    $query->execute([
        'id' => $id,
    ]);
}


/**
 * Adds a ticket to the database.
 *
 * @param PDO $pdo The PDO object representing the database connection.
 * @param string $name The name of the ticket.
 * @return void
 */
function addTicket($pdo, $name){
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $pdo->prepare("INSERT INTO ticket (name, created_at) VALUES (:name, :created_at)");
    $query->execute([
        'name' => $name,
        'created_at' => date('Y-m-d H:i:s'),
    ]);
}




findTask($pdo);