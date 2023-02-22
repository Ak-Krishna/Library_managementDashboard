<?php

    include "../database/dbConn.php";

    if(isset($_POST['category_form']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $category = htmlspecialchars($_POST['category']);
        $description = htmlspecialchars($_POST['description']);

        $sql = "INSERT INTO `category` (`category`,`description`) VALUES('$category','$description')";

        $msg = "";

       try {
        if($result = $mysqli -> query($sql)){
            $msg = "success";
        }
       } catch (Throwable $th) {
           $msg = $th->getMessage();
       } finally{
            
            header("Location: /libraryProject");
            exit;
       }
    }
?>