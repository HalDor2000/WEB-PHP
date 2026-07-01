<?php

class AboutController
{
    public function index()
    {
        $title = "Acerca de mi";

        require __DIR__ . '/../../resources/about.template.php';
    }
}
