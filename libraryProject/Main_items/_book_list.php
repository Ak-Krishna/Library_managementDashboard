<?php
    $bookArr = fetch_book();

    // var_dump($bookArr);
?>
 
 
 <!-- dash-items -->
 <section class="grid-table">
  <div class="student-table">
   <div class="table-header">
    <h2>Book Details</h2>
    <button>see all</button>
   </div>
   <div class="table-body">
    <div class="table">
     <table width="100%">
      <thead>
       <tr>
        <td>Sr.no</td>
        <td>Title</td>
        <td>Author</td>
        <td>Publisher</td>
        <td>Accession No</td>
        <td>Category</td>
        <td>Qty</td>
        <td>Price</td>
        <td>Status</td>
        <td>Action</td>
       </tr>
      </thead>
      <tbody>
        <?php

            if(count($bookArr)){
                $no = 0;
                foreach ($bookArr as $book) {
                    $no++;
                    echo "<tr>
                            <td>".$no."</td>
                            <td>".$book['title']."</td>
                            <td>".$book['author']."</td>
                            <td>".$book['publisher']."</td>
                            <td>".strtoupper($book['accessionNo'])."</td>
                            <td>".$book['category']."</td>
                            <td>".$book['qty']."</td>
                            <td>".$book['price']."</td>
                            <td>".$book['availableQty']."</td>
                            <td><button class='active'>Edit</button></td>
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
        <td><button class="active">Edit</button></td>
       </tr> -->
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </section>