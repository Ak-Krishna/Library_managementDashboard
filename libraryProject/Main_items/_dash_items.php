<?php
  $array = get_dashboard_count();
?>
<section class="section overview grid">
  <div class="overview__card">
    <div class="overview__card-details">
      <h1 class="details-count">
        <?php echo (isset($array['book']) && !is_null($array['book'])) ? $array['book'] : "0" ; ?>
      </h1>
      <h1 class="details-heading">Books</h1>
      <button data-modal="book" class="detail-link" onclick="openModal(this.dataset.modal)">Add
        Book</button>
    </div>
    <i class='bx bxs-book overview__card-img'></i>
  </div>
  <div class="overview__card">
    <div class="overview__card-details">
      <h1 class="details-count">
        <?php echo (isset($array['student']) && !is_null($array['student'])) ? $array['student'] : "0" ; ?>
      </h1>
      <h1 class="details-heading">Students</h1>
      <button data-modal="student" class="detail-link" onclick="openModal(this.dataset.modal)">Add
        Student</button>
    </div>
    <i class='bx bxs-graduation overview__card-img'></i>
  </div>
  <div class="overview__card">
    <div class="overview__card-details">
      <h1 class="details-count">
        <?php echo (isset($array['category']) && !is_null($array['category'])) ? $array['category'] : "0" ; ?>
      </h1>
      <h1 class="details-heading">Categories</h1>
      <button data-modal="category" onclick="openModal(this.dataset.modal)" class="detail-link">Add
        Category</button>
    </div>
    <i class='bx bxs-category overview__card-img'></i>
  </div>
  <div class="overview__card">
    <div class="overview__card-details">
      <h1 class="details-count">
        <?php echo (isset($array['admin']) && !is_null($array['admin'])) ?  $array['admin'] : "0" ; ?>
      </h1>
      <h1 class="details-heading">Admin</h1>
      <button data-modal="admin" onclick="openModal(this.dataset.modal)" class="detail-link">Add
        Admin</button>
    </div>
    <i class='bx bxs-user-badge overview__card-img'></i>
  </div>
  <div class="overview__card">
    <div class="overview__card-details">
      <h1 class="details-count">
        <?php echo (isset($array['branch']) && !is_null($array['branch'])) ? $array['branch'] : "0" ; ?>
      </h1>
      <h1 class="details-heading">Branch</h1>
      <button data-modal="branch" onclick="openModal(this.dataset.modal)" class="detail-link">Add
        Branch</button>
    </div>
    <i class='bx bxs-user-badge overview__card-img'></i>
  </div>
</section>

<section class="section secondary-dash-item grid">
  <div class="secondary-dash-item__card">
    <i class='bx bxs-user-badge overview__card-img'></i>
    <div class="secondary-dash-item__card-details">
      <h1 class="details-heading">Issued</h1>
      <h1 class="details-count">
        <?php echo (isset($array['issued']) && !is_null($array['issued'])) ? $array['issued'] : "Null" ; ?>
      </h1>
      <button data-modal="issue" onclick="openModal(this.dataset.modal)" class="detail-link">Issue</button>
    </div>
  </div>
  <div class="secondary-dash-item__card">
    <i class='bx bxs-down-arrow-square overview__card-img'></i>
    <div class="secondary-dash-item__card-details">
      <h1 class="details-heading">Returned</h1>
      <h1 class="details-count">
        <?php echo (isset($array['returned']) && !is_null($array['returned'])) ? $array['returned'] : "Null" ; ?>
      </h1>
      <button data-modal="return" onclick="openModal(this.dataset.modal)" class="detail-link">Return</button>
    </div>
  </div>
  <div class="secondary-dash-item__card">
    <i class='bx bxs-up-arrow-square overview__card-img'></i>
    <div class="secondary-dash-item__card-details">
      <h1 class="details-heading">Unreturned</h1>
      <h1 class="details-count">
        <?php echo $array['issued']; ?>
      </h1>
      <a href="./issuedData.php" class="detail-link">View</a>
    </div>
  </div>
</section>