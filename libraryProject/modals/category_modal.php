<?php

    if(isset($_POST['category_form']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $category = htmlspecialchars($_POST['category']);
        $description = htmlspecialchars($_POST['description']);

        $sql = "INSERT INTO `category`(`category`, `description`) VALUES('$category', '$description')";
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

<div class="modal" data-target="category" id="category-modal">
    <h2 class="modal__heading">Add Cateory</h2>

    <div class="modal__close-div">
        <i class='bx bx-x'></i>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="modal__form">

        <div class="form-input-group">
            <label for="category" class="form-label">Category</label>
            <input type="text" id="category" minlength="3" name="category" class="form-input"
                placeholder="Enter category" required>
        </div>
        <div class="form-input-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" minlength="4" name="description" class="form-input" placeholder="Enter description">
        </div>
        <div class="form-input-group">
            <button type="submit" name="category_form" value="sumbit" class="form-input form-btn">Sumbit</button>
        </div>
    </form>
</div>