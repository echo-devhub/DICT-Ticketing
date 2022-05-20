<?php

#app name
define('APP_NAME', 'MISS SUPPORT CENTER');


#database server configuration
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'ticketing_db');

define('EMAIL', '');

# paths 
include __DIR__ . '/paths.php';

#boostraper
include __DIR__ . '/../src/bootstrap.php';
