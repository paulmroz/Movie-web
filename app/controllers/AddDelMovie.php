<?php

require 'core/bootstrap.php';

use App\Core\App;

if(isset($_POST['delete'])) {

    App::get('database')->delete('articles_film');

    header('Location: film');

}

if(isset($_POST['add'])) {

    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image']))
    {
        App::get('database')->insert('articles_film', [

            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => $_POST['image']

        ]);

        header('Location: film');

    }

    throw new Exception('Nie podano wartości');

}






