<?php

  $categories = get_all_category();

  if(isset($_POST['book_form']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $title = escape_and_lower($_POST['title']);
    $author = escape_and_lower($_POST['author']);
    $category = escape_and_lower($_POST['category1']);
    $publisher = escape_and_lower($_POST['publisher']);
    $quantity = escape_and_lower($_POST['quantity']);
    $accessionNo = escape_and_lower($_POST['accessionNo']);
    $totalPages = escape_and_lower($_POST['totalPages']);
    $price = escape_and_lower($_POST['price']);
    $availableQty = $quantity;

    $sql = "INSERT INTO `book`(`title`, `author`, `categoryId`, `publisher`, `availableQty`, `qty`, `accessionNo`, `totalPages`, `price`) VALUES('$title', '$author', '$category', '$publisher', '$availableQty', '$quantity', '$accessionNo', '$totalPages', '$price')";
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

<div class="modal" data-target="book" id="book-modal">

 <h2 class="modal__heading">Add Book</h2>

 <div class="modal__close-div">
  <i class='bx bx-x'></i>
 </div>


 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="modal__form">

  <div class="form-input-group">
   <label for="title" class="form-label">Title</label>
   <input type="text" id="title" name="title" class="form-input" placeholder="Enter title" required>
  </div>
  <div class="form-input-group">
   <label for="author" class="form-label">Author</label>
   <input type="text" id="author" name="author" class="form-input" placeholder="Enter author" required>
  </div>
  <div class="form-input-group">
   <label for="category1" class="form-label">Category</label>
   <select name="category1" class="form-input" name="category" id="category1" required>
        <?php
          if(count($categories)){
            foreach ($categories as $category) {
              var_dump($category['category']);
              echo "<option value=".$category['srno'].">".$category['category']."</option>";
            }
          }else{
            echo "<option value='' disabled>not available</option>";
          }

        ?>
    </select>
  </div>
  <div class="form-input-group">
   <label for="publisher" class="form-label">Publisher</label>
   <input type="text" id="publisher" class="form-input" name="publisher" placeholder="Enter publisher" required>
  </div>
  <div class="form-input-group">
   <label for="quantity" class="form-label">Quantity</label>
   <input type="number" inputmode="tel" id="quantity" name="quantity" class="form-input" placeholder="Enter quantity" required>
  </div>
  <div class="form-input-group">
   <label for="accessionNo" class="form-label">Accesion No</label>
   <input type="text" id="accessionNo" class="form-input" name="accessionNo" placeholder="Enter accession no" required>
  </div>
  <div class="form-input-group">
   <label for="totalPages" class="form-label">Total Pages</label>
   <input type="text" id="totalPages" class="form-input" name="totalPages" placeholder="Enter total pages" required>
  </div>
  <div class="form-input-group">
   <label for="price" class="form-label">Price</label>
   <input type="number" id="price" class="form-input" name="price" placeholder="Enter price" required>
  </div>
  <div class="form-input-group">
   <button type="submit" value="sumbit" name="book_form" class="form-input form-btn">Sumbit</button>
  </div>
 </form>
</div>