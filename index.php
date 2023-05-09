<?php
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'Skkelewu0098*');
$stmt = $pdo->query('SELECT * FROM entries ORDER BY created_at DESC');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Guestbook</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Guestbook</h1>
    <a href="create.php">Create new entry</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Created at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch()) : ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['message'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <a class="edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                        |
                        <a class="delete" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>

</html>