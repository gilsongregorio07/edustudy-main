<?php

if (file_exists('../utils/env.php')) {
    include '../utils/env.php';
}
// If the first file doesn't exist, check if the second file exists and include it
elseif (file_exists('../../utils/env.php')) {
    include '../../utils/env.php';
}

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "edustudy_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

