<?php
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'Skkelewu0098*');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('UPDATE entries SET name = :name, email = :email, message = :message WHERE id = :id');
    $stmt->execute([
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':message' => $_POST['message'],
    ]);
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
    <title>Edit entry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Edit entry</h1>
    <form method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $entry['name'] ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $entry['email'] ?>" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required><?= $entry['message'] ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?= $entry['id'] ?>">
        <button type="submit">Save</button>
    </form>
</body>

</html>