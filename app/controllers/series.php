<?php
$query = require'core/bootstrap.php';

use App\Core\App;

$articles = App::get('database')->selectAll('articles');

require 'app/views/series.view.php';
