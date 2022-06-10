<?php

namespace App\core;

class Posts
{
    private array $postList = [];
    private array $commentList = [];

    function addPost(string $userName, string $text)
    {
        PDOAdapter1::insertToDB($userName, $text);
    }

    public function ratePost(int $newRating, int $postId)
    {
        PDOAdapter1::ratePost($newRating, $postId);
    }

    function addComment($postId, string $userName, string $text){
        PDOAdapter1::insertToDBComments($postId, $userName, $text);
    }

    public function fetchPosts()
    {
        $this->postList = PDOAdapter1::getFromDB();
    }

    public function fetchComments($postId)
    {
        $this->commentList = PDOAdapter1::getFromDBComments($postId);
    }

    public function showPosts(): array
    {
        PDOAdapter1::db();
        $this->fetchPosts();
        return $this->postList;
    }

    public function showComments($postId): array
    {
        PDOAdapter1::db();
        $this->fetchComments($postId);
        return $this->commentList;
    }

}