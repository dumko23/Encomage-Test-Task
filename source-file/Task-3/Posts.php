<?php

namespace App;

class Posts
{
    private array $postList = [];

    function addPost(string $userName, string $text, float $rating)
    {
        PDOAdapter::insertToDB($userName, $text);
    }

    public function ratePost(int $newRating, int $postId)
    {
        PDOAdapter::ratePost($newRating, $postId);
    }

    public function fetchPosts()
    {
        $this->postList = PDOAdapter::getFromDB();
    }

    public function showPosts()
    {
        PDOAdapter::db();
        $this->fetchPosts();
        return $this->postList;
    }
}