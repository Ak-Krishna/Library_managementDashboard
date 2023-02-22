<?php
    $branch = fetch_overall_student_data();
    // var_dump($branch);


?>


<section class="section overview grid">
<?php
    if(count($branch) > 0){
        foreach ($branch as $branch) {
            echo "<a href='students.php?branch=".$branch['branch']."' class='overview__card'>
                    <div class='overview__card-details'>
                    <h1 class='details-count'>
                        ".$branch['count']."
                    </h1>
                    <h1 class='details-heading'>".ucwords($branch['branch'])."</h1>
                    </div>
                    <i class='bx bxs-book overview__card-img'></i>
                </a>";
        }
    }

?>
  <!-- <div class="overview__card">
    <div class="overview__card-details">
      <h1 class="details-count">
        <?php echo (isset($array['book']) && !is_null($array['book'])) ? $array['book'] : "Null" ; ?>
      </h1>
      <h1 class="details-heading">Books</h1>
      <button data-modal="book" class="detail-link" onclick="openModal(this.dataset.modal)">Add
        Book</button>
    </div>
    <i class='bx bxs-book overview__card-img'></i>
  </div> -->
</section>