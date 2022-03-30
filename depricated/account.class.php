<?php

class Account extends Dbh
{

    public function profielInfo(): array
    {
        $account = array();
        $sql = "SELECT * FROM account";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            $account[] = array(
                "idAccount" => $row['idAccount'],
                "profielNaam" => $row['profielNaam'],
                "profielFoto" => $row['profielFoto'],
                "volledigeNaam" => $row['volledigeNaam'],
                "profielBeschrijving" => $row['profielBeschrijving'],
                "mail" => $row['mail'],
                "website" => $row['website']
            );
        }
        return $account;
    }
}


?>
