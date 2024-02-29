<?php
require 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT title, content FROM pastes WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$paste = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $paste['title'] ?? 'Untitled';
$content = $paste['content'] ?? 'No content available.';
$lines = explode("\n", $content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Paste - Fast Upload Query</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
    <nav class="bg-black p-4">
        <div class="container mx-auto flex justify-between items-center text-white">
            <a href="/" class="text-xl font-bold text-green-500">Fuq</a>
            <div class="nav-links flex">
            <!-- You can add navigation links here -->
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($title); ?></h1>
        <div class="paste-container bg-gray-100 p-4 rounded">
            <?php foreach ($lines as $line): ?>
                <div class="line"><?php echo htmlspecialchars($line); ?></div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        © <?= date("Y") ?> Fast Upload Query. All rights reserved.
    </footer>
</body>
</html>
