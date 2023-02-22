<?php

    if(isset($_POST['return_form']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $prn = escape_and_lower($_POST['prn']);
        $accessionNo = escape_and_lower($_POST['accessionNo']);
        $rating = escape_and_lower($_POST['rating']);

        $sql = "SELECT * FROM `issued` WHERE `prn`='$prn'";
        $status = "warning";
        $msg = "";
        $title = "";


        try {
            if($result = $mysqli -> query($sql)){
                $record = $result -> fetch_assoc();

                // var_dump($record);

                if($record){
                    if(escape_and_lower($record['accessionNo'])==$accessionNo && $record['prn'] == $prn){
                        $issuedDate = $record['date'];
                        $srno = $record['srno'];

                        // delete the record from the issued table
                        $deleteSql = "DELETE FROM `issued` WHERE `srno`='$srno';";

                        if($result = $mysqli -> query($deleteSql)){
                            // FIXME: rating is not updated 
                            $insertSql = "INSERT INTO `returned`(`accessionNo`, `prn`, `issuedDate`, `rating`) VALUES('$accessionNo',   '$prn', '$issuedDate', '$rating');";

                            if($result = $mysqli -> query($insertSql)){

                                $incrementSql = "UPDATE `book` SET `availableQty`= (SELECT `availableQty` FROM `book` WHERE `accessionNo`='$accessionNo')+1 WHERE `accessionNo`='$accessionNo'";

                                if($result = $mysqli -> query($incrementSql)){
                                    $status = "success";
                                    $title = "Book returned successfully";
                                    $msg = "Book('$accessionNo') returned by student('$prn')";
                                }else{
                                    $status = "error";
                                    $msg = "No such book was alloted to such student";
                                    $title = "Bhai ye kya kr raha hai";
                                }
                            }
                        }else{
                            // delete not success

                        }
                    }else{
                        // something is wrong check for the credentials again

                        $status = "warning";
                        $title = "Wrong Credentials";
                        // $msg = "Book('$accessionNo') returned by student('$prn')";
                    }
                }else{
                    $status = "error";
                    $msg = "No such book was alloted to such student";
                    $title = "Bad Credentials";
                }
            }else{
                echo "<h1>HERE</h1>";
                $status = "error";
                $msg = "Wrong Credentials";
                $title = "Wrong Credentials";
            }
        } catch (Throwable $th) {
            $msg = $th->getMessage();
            $title = "Something Went Wrong";
            $status = "warning";
        } finally{
            echo '<script>
                swal({
                title: "'.$title.'",
                text: "'.$msg.'",
                icon: "'.$status.'",
                });
              </script>';
        }

    }


?>

<div class="modal" data-target="return" id="return-modal">

 <h2 class="modal__heading">Return Book</h2>

 <div class="modal__close-div">
  <i class='bx bx-x'></i>
 </div>


 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="modal__form">

  <div class="form-input-group">
   <label for="prn" class="form-label">PRN NO.</label>
   <input type="number" id="prn" name="prn" class="form-input" placeholder="Enter PRN" required>
  </div>
  <div class="form-input-group">
   <label for="accessionno" class="form-label">Accession No.</label>
   <input type="text" id="accessionno" name="accessionNo" class="form-input" placeholder="Enter accession no." required>
  </div>
  <div class="form-input-group">
   <label for="rating" class="form-label">Rating</label>
   <input type="number" max="5" min="0" id="rating" name="rating" class="form-input" placeholder="ratings (0-5)">
  </div>
  <div class="form-input-group">
   <button type="submit" value="sumbit" name="return_form" class="form-input form-btn">Sumbit</button>
  </div>
 </form>
</div>