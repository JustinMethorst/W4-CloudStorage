<?php

class Posts extends Dbh
{

    public function getPosts(): array
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->connect()->query($sql);

        return $stmt->fetchAll();
    }

    public function getComments($idPost): array
    {
        $sql = "SELECT * FROM comments WHERE postId_comment = :postId";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':postId', $idPost, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function countPosts(){
        $sql = "SELECT COUNT(idPosts) as 'postnumber' FROM posts";
        $stmt = $this->connect()->query($sql);

        return $stmt->fetchAll();
    }

    public function newPost()
    {
        $gebruikersNaam = $_REQUEST['gebruikersNaam'];
        $tijdGeleden = $_REQUEST['tijdGeleden'];
        $imgLocation = $_REQUEST['imgLocation'];
        $postDescription = $_REQUEST['beschrijving'];

        $sql = "INSERT INTO posts (gebruikersNaam, datum, imgLocation, beschrijving)
VALUES 
       ('$gebruikersNaam' , '$tijdGeleden', '$imgLocation' , '$postDescription')";
        $this->connect()->query($sql);
    }
}