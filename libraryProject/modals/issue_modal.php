<?php

    if(isset($_POST['issue_form']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $prn = strtolower(htmlspecialchars($_POST['prn']));
        $accessionNo = htmlspecialchars($_POST['accessionNo']);


        $status = "warning";
        $msg = "";
        $title = "";

        $studentSql = "SELECT COUNT(`prn`) AS `availableStudent` FROM `student` WHERE `prn`='$prn'; 
                    SELECT COUNT(`prn`) AS `noOfBooksIssued` FROM `issued` WHERE `prn`='$prn';";

        // FIXME: One student can take many books (update: one student one book)  --FIXED

        try {
            if($result = $mysqli -> multi_query($studentSql)){
                $resultArr = array();
                
                do {
                    // Store first result set
                    if ($result = $mysqli -> store_result()) {
                      while ($row = $result -> fetch_assoc()) {
                        $resultArr = array_merge($resultArr, $row);
                      }
                     $result -> free_result();
                    }

                    // if there are more result-sets, the print a divider
                    // if ($mysqli -> more_results()) {
                    //   echo "<br>";
                    // }

                     //Prepare next result set
                } while ($mysqli -> next_result());
                

                if (intval($resultArr['availableStudent']) > 0 && intval($resultArr['noOfBooksIssued']) == 0) {
                    // check for the availability of accession no.
                        $bookSql = "SELECT `accessionNo`, `availableQty` FROM `book` WHERE `accessionNo`='$accessionNo'";

                        if($result = $mysqli -> query($bookSql)){
                            $results = $result -> fetch_array(MYSQLI_ASSOC);
                            if($results){
                                // check for the book availability to make an entry
                                // var_dump($results);

                                $noOfBooks = intval($results['availableQty']);

                                if($noOfBooks){
                                    // book can be allotted to the prn
                                    $newBookCount = --$noOfBooks;

                                    // make the entry of the book
                                    $sql = "INSERT INTO `issued`(`accessionNo`, `prn`) VALUES('$accessionNo', $prn);";

                                    //FIXME: Something is wrong here fix this --FIXED
                                    if($result = $mysqli -> query($sql)){
                                        // echo $result-> error;
                                        $sql = "UPDATE `book` SET `availableQty` = '$newBookCount' WHERE `accessionNo`='$accessionNo'";

                                        if($result = $mysqli -> query($sql)){
                                            // query success
                                            $status = "success";
                                            $title = "Book Allotted";
                                            $msg = "Book ('$accessionNo') successfully alloted to Student('$prn')";
                                        }else{
                                            $status = "error";
                                            $title = "Book Allotted but not updated";
                                            $msg = "dont know";
                                        }
                                    }else{
                                        // query unsuccessfull
                                        $status = "warning";
                                        $title = "Something went wrong";
                                        $msg = "If problem exists contact admin, Thank You!";
                                    }
                                }else{
                                    // book is already taken by some one
                                    $status = "warning";
                                    $title = "Book Not Available";
                                    $msg = "Seems that book has already taken by someone";
                                }
                            }else{
                                // no book available with this accession no
                                $status = "error";
                                $title = "Invalid Book";
                                $msg = "No book available with this accession No";
                            }
                        }
                } 
                else {
                    // echo "<h1>No student available with this prn no</h1>";
                    if(intval($resultArr['availableStudent']) == 0){
                        $status = "error";
                        $title = "Invalid Student";
                        $msg = "'$prn' is not registered with us";
                    }else{
                        $status = "warning";
                        $title = "Double book entry";
                        $msg = "As per the policy of (1 book to 1 student at a time)";
                    }
                }
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


<div class="modal" data-target="issue" id="issue-modal">

 <h2 class="modal__heading">Issue Book</h2>

 <div class="modal__close-div">
  <i class='bx bx-x'></i>
 </div>


 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="modal__form">

  <div class="form-input-group">
   <label for="issuePrn" class="form-label">PRN NO.</label>
   <input type="number" id="issuePrn" class="form-input" name="prn" placeholder="Enter PRN" required>
  </div>
  <div class="form-input-group">
   <label for="issueAccessionno" class="form-label">Accession No.</label>
   <input type="text" id="issueAccessionno" class="form-input" name="accessionNo" placeholder="Enter accession no." required>
  </div>
  <div class="form-input-group">
   <button type="submit" value="sumbit" name="issue_form" class="form-input form-btn">Sumbit</button>
  </div>
 </form>
</div>