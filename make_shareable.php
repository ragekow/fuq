function generateUniqueToken($pdo) {
    do {
        $token = bin2hex(random_bytes(16)); // Generates a random token
        // Check if the token already exists in the database
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM pastes WHERE share_token = ?");
        $stmt->execute([$token]);
        $count = $stmt->fetchColumn();
    } while ($count > 0); // Repeat if the token already exists

    return $token;
}
