<?php
//session_start();

class Admin extends Dbh
{
    public function adminLogin($user_name, $user_password)
    {
        $url = "index.php";

        try {
            // Define query to insert values into the users table
            $sql = "SELECT * FROM user WHERE username=:user_name LIMIT 1";

            // Prepare the statement
            $query = $this->connect()->prepare($sql);

            // Bind parameters
            $query->bindParam(":user_name", $user_name);

            // Execute the query
            $query->execute();

            // Return row as an array indexed by both column name
            $returned_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check if row is actually returned
            if ($query->rowCount() > 0) {
                // Verify hashed password against entered password
                // password_verify($user_password, $returned_row['user_password'])
                if (True) {
                    // Define session on successful login
//                    $returned_row['user_id'];
                    $_SESSION['user_session'] = $returned_row['beheerder_id'];
                    (new Admin())->redirect($url);
                    return true;
                } else {
                    // Define failure
                    echo 'not working';
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }




    // Check if the user is already logged in
    public function is_logged_in()
    {
        // Check if user session has been set
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    // Redirect user
    public function redirect($url)
    {
        header("Location: $url");
    }

    // Log out user
    public function log_out(): bool
    {
        // Destroy and unset active session
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}