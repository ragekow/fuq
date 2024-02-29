<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: login.php");
    exit;
}

// Include config file
require_once "db.php";

// Fetch pastebins created by the user
$user_id = $_SESSION["id"]; // Assuming your session stores user id
$sql = "SELECT id, title, content FROM pastes WHERE user_id = :user_id ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$pastebins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Fast Upload Query</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .content { display: none; }
    </style>
    <script>
        function showContent(id) {
            document.querySelectorAll('.content').forEach(function(content) {
                content.style.display = 'none';
            });
            document.getElementById('content-' + id).style.display = 'block';
        }
    </script>
</head>
<body class="bg-white text-gray-800">
    <nav class="bg-black p-4">
        <div class="container mx-auto flex justify-between items-center text-white">
            <a href="/" class="text-xl font-bold text-green-500">Fuq</a>
            <div class="nav-links flex">
                <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                    <a href="welcome.php" class="px-4 py-2 rounded hover:bg-gray-700">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                    <a href="logout.php" class="px-4 py-2 rounded hover:bg-gray-700">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="px-4 py-2 rounded hover:bg-gray-700">Login</a>
                    <a href="register.php" class="px-4 py-2 rounded hover:bg-gray-700">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 flex">
        <!-- Left Column -->
        <div class="w-[200px] flex-shrink-0">
            <h1 class="text-3xl font-bold mb-6">Your Fuq's</h1>
            <div class="grid grid-cols-1 gap-4">
                <?php if(empty($pastebins)): ?>
                    <p>You have not created any Fuqs yet.</p>
                <?php else: ?>
                    <?php foreach ($pastebins as $paste): ?>
                        <div class="bg-white p-4 rounded shadow">
                            <h2 class="font-bold text-xl"><?= htmlspecialchars($paste['title']) ?></h2>
                            <p><a href="javascript:void(0);" onclick="showContent(<?= $paste['id'] ?>)" class="text-blue-500 hover:underline">View Paste</a></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- Right Column -->
        <div class="flex-grow p-4 pr-4 overflow-hidden">
            <?php foreach ($pastebins as $paste): ?>
                <div id="content-<?= $paste['id'] ?>" class="hidden content bg-white p-4 rounded shadow">
                    <h2 class="font-bold text-xl"><?= htmlspecialchars($paste['title']) ?></h2>
                    <pre class="whitespace-pre-wrap overflow-x-auto"><?= htmlspecialchars($paste['content']) ?></pre>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        © <?= date("Y") ?> Fast Upload Query. All rights reserved.
    </footer>
</body>
</html>
