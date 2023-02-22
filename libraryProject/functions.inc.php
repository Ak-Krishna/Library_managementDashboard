<?php
require_once "./database/dbConn.php";
   
// FUNCTION TO GET THE CATEGORY COUNT
function get_dashboard_count(){
    $sql = "SELECT COUNT(`srno`) AS `book` FROM `book`; SELECT COUNT(`category`) AS `category` FROM `category`; SELECT COUNT(`srno`) AS `student` FROM `student`; SELECT COUNT(`branchId`) AS `branch` FROM `branch`; SELECT COUNT(`srno`) AS `issued` FROM `issued`; SELECT COUNT(`srno`) AS `returned` FROM `returned`; SELECT COUNT(`id`) AS `admin` FROM `admin`;";
    global $mysqli;

    $results = array();

    try {
        if($mysqli -> multi_query($sql)){
            do {
                // Store first result set
                if ($result = $mysqli -> store_result()) {
                  while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
                    $results = array_merge($results, $row);
                  }
                 $result -> free_result();
                }
                // if there are more result-sets, the print a divider
                // if ($mysqli -> more_results()) {
                //   printf("-------------\n");
                // }

                //Prepare next result set
              } while ($mysqli -> next_result());
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    } finally{
        return $results;
    }
}

function get_all_category(){
    $sql = "SELECT `srno`, `category` FROM `category` ORDER BY `category`;";
    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli -> query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    } finally{
        return $results;
    }
}

function get_all_branch(){
    $sql = "SELECT * FROM `branch` ORDER BY `branch`";
    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli -> query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    } finally{
        return $results;
    }
}

function escape_and_lower($value){
    return strtolower(htmlspecialchars($value));
}

function fetch_book(){
    $sql = "SELECT *, category.category FROM `book` LEFT JOIN `category` ON book.categoryId=category.srno;";
    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli->query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th->getMessage();
    } finally{
        return $results;
    }
}


function fetch_returned_book(){
    $sql = "SELECT *, student.name, student.email, student.contact, student.class, student.year, student.branchId, book.title, book.author, book.availableQty, book.status
    FROM `returned`
    LEFT JOIN `student` ON returned.prn = student.prn
    LEFT JOIN `book` ON returned.accessionNo = book.accessionNo
    LEFT JOIN `category` ON book.categoryId = category.srno";
    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli->query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th->getMessage();
    } finally{
        return $results;
    }

}

function fetch_issued_book(){
    $sql = "SELECT *, student.name, student.email, student.contact, student.class, student.year, student.branchId, book.title, book.author, book.availableQty, book.status
    FROM `issued`
    LEFT JOIN `student` ON issued.prn = student.prn
    LEFT JOIN `book` ON issued.accessionNo = book.accessionNo
    LEFT JOIN `category` ON book.categoryId = category.srno
    LEFT JOIN `branch` ON student.branchId = branch.branchId";
    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli->query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th->getMessage();
    } finally{
        return $results;
    }
}

function fetch_overall_student_data(){
    $sql = "SELECT branch, count(student.srno) AS `count` from `branch`
    LEFT JOIN `student` ON student.branchId=branch.branchId
    GROUP BY branch.branch ORDER BY branch.branch;";

    global $mysqli;
    $results = array();

    try {
        if($result = $mysqli->query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th->getMessage();
    } finally{
        return $results;
    }

}

function fetch_student($branch){
    global $mysqli;
    $results = array();


    if(!is_null($branch)){
        $sql = "SELECT * FROM `student`
        LEFT JOIN `branch` ON student.branchId=branch.branchId
        WHERE branch.branch='$branch' ORDER BY student.name;";
    }else{
        return $results;
    }

    try {
        if($result = $mysqli -> query($sql)){
            $results = $result -> fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    } finally{
        return $results;
    }
}

// FUNCTION TO GENERATE UNIQUE USER TOKEN
function generateToken(){
    $randomValue = random_bytes(10);
    $token = bin2hex($randomValue);
    $results = array();

    global $mysqli;

    $sql = "SELECT COUNT(`token`) AS `count` FROM `admin` WHERE 'token'='$token';";

    try {
        if($result = $mysqli->query($sql)){
            $results = $result->fetch_all(MYSQLI_ASSOC);
            array_push($results, $token);
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    }finally{
        return $results;
    }
}

// FUNCTION TO FETCH ADMIN
function fetch_admin($emailId){
    global $mysqli;
    $results=array();

    if(!is_null($emailId)){
        $sql = "SELECT `id`, `username`, `email`, `password` FROM `admin` WHERE `email`='$emailId';";
    }else{
        $sql = "SELECT `id`,`username`,`email`,`contact`,`status`,`registeredOn` FROM `admin`;";
    }

    
    try {
        if($result = $mysqli->query($sql)){
            $results = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Throwable $th) {
        echo $th -> getMessage();
    } finally{
        return $results;
    }
}

?>