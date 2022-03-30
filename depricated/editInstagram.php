<?php
include_once 'Dbh.class.php';

class editInstagram extends Dbh
{
    public function editComments($form)
    {
        // $db = new Dbh();
        if (isset($form['update_profiel'])) {
            $commentId = $form['commentId'];
            $photoComment = $form['photoComment'];
            $userComment = $form['userComment'];
            $writtenComment = $form['profielBeschrijving'];


            try {
                $query = "UPDATE comments SET photoComment=:photoComment, userComment=:volledigeNaam, profielBeschrijving=:profielBeschrijving, mail=:mail WHERE commentId=:commentId LIMIT 1";
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(':profielNaam', $profielNaam);
                $statement->bindParam(':volledigeNaam', $volledigeNaam);
                $statement->bindParam(':profielBeschrijving', $profielBeschrijving);
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

    public function profielEdit()
    {

        if (isset($_GET['id'])) {
            $gebruiker_id = $_GET['id'];
            $sql = "SELECT * FROM account WHERE idAccount=1 LIMIT 1";
            $stmt = $this->connect()->query($sql);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <form action="./edit.php" method="POST">

                <input type="hidden" name="gebruiker_id" value="<?= $data['idAccount']; ?>">
                <div class="mb-3">
                    <label>naam</label>
                    <input type="text" name="profielNaam" value="<?= $data['profielNaam']; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>gebruikersnaam</label>
                    <input type="text" name="volledigeNaam" value="<?= $data['volledigeNaam']; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>biografie</label>
                    <textarea height="27px" type="text" class="bio form-control"
                              name="profielBeschrijving"><?= $data['profielBeschrijving']; ?>   </textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" value="update_profiel" name="update_profiel" class="btn btn-outline-dark">
                        update profiel
                    </button>
                </div>
            </form>
            <?php
        } else {
            echo "<h5>no ID found</h5>";

        }

    }


}