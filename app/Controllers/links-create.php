<?php
$title = 'Registrar proyecto';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $description = $_POST['description'] ?? '';

    $errors = [];

    if (empty($title)) {
        $errors[] = 'El titulo es obligatorio';
    }

    if (empty($url)) {
        $errors[] = 'La URL es obligatoria';
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = 'La URL no es valida';
    }

    if (empty($description)) {
        $errors[] = 'La descripcion es obligatorio';
    }

    if (empty($errors)) {
        $db->query(
            'INSERT INTO links (title, url, description) VALUES (:title, :url, :description)',
            [
                'title' => $title,
                'url' => $url,
                'description' => $description,
            ]
        );
        header('location: /links');
        exit;
    }
}

require __DIR__ . '/../../resources/links-create.template.php';
