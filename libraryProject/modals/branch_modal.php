<?php

    if(isset($_POST['branch_form']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $branch = strtolower(htmlspecialchars($_POST['branch']));

        $sql = "INSERT INTO `branch`(`branch`) VALUES('$branch');";
        $status = "warning";
        $msg = "";
        $title = "";

        try {
            if($result = $mysqli -> query($sql)){
                $status = "success";
                $title = "Added Successfully";
            }
        } catch (Throwable $th) {
            $msg = $th->getMessage();
            $title = "Something Went Wrong";
            $status = "warning";
        }finally{
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

<div class="modal" data-target="branch" id="branch-modal">

 <h2 class="modal__heading">Add Branch</h2>

 <div class="modal__close-div">
  <i class='bx bx-x'></i>
 </div>


 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="modal__form">

  <div class="form-input-group">
   <label for="branch" class="form-label">Branch Name</label>
   <input type="text" id="branch" name="branch" class="form-input" placeholder="Enter branch name" required>
  </div>
  <div class="form-input-group">
   <button type="submit" value="sumbit" name="branch_form" class="form-input form-btn">Sumbit</button>
  </div>
 </form>
</div>