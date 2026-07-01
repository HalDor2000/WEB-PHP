<?php

class LinkController
{
    public function index()
    {

        $title = 'Proyectos';
        $db = new Database();

        $links = $db
            ->query('SELECT * FROM links ORDER BY id DESC')
            ->get();

        require __DIR__ . '/../../resources/links.template.php';
    }

    public function create()
    {
        $title = 'Registrar proyecto';
        require __DIR__ . '/../../resources/links-create.template.php';
    }

    public function store()
    {
        $validator = new Validator($_POST, [
            'title' => 'required|min:3|max:255',
            'url' => 'required|url|max:190',
            'description' => 'required|min:3|max:500',

        ]);


        if ($validator->passes()) {
            $db = new Database();
            $db->query(
                'INSERT INTO links (title, url, description) VALUES (:title, :url, :description)',
                [
                    'title'         => $_POST['title'],
                    'url'           => $_POST['url'],
                    'description'   => $_POST['description'],
                ]
            );
            header('location: /links');
            exit;
        }
        $errors = $validator->errors();
        $title = 'Registrar proyecto';
        require __DIR__ . '/../../resources/links-create.template.php';
    }

    public function destroy()
    {
        $db = new Database();

        $db->query('DELETE FROM links WHERE id = :id', [
            'id' => $_POST['id'] ?? null,
        ]);

        header('Location: /links');
        exit;
    }
}
