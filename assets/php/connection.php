<?php

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "smartmind";

// Create database connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
} 
else {
  echo "";
}
