<?php

use App\core\Posts;


require __DIR__ . '/../../vendor/autoload.php';

$comments = new Posts();

if ($_POST) {

    $data = $_POST;

    if ($data['postId']) {
        $comments->addComment(
            $data['postId'],
            $data['data']['userName'],
            $data['data']['text']
        );
    }
}