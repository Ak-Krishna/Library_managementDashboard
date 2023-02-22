<?php

  $branches = get_all_branch();
  // var_dump($branches);

  if(isset($_POST['student_form']) && $_SERVER['REQUEST_METHOD']){
    $name = escape_and_lower($_POST['name']);
    $email = escape_and_lower($_POST['email']);
    $contact = escape_and_lower($_POST['contact']);
    $branch = escape_and_lower($_POST['branch']);
    $year = escape_and_lower($_POST['year']);
    $class = escape_and_lower($_POST['class']);
    $prn = escape_and_lower($_POST['prn']);

    $sql = "INSERT INTO `student`(`name`, `email`, `prn`, `contact`, `class`, `year`, `branchId`) VALUES('$name', '$email', '$prn', '$contact', '$class', '$year', '$branch')";
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

<div class="modal" data-target="student" id="student-modal">

  <h2 class="modal__heading">Add Student</h2>

  <div class="modal__close-div">
    <i class='bx bx-x'></i>
  </div>


  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="POST" class="modal__form">

    <div class="form-input-group">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name" name="name" class="form-input" placeholder="Enter name" required>
    </div>
    <div class="form-input-group">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" class="form-input" placeholder="Enter email" required>
    </div>
    <div class="form-input-group">
      <label for="contact" class="form-label">Contact</label>
      <input type="tel" inputmode="tel" name="contact" id="contact" class="form-input" placeholder="Enter contact no"
        required>
    </div>
    <div class="form-input-group">
      <label for="branch" class="form-label">Branch</label>
      <select name="branch" class="form-input" name="branch" id="branch" required>
        <?php
          if(count($branches)){
            foreach ($branches as $branch) {
              echo "<option value=".$branch['branchId'].">".strtolower($branch['branch'])."</option>";
            }
          }else{
            echo "<option value='' disabled>not available</option>";
          }
        ?>
      </select>
    </div>
    <div class="form-input-group">
      <label for="year" class="form-label">Year</label>
      <select name="year" class="form-input" name="year" id="year" required>
        <option value="1">1st</option>
        <option value="2">2nd</option>
        <option value="3">3rd</option>
        <option value="4">4th</option>
      </select>
    </div>
    <div class="form-input-group">
      <label for="class" class="form-label">Class</label>
      <input type="text" id="class" name="class" class="form-input" placeholder="eg: FE-7" required>
    </div>
    <div class="form-input-group">
      <label for="prn" class="form-label">PRN</label>
      <input type="number" inputmode="tel" name="prn" id="prn" class="form-input" placeholder="Enter your PRN" required>
    </div>
    <div class="form-input-group">
      <button type="submit" value="sumbit" name="student_form" class="form-input form-btn">Sumbit</button>
    </div>
  </form>
</div>