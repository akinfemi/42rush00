<?php

function dbconnect()
{
    static $conn;
    if (!isset($conn)) {
        $config = parse_ini_file('../config.ini');
        $conn = mysqli_connect('localhost', $config['username'], $config['password']);
    }
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>