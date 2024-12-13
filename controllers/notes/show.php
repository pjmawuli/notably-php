<?php

use core\Database;

$banner_title = 'Notes';

$config = require base_path('config.php');
$db = new Database($config);

$current_id = 2;

$note = $db->query('select * from notes where id=:id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $current_id);

view('notes/show.view.php', [
    'banner_title' => 'Notes',
    'note' => $note
]);
