<?php
// This creates a connection to the birdsdb database; it also sets the encoding to utf-8<?php
DEFINE ('DB_USER', 'admin');
DEFINE ('DB_PASSWORD', 'admin');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'ToDo');
// Make the connection
$conn = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
// Set the encoding
mysqli_set_charset($dbcon, 'utf8');
?>