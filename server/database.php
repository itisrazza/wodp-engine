<?php

// Database Creds
$db_server   = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_database = "wodp";

// Database instances
$db_connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);

// Die if the database connection is bad
if (!$db_connection)
	die("Database connection failed. Check database.php and try again.");

// Continue with global SQL stuff
mysqli_set_charset($db_connection, 'utf8mb4'); // Used from http://stackoverflow.com/questions/279170/utf-8-all-the-way-through

?>