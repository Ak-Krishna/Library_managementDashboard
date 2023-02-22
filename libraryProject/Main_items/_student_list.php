<?php

    $students = fetch_student($branchParam);

?>
 <!-- dash-items -->
 <section class="grid-table">
  <div class="student-table">
   <div class="table-header">
    <h2>Students List</h2>
    <button>see all <div class="las la-arro-right"></div></button>
   </div>
   <div class="table-body">
    <div class="table">
     <table width="100%">
      <thead>
       <tr>
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>PRN</td>
        <td>Class</td>
        <td>Year</td>
        <td>Branch</td>
        <td>Registered On</td>
        <td>Action</td>
       </tr>
      </thead>
      <tbody>
        <?php
            if(count($students) > 0){
                $sno = 0;
                foreach($students as $student){
                    $sno++;
                    
                    echo "<tr>
                            <td>".$sno."</td>
                            <td>".$student['name']."</td>
                            <td>".$student['email']."</td>
                            <td>".$student['prn']."</td>
                            <td>".strtoupper($student['class'])."</td>
                            <td>".$student['year']."</td>
                            <td>".$student['branch']."</td>
                            <td>".$student['registeredOn']."</td>
                            <td><button class=''>report</button></td>
                        </tr>";
                }
            }
        ?>
       <!-- <tr>
        <td>1</td>
        <td>kishan aher</td>
        <td>kishanaherr12@gmail.com</td>
        <td>31101</td>
        <td>1921141370038</td>
        <td>9112962305</td>
        <td>electronics and telecommunication</td>
        <td>4</td>
        <td><span class="status"></span>pending</td>
        <td><button class="">delete</button></td>
       </tr> -->
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </section>