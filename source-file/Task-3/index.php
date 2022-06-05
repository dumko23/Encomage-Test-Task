<?php

namespace App;

require __DIR__ . '/../../vendor/autoload.php';

$posts = new Posts();



foreach ($posts->showPosts() as $post) {
    echo "<li> <span>post id: {$post['postId']}</span>
            <h4>user: {$post['userName']}</h4>
            <p>Text: {$post['text']}</p>
            <span>date: {$post['date']}</span>
            </li>
            ";
}



