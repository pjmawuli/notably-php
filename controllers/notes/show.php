<?php

$banner_title = 'Notes';

$config = require base_path('config.php');
$db = new Database($config);

$current_id = 2;

$note = $db->query('select * from notes where id=:id', [
    'id' => $_GET['id']
])->findOrFail();

if ($note['user_id'] !== $current_id) {
    abort(Response::FORBIDDEN);
    die();
}

view('notes/show.view.php', [
    'banner_title' => 'Notes',
    'note' => $note
]);
