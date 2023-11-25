
<?php
date_default_timezone_set('Asia/Tel_Aviv');
$config = require_once 'config/config.php';
$name = 'test';
// MySQL database credentials
$name = 'test';
$host = $config['components']['db']['host'];   
$db_name = $config['components']['db']['db_name'];   
$username = $config['components']['db']['username'];
$password = $config['components']['db']['password'];

$dsn = "mysql:host={$host};dbname={$db_name}";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);

} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}

function findTask($pdo){
    $query = $pdo->prepare("select * from task");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
      // $row['time_to_run'] = new DateTime($row['time_to_run']); 
      if($row['time_to_run'] == date('Y-m-d H:i')){
        addTicket($pdo, $row['code']);
        deleteTask($pdo, $row['id']);
      }
    }
}

function addTicket($pdo, $name){
       // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Example: Perform a query (select version of MySQL)
    $query = $pdo->prepare("INSERT INTO ticket (name, created_at) VALUES (:name, :created_at)");
    $query->execute([
        'name' => $name,
        'created_at' => date('Y-m-d H:i:s'),
    ]);
}

function deleteTask($pdo, $id){
    $query = $pdo->prepare("DELETE FROM task WHERE id = :id");
    $query->execute([
        'id' => $id,
    ]);
}


findTask($pdo);