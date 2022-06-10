<?php

namespace App\source\controllers;

use PDO;

return [
    'database' => [
        'user' => 'root',
        'password' => 'password',
        'name' => 'mysql:host=mysql;port:3306;',
        'db' => 'MemberList',
        'options' => [
            PDO::ATTR_DEFAULT_FETCH_MODE => 2
        ]
    ],
    'shareMessage' => [
        'message' => 'Check out this Meetup with SoCal AngularJS!'
    ],
    'routes' => [
        '' => 'source/controllers/main.php',
        'task-1' => 'source/controllers/task-1.php',
        'task-2' => 'source/controllers/task-2.php',
        'task-3' => 'source/controllers/task-3.php',
        'postList' => 'source/controllers/postList.php',
        'addComment' => 'source/controllers/addComment.php'
    ]
];