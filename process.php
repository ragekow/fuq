<?php
session_start(); // Start or resume a session

require 'db.php'; // Include the database connection

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['pasteTitle']);
    $content = trim($_POST['pasteContent']);
    $user_id = $_SESSION['id']; // Get the user id from the session

    if (!empty($title) && !empty($content)) {
        // Update SQL to include user_id in the INSERT statement
        $sql = "INSERT INTO pastes (title, content, user_id) VALUES (:title, :content, :user_id)";
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':user_id', $user_id); // Bind user_id
        
        if($stmt->execute()) {
            $last_id = $pdo->lastInsertId();
            // Redirect to view.php with the id of the newly created pastebin
            header("Location: view.php?id=$last_id");
            exit;
        }
    } else {
        // Redirect back to index.php if title or content is empty
        header("Location: index.php");
        exit;
    }
}
?>
