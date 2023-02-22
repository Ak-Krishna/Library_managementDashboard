<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library_diems";

    session_start();
    
    try {
        $mysqli = new mysqli($host, $username, $password, $dbname);
    } catch (Throwable $th) {
        echo '<script>
                alert("some error occured in database");
              </script>';
    }
?>