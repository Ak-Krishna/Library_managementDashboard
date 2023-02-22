  <!-- breadcrum -->
  <div class="breadcrum">
   <h3 class="breadcrum-title">Dashboard</h3>
  </div>

  <section class="section overview grid">
   <div class="overview__card">
    <div class="overview__card-details">
     <h1 class="details-count">30</h1>
     <h1 class="details-heading">Books</h1>
     <button data-modal="book" class="detail-link" onclick="openModal(this.dataset.modal)">Add
      Book</button>
    </div>
    <i class='bx bxs-book overview__card-img'></i>
   </div>
   <div class="overview__card">
    <div class="overview__card-details">
     <h1 class="details-count">27</h1>
     <h1 class="details-heading">Students</h1>
     <button data-modal="student" class="detail-link" onclick="openModal(this.dataset.modal)">Add
      Student</button>
    </div>
    <i class='bx bxs-graduation overview__card-img'></i>
   </div>
   <div class="overview__card">
    <div class="overview__card-details">
     <h1 class="details-count">09</h1>
     <h1 class="details-heading">Categories</h1>
     <button data-modal="category" onclick="openModal(this.dataset.modal)" class="detail-link">Add
      Category</button>
    </div>
    <i class='bx bxs-category overview__card-img'></i>
   </div>
   <div class="overview__card">
    <div class="overview__card-details">
     <h1 class="details-count">02</h1>
     <h1 class="details-heading">Admin</h1>
     <button data-modal="admin" onclick="openModal(this.dataset.modal)" class="detail-link">Add
      Admin</button>
    </div>
    <i class='bx bxs-user-badge overview__card-img'></i>
   </div>
  </section>