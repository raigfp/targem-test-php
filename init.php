<?php
require_once('db.php');

try {
    $db = get_db();

    $db->exec('DROP TABLE IF EXISTS players');

    $db->exec("CREATE TABLE players(
        id SERIAL PRIMARY KEY NOT NULL,
        nickname VARCHAR(255) NOT NULL UNIQUE,
        email VARCHAR(255) NOT NULL UNIQUE,
        registered INTEGER NOT NULL,
        online BOOLEAN NOT NULL
    )");
} catch(PDOException $e) {
    echo $e->getMessage();
}

header('Location: /');
