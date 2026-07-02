<?php
namespace App\Controllers;
use Framework\Database;


class PostController
{
    public function show()
    {
        $title = "Posts";
        $db = new Database();

        $post = $db->query('SELECT * FROM posts WHERE id = :id', [
            'id' => $_GET['id'] ?? null,
        ])->firstOrFail();

        require __DIR__ . '/../../resources/post.template.php';
    }
}
