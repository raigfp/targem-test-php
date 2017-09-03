<?php
require_once('db.php');
$db = get_db();

function parse_online($status) {
    switch($status) {
        case 'On':
            return true;
        case 'Off':
            return false;
        default:
            return null;
    }
};

$csvFile = file($_FILES['data']['tmp_name']);
$players = [];
foreach ($csvFile as $line) {
    $players[] = str_getcsv($line, ";");
}

array_shift($players);
foreach ($players as $player) {
    $nickname = trim($player[0]);
    $email = trim($player[1]);
    $date = trim($player[2]);
    $status = trim($player[3]);

    $timestamp = date_timestamp_get(date_create_from_format('j.n.Y G:i', $date));
    $online = parse_online($status);

    try {
        $stmt = $db->prepare("
            INSERT INTO players(nickname, email, registered, online)
            VALUES(:nickname, :email, :registered, :online)
        ");
        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':registered', $timestamp);
        $stmt->bindParam(':online', $online);
        $stmt->execute();

    } catch(PDOException $e) {
        // skip
    }
}

header('Location: /');
?>
