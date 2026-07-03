<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl flex h-16 items-center justify-center">
        <div class="flex gap-4">
            <a href="/"         class="<?= requestIs('/') ?>        rounded-md px-3 py-2 text-sm font-medium">Inicio</a>
            <a href="/about"    class="<?= requestIs('/about') ?>   rounded-md px-3 py-2 text-sm font-medium">Acerca de</a>
            <a href="/links"    class="<?= requestIs('/links') ?>   rounded-md px-3 py-2 text-sm font-medium">Proyectos</a>
        </div>
    </div>
</nav>


<?php
//   var_dump($_SERVER['REQUEST_URI']);
// die();
?>