<?php

if(isset($_POST['add_theme'])){

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $start    = new DateTime($start_date);
    $end      = new DateTime($end_date);
    $interval = new DateInterval('P1D');
    $period   = new DatePeriod($start, $interval, $end);

    foreach ($period as $day) {
        // Do stuff with each $day...
        $tag[]  = "('".$day->format('y-m-d')."')"; // Change this line

    }
    
    $values = implode(",", $tag);
    
    $sql = "INSERT INTO programs (program_date) VALUES ".$values;
    $p_query = mysqli_query($connection, $sql);


    //$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $query_id = "SELECT program_id FROM programs";
    $program_id = mysqli_query($connection, $query_id);
    $rows = mysqli_fetch_array($program_id);
    echo $rows;    
    foreach($rows as $row){
        echo '<pre>'; print_r($row); echo '</pre>'; 
    }
    $theme = $_POST['theme'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
if (!$p_query) {
    # code...
    echo "<h3>Something Went Wrong</h3>";
}
else{
    $pro_query = "UPDATE programs SET ";
    $pro_query .= "program_theme = '$theme', ";
    $pro_query .= "program_start_time = $start_time, ";
    $pro_query .= "program_end_time = $end_time, ";
    $pro_query .= "WHERE program_id = {$program_id}";
        
    $update_user = mysqli_query($connection, $pro_query);

    echo "<h3>Successful</h3>";
}
    
    // $sql_second = "INSERT INTO programs (program_theme, program_start_time, program_end_time) VALUES ($theme, $start_date, $end_time)";
    // $pd_query = mysqli_query($connection, $sql_second);

    //$post_date = date('d-m-y');
    //$post_comment_count = 4;


    //security 
      // Validations


    //   if(empty($theme) && empty($values) && empty($time_all)){
  
    //      $err_message = "<h5 class='text-center p-3 mb-2 bg-danger text-white'>Please, These Fields Should <b>NOT be Empty</b>.</h5>";
  
    //   }else{

         
    //         $query = "INSERT INTO members( member_user_id, member_firstname, member_middlename, member_lastname, member_dob, member_sex, member_phonenumber, ";
    //         $query .= "member_address, member_city, member_position, member_rel_status, member_image, member_baptize) ";
    //         $query .= "VALUES( '$member_user_id', '$member_firstname', '$member_middlename', '$member_lastname', '$member_dob', '$member_sex', '$member_phonenumber', ";
    //         $query .= "'$member_address', '$member_city', '$member_position', '$member_rel_status', '$member_image', '$member_baptize') ";
    //         $create_member = mysqli_query($connection, $query);
  
    //         if(!$create_member){
    //             die("Query Failed ". mysqli_error($connection));
    //         }else{
    //             //$err_message = "User Created: "."<a href='../dashboard/users.php' class='btn btn-primary'>View Users</a>";
    //             $err_message = "<h5 class='text-center p-3 mb-2 bg-success text-white'>User Created: </h5>"."<a href='../dashboard/users.php' class='btn btn-primary text-center'>View Users</a>";
    //         }
     // }
     
}

?>



<div class="card card_border py-2 mb-4">

<div class="cards__heading">
    <h3>Weekly Progeam Form <span></span></h3>
    </div>    

<div class="card-body">
    <form action="" method="post">
        <h3 class="text-center">Add Program</h3>
        <div class="form-group">
            <label for="inputAddress" class="input__label">Theme for The Week</label>
            <input type="text" class="form-control input-style" id="inputAddress" placeholder="Theme" name="theme">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4" class="input__label">Start Date</label>
                <input type="date" class="form-control input-style" id="inputEmail4" placeholder="Last Name" name="start_date">
            </div>
                                        
            <div class="form-group col-md-6">
                <label for="inputEmail4" class="input__label">End Date</label>
                <input type="date" class="form-control input-style" id="inputEmail4" placeholder="Last Name" name="end_date">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4" class="input__label">Start Time</label>
                <input type="time" class="form-control input-style" id="inputEmail4" placeholder="Last Name" name="start_time">
            </div>
                                        
            <div class="form-group col-md-6">
                <label for="inputEmail4" class="input__label">End Time</label>
                <input type="time" class="form-control input-style" id="inputEmail4" placeholder="Last Name" name="end_time">
            </div>
        </div>
        <div class="form-group float-right">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary" name="add_theme">Next</button>                     
        </div>
    </form>
</div>