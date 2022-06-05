<?php

namespace App;

use Exception;
use PDO;

class PDOAdapter
{
    private static PDO $db;
    private const HOST = 'mysql';
    private const DB_NAME = 'PostList';

    private function __construct()
    {
    }

    protected function __clone(): void
    {
    }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }

    public static function db(): PDO
    {
        if (!isset(self::$db)) {
            self::$db = new PDO('mysql:host=' . self::HOST . ';port:3306dbname:' . self::DB_NAME,
                'root', 'password', [
                    PDO::ATTR_DEFAULT_FETCH_MODE => 2
                ]);
        }
        return self::$db;
    }

    public static function insertToDB(string $userName, string $text): void
    {
        static::db()->prepare('insert into PostList.posts (userName, text)
                                values (?, ?, ?)')->execute([$userName, $text]);
    }

    public static function getFromDB(): bool|array
    {
        $queryGet = 'select postId, userName, text, date, rating from PostList.posts;';
        return static::db()->query($queryGet)->fetchAll();
    }

    public static function deleteFromDB(): string
    {
        return "delete from PostList.posts";
    }

    public static function ratePost(float $newRating, int $postId){
        static::db()->prepare("update PostList.posts set rating = ? where postId = ?")
            ->execute($newRating, $postId);
    }
}