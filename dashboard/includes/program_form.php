<?php

// $err_message = "";
 echo '<pre>'; print_r($_POST); echo '</pre>';
//$num = $_POST['program_days'];

if(isset($_POST['add_program'])){
    $program_opening_prayer = $_POST['program_opening_prayer'];
    $program_worship = $_POST['program_worship'];
    $program_sermon = $_POST['program_sermon'];
    $program_sermon_prayer = $_POST['program_sermon_prayer'];
    // $member_dob = date('Y-m-d',(strtotime($member_dob)));
    $program_offering = $_POST['program_offering'];
    $program_closing_prayer = $_POST['program_closing_prayer'];
    $program_conductor = $_POST['program_conductor'];
    $program_theme = $_POST['program_theme'];
    //$theme = $_POST['theme'];
    //$program_theme = $theme;
    $program_date = $_POST['program_date'];
    //$program_date = date('Y-m-d', strtotime($pro_date));
   // $program_date = date_create_from_format('j-M-Y', $program_date);
   // print_r($program_date);
    $program_start_time = $_POST['program_start_time'];
    //$program_start_time = date("H:m:s", strtotime($program_start_time));
    //strtotime($_POST['program_start_time']);
    $program_end_time = $_POST['program_end_time'];
   // $program_end_time = date('H:m:s', strtotime($program_end_time));

    $numb = count($_POST['program_days']);
    
    //$numb = $numb - 1;

    // echo $numb;
    //$numb = count($_POST['program_sermon']);
    
    //echo $sumb;
//     echo $program_closing_prayer;
    // $member_image = $_FILES['member_image']['name'];
    // //move image to temperal file
    // $member_image_temp = $_FILES['member_image']['tmp_name'];

    // //move images to permanent location
    // move_uploaded_file($member_image_temp, "../dashboard/all_images/members_image/".$member_image);

    // $member_baptize = $_POST['member_baptize'];

    //     if ($member_baptize == "BAPTIZED") {
    //      $member_baptize = "BAPTIZED";
    //     } else {
    //         $member_baptize = "NOT BAPTIZED";
    //     }

    
    //$post_date = date('d-m-y');
    //$post_comment_count = 4;

    $program_user_id = $_POST['program_user_id'];
    //security 
      // Validations
      //program_worship, program_sermon, program_sermon_prayer,
     // '$program_worship', '$program_sermon','$program_sermon_prayer',
     $query = "INSERT INTO programs (program_user_id, program_opening_prayer, program_worship, program_sermon, program_sermon_prayer, ";
     $query .= "program_offering, program_closing_prayer, program_conductor, program_theme, ";
     $query .= "program_date, program_start_time, program_end_time) VALUES"; 

     for($i = 0; $i < $numb; $i++){           

    $query .= " ('".$program_user_id[$i]."', '".$program_opening_prayer[$i]."', '".$program_worship[$i]."', '".$program_sermon[$i]."', '".$program_sermon_prayer[$i]."', ";
    $query .= "'".$program_offering[$i]."', '".$program_closing_prayer[$i]."', '".$program_conductor[$i]."', '".$program_theme[$i]."', ";
    $query .= "'".$program_date[$i]."', '".$program_start_time[$i]."', '".$program_end_time[$i]."') ,";
     

      
     }
     $query = rtrim($query,",");
     $create_program = mysqli_query($connection, $query);
      if(!$create_program){
          echo "fail";
          //die("Query Failed ". mysqli_error($connection));
      }else{
        echo "success";
          //$err_message = "<h5 class='text-center p-3 mb-2 bg-success text-white'>User Created: </h5>"."<a href='../dashboard/programs.php' class='btn btn-primary text-center'>View Users</a>";
      }


    //   if(empty($program_theme) && empty($program_worship) && empty($program_sermon) && empty($program_opening_prayer) && empty($program_closing_prayer)){
  
    //      $err_message = "<h5 class='text-center p-3 mb-2 bg-danger text-white'>Please, These Fields Should <b>NOT be Empty</b>.</h5>";
  
    //   }else{


    //   }
     
}

?>




<div class="card card_border py-2 mb-4">

<div class="cards__heading tab">
    <h3>Weekly Program Form <span></span></h3>
    </div>    
    
<div class="card-body">

    <form action="" method="post" id="regForm">
        <h3 class="text-center">Theme For The Week: </h3>
        <?php
         $theme = $_POST['theme'];
        // $theme = ucwords($theme);

        // if($_POST['days']){
        //     echo "<h4 class='text-center'><strong>$theme</strong></h4> ";
        // }else{
        //     echo "<h4 class='text-center'><strong>$program_theme</strong></h4> ";
        // }
        // $theme = $_POST['theme'];
        // $theme = ucwords($theme);
         echo "<h4 class='text-center'><strong>$theme</strong></h4> ";
        ?>   
    
      <!-- form card -->
        
        <div id="accordion">

        <?php  
            $num = $_POST['days'];
            for($i = 1; $i <= $num; $i++){
                
            ?>

                <div class="card">
                    <div class="card-header" id="headingThree">
                    
                    <h4 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree<?php echo $i;?>" aria-expanded="false" aria-controls="collapseThree">
                        Program Forms For Day #<?php echo $i;?>
                        </button>
                    </h4>
                    </div>
                    <div id="collapseThree<?php echo $i;?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                    <h4 class='text-center'><strong>Day #<?php echo $i;?></strong></h4>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPassword4" class="input__label">Date</label>
                                <input type="date" class="form-control input-style datetime" id="inputPassword4" placeholder="YY-MM-DD" name="program_date[]">
                            </div> 

                            <div class="form-group col-md-2">
                                <label for="inputPassword4" class="input__label">Start time </label>
                                <input type="time" class="form-control input-style datetime" id="inputPassword4" placeholder="YY-MM-DD" name="program_start_time[]">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputPassword4" class="input__label">Closing Time</label>
                                <input type="time" class="form-control input-style" placeholder="YY-MM-DD" name="program_end_time[]">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Conductor</label>
                                <input type="text" class="form-control input-style" placeholder="Enter Name" name="program_conductor[]">
                            </div>

                        </div>
                        <input type="hidden" value="<?php echo $_SESSION['username'];?>" name="program_user_id[]" >
                        <input type="hidden" value="<?php echo $theme;?>" name="program_theme[]" >
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Opening Prayer</label>
                                <input type="text" class="form-control input-style" placeholder="Enter Name" name="program_opening_prayer[]">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Closing Prayer</label>
                                <input type="text" class="form-control input-style" placeholder="Enter Name" name="program_closing_prayer[]">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Worship</label>
                                <input type="text" class="form-control input-style" placeholder="Enter Name" name="program_worship[]">
                            </div>
                        </div>  

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Sermon</label>
                                <input type="text" class="form-control input-style" placeholder="Enter Name" name="program_sermon[]">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Prayer After Sermon</label>
                                <input type="text" class="form-control input-style" placeholder="Enter Name" name="program_sermon_prayer[]">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" class="input__label">Offering</label>
                                <input type="text" class="form-control input-style" placeholder="Enter Name" name="program_offering[]">
                            </div>
                        </div> 

                    </div>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $i;?>"  name="program_days[]">



               <?php } ?> 
                    
                    <div class="modal-footer float-right"> 
                        <!-- <ul class="pagination justify-content-center">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-primary" name="add_program">Add Program</button>
                            
                    </div>


            


        </div><!-- end for  id="accordion"-->
    </form>


</div> <!-- first card body end -->
    