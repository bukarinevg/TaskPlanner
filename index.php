<?php 
require_once 'vendor/autoload.php';
$config = require 'config/config.php';


(new app\source\App($config))->run();


