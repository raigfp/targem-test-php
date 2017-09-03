<?php
require_once('db.php');

try {
    $db = get_db();

    $stmt = $db->prepare("
        SELECT nickname, email, registered, online
        FROM players
        WHERE online = true
        ORDER BY registered
    ");

    $stmt->execute();
    $players = $stmt->fetchAll(PDO::FETCH_CLASS);
    foreach ($players as $player) {
        $date = new DateTime();
        $date->setTimestamp($player->registered);
        $player->registered = $date->format('j.n.Y G:i');

        $player->online = $player->online ? 'On' : 'Off';
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

require('./views/index.php');
?>
