<?php

use core\Database;

$banner_title = 'Notes';

$config = require base_path('config.php');
$db = new Database($config);

$current_id = 2;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $note = $db->query('select * from notes where id=:id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $current_id);

    $db->query('delete from notes where id=:id', [
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    exit();
} else {

    $note = $db->query('select * from notes where id=:id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $current_id);
}

view('notes/show.view.php', [
    'banner_title' => 'Notes',
    'note' => $note
]);
