<?php

    $issuedArr = fetch_issued_book();
    
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
        <td>Branch</td>
        <td>Accession No.</td>
        <td>Title</td>
        <td>Author</td>
        <td>Category</td>
        <td>Issued Date</td>
       </tr>
      </thead>
      <tbody>
      <?php
            if(count($issuedArr)){
                $no = 0;
                foreach ($issuedArr as $issuedData) {
                    // $issuedDate = date_create($returnData['issuedDate']);
                    // $returnDate = date_create($returnData['date']);
                    // $dateDiff = date_diff($issuedDate, $returnDate, true);
                    
                    $no++;
                    echo "<tr>
                            <td>".$no."</td>
                            <td>".$issuedData['name']."</td>
                            <td>".$issuedData['prn']."</td>
                            <td>".strtoupper($issuedData['class'])."</td>
                            <td>".strtoupper($issuedData['branch'])."</td>
                            <td>".strtoupper($issuedData['accessionNo'])."</td>
                            <td>".$issuedData['title']."</td>
                            <td>".$issuedData['author']."</td>
                            <td>".$issuedData['category']."</td>
                            <td>".$issuedData['date']."</td>
                        </tr>";
                }
            }else{
                echo "<h1>No books available</h1>";
            }
        ?>

       <!-- <tr>
        <td>3</td>
        <td>Do Epic Shit </td>
        <td>rafel c.gonzalez</td>
        <td>A-211</td>
        <td>self-motivational</td>
        <td>121</td>
        <td>new</td>
       </tr> -->
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </section>