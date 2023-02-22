 <?php

    if(isset($_POST['admin_form']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $name = escape_and_lower($_POST['adminName']);
        $email = escape_and_lower($_POST['adminEmail']);
        $contact = escape_and_lower($_POST['adminContact']);
        $password = htmlspecialchars($_POST['adminPassword']);
        $cPassword = htmlspecialchars($_POST['adminCPassword']);

        $status = "warning";
        $msg = "";
        $title = "";

        if($password == $cPassword){
            // GENERATE THE UNIQUE TOKEN
            do {
                $result = generateToken();
                $sameTokenCount = intval($result[0]['count']);
                $token = $result[1];
            } while ($sameTokenCount != 0 && (is_null($result) && count($result) == 2));

            // BYCRYPT THE PASSWORD
            $hash = password_hash($password, CRYPT_BLOWFISH);
            $status = 0;

            $sql = "INSERT INTO `admin` (`username`,`email`,`contact`,`password`,`token`,`status`) VALUES ('$name', '$email', '$contact', '$hash', '$token', '$status')";

            try {
                if($result = $mysqli -> query($sql)){
                    $status = "success";
                    $title = "Welcome to DIEMS Library";
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
        }else{

        }
    }
?>
 
 <div class="modal" data-target="admin" id="admin-modal">

  <h2 class="modal__heading">Add Admin</h2>

  <div class="modal__close-div">
   <i class='bx bx-x'></i>
  </div>


  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="modal__form">

   <div class="form-input-group">
    <label for="aName" class="form-label">Name</label>
    <input type="text" id="aName" class="form-input" placeholder="Enter name" name="adminName">
   </div>
   <div class="form-input-group">
    <label for="aEmail" class="form-label">Email</label>
    <input type="email" id="aEmail" class="form-input" placeholder="Enter email" name="adminEmail">
   </div>
   <div class="form-input-group">
    <label for="aContact" class="form-label">Contact</label>
    <input type="number" inputmode="tel" id="aContact" class="form-input" placeholder="Enter contact no" name="adminContact" >
   </div>
   <div class="form-input-group">
    <label for="password" class="form-label">Password</label>
    <input type="password" id="password" class="form-input" placeholder="Enter password" name="adminPassword">
   </div>
   <div class="form-input-group">
    <label for="cPassword" class="form-label">Confirm Password</label>
    <input type="password" id="cPassword" class="form-input" placeholder="Re-enter your password" name="adminCPassword">
   </div>


   <div class="form-input-group">
    <button type="submit" value="submit" name="admin_form" class="form-input form-btn">Sumbit</button>
   </div>
  </form>
 </div>