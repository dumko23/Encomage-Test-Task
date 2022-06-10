<?php

use App\PDOAdapter;
use App\core\Posts;


require __DIR__ . '/../../vendor/autoload.php';

$posts = new Posts();

if ($_POST) {
    $data = $_POST['data'];

    if ($data['userName'] && $data['text']) {
        $posts->addPost(
            $data['userName'],
            $data['text']
        );
    }
}
$postList = $posts->showPosts();
if (!empty($postList)) {



    foreach ($postList as $post) {
        $post['comments'] = $posts->showComments($post['postId']);

        if (count($post['comments']) !== 0){
            $html = '';
            foreach ($post['comments'] as $comment) {
                $html = $html . "<li class='flex' style='margin-left: 3rem'>
                <h3>Comment</h3>
            <div class='flex-div'>
                
                <h4>user: {$comment['userName']}</h4>
            </div>
            <p>Text: {$comment['text']}</p>
            <span style='text-align: end'>date: {$comment['date']}</span>
            </li>
            ";
                $post['commentsHtml'][0] = $html;
            }
        } else {
            $post['commentsHtml'][0] = 'no comments for this post';
        }
        echo "<li class='flex'>
                <h3>Post</h3>
            <div class='flex-div'>
                
                <h4>user: {$post['userName']}</h4>
                <button id='myCommentBtn{$post['postId']}' onclick='openModal({$post['postId']})'>Add Comment</button>
            </div>
            <p>Text: {$post['text']}</p>
            <span style='text-align: end'>date: {$post['date']}</span>
            </li>
            {$post['commentsHtml'][0]}
            ";
    }
}



