<?php

$query = require 'core/bootstrap.php';

use App\Core\App;

$articles = App::get('database')->selectAll('articles_film');

require 'app/views/film.view.php';
