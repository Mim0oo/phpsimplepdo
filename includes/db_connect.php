<?php
        //Connect to mysql or return error
        function connect()
        {
                $dbUsername = 'username';
                $dbPassword = 'password';
 
                try {
                        $conn = new PDO('mysql:host=localhost;dbname=database', $dbUsername, $dbPassword);
                //      echo ('if debug is needed - Connection was a success!');
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        return $conn;
                }
 
                catch(PDOException $e) {
                        echo 'Error: ' . $e->getMessage();
                }
        }
 
?>