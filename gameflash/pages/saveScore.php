<?php
// your_backend_endpoint_for_saving_score.php

// Assuming you have a database connection established

// Receive data from the client
$data = json_decode(file_get_contents("php://input"));

// Extract data
$username = $data->username;
$score = $data->score;

// Perform database update
$sql = "UPDATE utilisateurs SET score = :score WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':score', $score, PDO::PARAM_INT);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Score saved successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save score']);
}
?>
