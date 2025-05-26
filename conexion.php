<?php
$host = "localhost";
$user = "root";
$pass = "S1ST3NFDS-";
$db = "empleados_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}