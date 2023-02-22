<?php

  $admins = fetch_admin(null);

?>
  
  <!-- dash-items -->
  <section class="section overview grid">

    <?php
      if(count($admins) > 0 && !is_null($admins)){
        foreach ($admins as $admin) {
          echo "<div class='overview__card'>
          <div class='overview__card-details'>
           <h1 class='details-heading'>".$admin['username']."</h1>
           <a class='details-mail' href='mailto: ".$admin['email']."'>".$admin['email']."</a> <br>
           <a class='details-contact' href='tel: ".$admin['contact']."'>".$admin['contact']."</a>
          </div>
      
          <div class='admin_actions'>
           <a href='#' class='admin_action-div'>
            <i class='bx bx-edit-alt'></i>
           </a>
           <a href='#' class='admin_action-div'>
            <i class='bx bx-trash-alt'></i>
           </a>
          </div>
         </div>";
        }

      }else{
        echo "no admin here";
      }
    ?>

   

   <!-- <div class="overview__card">
    <div class="overview__card-details">
     <h1 class="details-heading">Kishan Aher</h1>
     <a class="details-mail" href="mailto: kishanaher12@gmail.com">kishanaher12@gmail.com</a> <br>
     <a class="details-contact" href="tel: 9112962305">9112962305</a>
    </div>

    <div class="admin_actions">
     <a href="#" class="admin_action-div">
      <i class='bx bx-edit-alt'></i>
     </a>
     <a href="#" class="admin_action-div">
      <i class='bx bx-trash-alt'></i>
     </a>
    </div>
   </div> -->
  </section>