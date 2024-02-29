<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Fast Upload Query</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
    <nav class="bg-black p-4">
        <div class="container mx-auto flex justify-between items-center text-white">
            <a href="/" class="text-xl font-bold text-green-500">Fuq</a>
            <div class="nav-links flex">
            <div>
                <a href="login.php" class="px-4 py-2 rounded hover:bg-gray-700">Login</a>
                <!-- Adjust or add more navigation links as necessary -->
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <form action="register_process.php" method="post" class="max-w-xl mx-auto py-8 px-4 border rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Register</h2>
            <div class="mb-4">
                <label for="username" class="block font-medium">Username:</label>
                <input type="text" id="username" name="username" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block font-medium">Password:</label>
                <input type="password" id="password" name="password" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="code_phrase" class="block font-medium">Code Phrase:</label>
                <input type="text" id="code_phrase" name="code_phrase" required class="w-full p-2 border rounded" placeholder="Enter the secret code phrase">
            </div>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Register</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        © <?= date("Y") ?> Fast Upload Query. All rights reserved.
    </footer>

</body>
</html>
