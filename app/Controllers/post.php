<?php
$title = "Posts";

$post = $db->query('SELECT * FROM posts WHERE id = :id', [
    'id' => $_GET['id'] ?? null,
])->firstOrFail();

/* echo '<pre>';
var_dump($post);
die(); */

require __DIR__ . '/../../resources/post.template.php';
