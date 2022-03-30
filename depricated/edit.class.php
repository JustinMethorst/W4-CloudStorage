<?php

class edit extends dbh
{

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
                    <label>mail</label>
                    <input type="text" name="mail" value="<?= $data['mail']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>website</label>
                    <input type="text" name="website" value="<?= $data['website']; ?>" class="form-control">
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