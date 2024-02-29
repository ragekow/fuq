<?php
session_start();
// Redirect logic here if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Fast Upload Query</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
    <nav class="bg-black p-4">
        <div class="container mx-auto flex justify-between items-center text-white">
            <a href="/" class="text-xl font-bold text-green-500">Fuq</a>
            <div class="nav-links flex">
            <!-- Adjust nav links as per page context -->
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Login</h1>
        <form action="login_process.php" method="post" class="mt-4">
            <div class="mb-4">
                <label for="username" class="block">Username:</label>
                <input type="text" id="username" name="username" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block">Password:</label>
                <input type="password" id="password" name="password" required class="w-full p-2 border rounded">
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Login</button>
            </div>
        </form>
        <p class="mt-4">Don't have an account? <a href="register.php" class="text-blue-500 hover:underline">Register</a></p>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        © <?= date("Y") ?> Fast Upload Query. All rights reserved.
    </footer>

</body>
</html>
