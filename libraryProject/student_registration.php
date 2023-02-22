

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>DIEMS-library | student-registration</title>
</head>

<body>
<?php
    require('functions.inc.php');

    $branches = get_all_branch();

    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        // var_dump($_POST);
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
                    console.log(`hello alert lawdya`);
                </script>';
        }
    }
?>
    <section class="container-half">
        <div class="login_header">
            <h1>Welcome to DIEMS - Library</h1>
            <h2>Student Registration</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-input-group-container">
                <div class="form-input-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" placeholder="Name" class="form-input " name="name" id="name" required>
                </div>
                <div class="form-input-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-input" placeholder="Enter email" name="email" required>
                    <p class="input_error">
                        <!-- <?php echo $error; ?> -->
                    </p>
                </div>
                <div class="form-input-group">
                    <label for="password" class="form-label">PRN</label>
                    <input type="number" id="password" class="form-input" placeholder="Enter PRN No."
                        name="prn" required>
                    <p class="input_error"></p>
                </div>
                <div class="form-input-group">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="number" id="contact" class="form-input" placeholder="Enter contact no."
                        name="contact" required>
                    <p class="input_error"></p>
                </div>
                <div class="form-input-group">
                    <label for="branch" class="form-label">Branch</label>
                    <select name="branch" class="form-input" id="branch" required>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value=".$branch['branchId'].">".$branch['branch']."</option>";
                            }
                        ?>
                        <!-- <option value="E&TC">E&TC</option>
                        <option value="CSE">CSE</option>
                        <option value="Civil">Civil</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="AI-ML">AI-ML</option> -->
                    </select>
                    <p class="input_error"></p>
                </div>
                <div class="form-input-group d-flex">
                    <div class="form-input-group col">
                        <label for="class" class="form-label">Class</label>
                        <input type="class" id="class" class="form-input" placeholder="eg. FE-7" name="class" required>
                        <p class="input_error"></p>
                    </div>
                    <div class="form-input-group col">
                        <label for="year" class="form-label">Year</label>
                        <select name="year" id="year" class="form-input" required>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </select>
                        <p class="input_error"></p>
                    </div>
                </div>
                <div class="form-input-group">
                    <button type="submit" value="submit" name="submit" class="form-input form-btn">Register</button>
                </div>
            </div>

        </form>
    </section>
</body>


</html>