<?php require_once 'vendor/autoload.php';

use GO\Scheduler;
date_default_timezone_set('Asia/Tel_Aviv');
$scheduler = new Scheduler();
$scheduler->php('/var/www/html/script.php')->everyMinute();
$scheduler->run();

$scheduler = new Scheduler();
$scheduler
  ->raw("echo ".date('Y-m-d H:i')." >> /var/log/cron.log")
  ->everyMinute();
$scheduler->run();