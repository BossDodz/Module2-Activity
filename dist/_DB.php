<?php
$student_server_name = "localhost";
$username = "root";
$password = "";
$db_name = "Students";

// Establish Connection
$serv_conn = new mysqli($student_server_name, $username, $password, $db_name);

// Check Connection
if ($serv_conn->connect_error) {
    die("Connection failed: " . $serv_conn->connect_error);
}
