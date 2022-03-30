<?php

class Dbh
{
    private string $host = 'localhost';
    private string $user = "root";
    private string $pwd = "";
    private string $dbName = "projectW3SocialMedia";

    protected function connect(): PDO
    {
        $pdo = false;
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }

        catch(Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        return $pdo;

    }
}