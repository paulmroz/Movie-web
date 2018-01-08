<?php

$router->get('', 'app/controllers/index.php');
$router->get('index', 'app/controllers/index.php');
$router->get('film', 'app/controllers/film.php');
$router->get('series', 'app/controllers/series.php');
$router->get('loggin', 'app/controllers/loggin.php');
$router->get('register', 'app/controllers/register.php');

$router->post('movieController', 'app/controllers/AddDelMovie.php');
$router->post('seriesController', 'app/controllers/AddDelSeries.php');

