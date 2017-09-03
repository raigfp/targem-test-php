<?php
function get_db() {
    $servername = "localhost";
    $username = "user";
    $password = "user";
    $db_name = "test";

    $db = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
