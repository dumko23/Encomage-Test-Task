<?php

namespace App;

class Comments
{
    private array $commentsList = [];

    function addComment(string $userName, string $text, float $rating)
    {
        PDOAdapter::insertToDB($userName, $text);
    }

    public function fetchComments()
    {
        $this->postList = PDOAdapter::getFromDB();
    }

    public function showComments()
    {
        PDOAdapter::db();
        $this->fetchPosts();
        return $this->postList;
    }

}