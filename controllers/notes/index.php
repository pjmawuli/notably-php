<?php

$config = require base_path('config.php');
$db = new Database($config);

$notes = $db->query('select * from notes where user_id = :id', [
    'id' => 2
])->fetchAll();
view('notes/index.view.php', [
    'banner_title' => 'Notes',
    'notes' => $notes
]);
