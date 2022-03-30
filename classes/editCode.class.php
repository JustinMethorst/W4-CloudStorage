<?php
include './includes/class-autoload.inc.php';

class editCode extends Dbh
{

    public function profielCode($form)
    {
        // $db = new Dbh(); 
        if (isset($form['update_profiel'])) {
            $idAccount = $form['gebruiker_id'];
            $profielNaam = $form['profielNaam'];
            $volledigeNaam = $form['volledigeNaam'];
            $profielBeschrijving = $form['profielBeschrijving'];
            $mail = $form['mail'];
            $website = $form['website'];

            try {
                $query = "UPDATE account SET profielNaam=:profielNaam, volledigeNaam=:volledigeNaam, profielBeschrijving=:profielBeschrijving, mail=:mail, website=:website WHERE idAccount=:idAccount LIMIT 1";
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(':profielNaam', $profielNaam);
                $statement->bindParam(':volledigeNaam', $volledigeNaam);
                $statement->bindParam(':profielBeschrijving', $profielBeschrijving);
                $statement->bindParam(':mail', $mail);
                $statement->bindParam(':website', $website);
                $statement->bindParam(':idAccount', $idAccount);
                $query_execute = $statement->execute();
                if ($query_execute) {
                    $_SESSION['message'] = "updated Successfully";
                    header('Location: index.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "Not updated";
                    header('Location: index.php');
                    exit(0);
                }


            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


    }
}