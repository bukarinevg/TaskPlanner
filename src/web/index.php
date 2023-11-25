<?php 
require_once '../../vendor/autoload.php';
$config = require_once '../../config/config.php';


// $job1 = new \Cron\Job\ShellJob();

// $db = new \app\source\DBConnection();

(new app\source\App($config))->run();


?>

