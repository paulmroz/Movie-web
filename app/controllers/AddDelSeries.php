<?php

require 'core/bootstrap.php';

use App\Core\App;

if(isset($_POST['delete'])) {

    App::get('database')->delete('articles');

    header('Location: series');

}

if(isset($_POST['add'])) {

    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image'])) {
        App::get('database')->insert('articles', [

            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => $_POST['image']

        ]);

        header('Location: series');

    }

    throw new Exception('Nie podano wartości');
}



