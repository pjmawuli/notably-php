<?php

use core\Database;
use core\Validator;

// Initializing the database
$config = require base_path('config.php');
$db = new Database($config);

$errors = [];
$body = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];

    if (!Validator::string($body, 1, 100)) {
        $errors['body'] = 'You need a body of at least 1000 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $body,
            'user_id' => 2
        ]);
    }
}

view('notes/create.view.php', [
    'banner_title' => 'Create a note',
    'body' => $body,
    'errors' => $errors
]);
