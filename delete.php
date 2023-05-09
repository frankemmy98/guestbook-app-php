<?php
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'Skkelewu0098*');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('DELETE FROM entries WHERE id = :id');
    $stmt->execute([':id' => $_POST['id']]);
    header('Location: index.php');
    exit;
} else {
    $stmt = $pdo->prepare('SELECT * FROM entries WHERE id = :id');
    $stmt->execute([':id' => $_GET['id']]);
    $entry = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete entry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Delete entry</h1>
    <p>Are you sure you want to delete this entry?</p>
    <form method="post">
        <input type="hidden" name="id" value="<?= $entry['id'] ?>">
        <button type="submit">Yes</button>
        <a href="index.php">No</a>
    </form>
</body>

</html>