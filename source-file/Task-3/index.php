<?php

namespace App;

require __DIR__ . '/../../vendor/autoload.php';

$posts = new Posts();
print_r($posts->showPosts());

