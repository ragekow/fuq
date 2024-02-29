<?php
session_start();

require 'db.php'; // Assuming this is where your database connection is set up.

// Additional PHP code here if needed, such as handling form submissions.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fuq - Fast Upload Query</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
    <nav class="bg-black p-4">
        <div class="container mx-auto flex justify-between items-center text-white">
            <a href="/" class="text-xl font-bold text-green-500">Fuq</a>
            <div class="nav-links flex">
                <!-- Display username and link to welcome.php if logged in -->
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
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Create a New Fuq</h1>
        <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
            <!-- Paste submission form for logged-in users -->
            <form action="process.php" method="post" class="mt-4">
                <div class="mb-4">
                    <label for="pasteTitle" class="block">Title:</label>
                    <input type="text" id="pasteTitle" name="pasteTitle" required class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="pasteContent" class="block">Content:</label>
                    <textarea id="pasteContent" name="pasteContent" required class="w-full p-2 border rounded" rows="10"></textarea>
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Submit</button>
                </div>
            </form>
        <?php else: ?>
            <!-- Prompt for non-logged-in users -->
            <p>Please <a href="login.php" class="text-blue-500 hover:underline">login</a> or <a href="register.php" class="text-blue-500 hover:underline">register</a> to create a new paste.</p>
        <?php endif; ?>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        © <?= date("Y") ?> Fast Upload Query. All rights reserved.
    </footer>
</body>
</html>
