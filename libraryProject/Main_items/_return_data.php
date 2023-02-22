<?php
    $returnArr = fetch_returned_book();
    // foreach ($returnArr as $return) {
    //     var_dump($return);
    //     echo "<br>";
    // }


?>
 
 <!-- dash-items -->
 <section class="grid-table">
  <div class="student-table">
   <div class="table-header">
    <h2>Book Details</h2>
    <button>see all <div class="las la-arro-right"></div></button>
   </div>
   <div class="table-body">
    <div class="table">
     <table width="100%">
      <thead>
       <tr>
        <td>#</td>
        <td>Name</td>
        <td>PRN</td>
        <td>Class</td>
        <td>Accession No.</td>
        <td>Title</td>
        <!-- <td>Author</td> -->
        <td>Category</td>
        <td>Issued Date</td>
        <td>Returned Date</td>
        <td>Total Days</td>
        <!-- <td>Action</td> -->
       </tr>
      </thead>
      <tbody>
        <?php
            if(count($returnArr)){
                $no = 0;
                foreach ($returnArr as $returnData) {
                    $issuedDate = date_create($returnData['issuedDate']);
                    $returnDate = date_create($returnData['date']);
                    $dateDiff = date_diff($issuedDate, $returnDate, true);
                    
                    $no++;
                    echo "<tr>
                            <td>".$no."</td>
                            <td>".$returnData['name']."</td>
                            <td>".$returnData['prn']."</td>
                            <td>".strtoupper($returnData['class'])."</td>
                            <td>".strtoupper($returnData['accessionNo'])."</td>
                            <td>".$returnData['title']."</td>
                            <td>".$returnData['category']."</td>
                            <td>".$returnData['issuedDate']."</td>
                            <td>".$returnData['date']."</td>
                            <td>".$dateDiff->format("%R%a days")."</td>
                        </tr>";
                }
            }else{
                echo "<h1>No books available</h1>";
            }
        ?>
       <!-- <tr>
        <td>1</td>
        <td>digital image processing</td>
        <td>rafel c.gonzalez</td>
        <td>M-202</td>
        <td>learning</td>
        <td>12</td>
        <td>damage</td>
        <td>damage</td>
        <td>damage</td>
        <td>damage</td>
        <td><button class="active">Edit</button></td>
       </tr> -->
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </section>