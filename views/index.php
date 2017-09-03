<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Test</title>
</head>
<body>
<form action="/import.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="data">
    <button>Import</button>
</form>
<br>

<?php if (count($players)) { ?>
<table border="1">
    <?php foreach ($players as $player) { ?>
        <tr>
        <?php foreach ($player as $prop) { ?>
            <td><?= $prop ?></td>
        <?php } ?>
        </tr>
    <?php } ?>
</table>
<?php } ?>
</body>
</html>
