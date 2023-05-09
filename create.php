<?php
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'Skkelewu0098*');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('INSERT INTO entries (name, email, message) VALUES (:name, :email, :message)');
    $stmt->execute([
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':message' => $_POST['message'],
    ]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create entry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Create entry</h1>
    <form method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Save</button>
    </form>
</body>

</html>