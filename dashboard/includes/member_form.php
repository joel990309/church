<?php

$err_message = "";

if(isset($_POST['add_member'])){
   
    $member_firstname= $_POST['member_firstname'];
    $member_middlename = $_POST['member_middlename'];
    $member_lastname = $_POST['member_lastname'];
    $member_dob = $_POST['member_dob'];
    //$member_dob = data(d/m/y);
    $member_dob = date('Y-m-d',(strtotime($member_dob)));
    $member_sex = $_POST['member_sex'];
    $member_phonenumber= $_POST['member_phonenumber'];
    $member_address = $_POST['member_address'];
    $member_city = $_POST['member_city'];
    $member_position = $_POST['member_position'];
    $member_rel_status = $_POST['member_rel_status'];

    $member_image = $_FILES['member_image']['name'];
    //move image to temperal file
    $member_image_temp = $_FILES['member_image']['tmp_name'];

    //move images to permanent location
    move_uploaded_file($member_image_temp, "../dashboard/all_images/members_image/".$member_image);

    $member_baptize = $_POST['member_baptize'];

        if ($member_baptize == "BAPTIZED") {
         $member_baptize = "BAPTIZED";
        } else {
            $member_baptize = "NOT BAPTIZED";
        }

    
    //$post_date = date('d-m-y');
    //$post_comment_count = 4;


    //security 
      // Validations


      if(empty($member_firstname) && empty($member_lastname) && empty($member_dob) && empty($member_phonenumber) && empty($member_baptize)){
  
         $err_message = "<h5 class='text-center p-3 mb-2 bg-danger text-white'>Please, These Fields Should <b>NOT be Empty</b>.</h5>";
  
      }else{

         $member_user_id = $_SESSION['username'];

            // $query = "SELECT user_firstname FROM users WHERE username = '".$_SESSION['username']."'";

            // $memeber_user_select = mysqli_query($connection, $query);

            // $memeber_user_id = mysqli_fetch_row($memeber_user_select);
          //we deleted the post_comment_count in the query to make it dynamic with $post_comment_count
            $query = "INSERT INTO members( member_user_id, member_firstname, member_middlename, member_lastname, member_dob, member_sex, member_phonenumber, ";
            $query .= "member_address, member_city, member_position, member_rel_status, member_image, member_baptize) ";
            $query .= "VALUES( '$member_user_id', '$member_firstname', '$member_middlename', '$member_lastname', '$member_dob', '$member_sex', '$member_phonenumber', ";
            $query .= "'$member_address', '$member_city', '$member_position', '$member_rel_status', '$member_image', '$member_baptize') ";
            $create_member = mysqli_query($connection, $query);
  
            if(!$create_member){
                die("Query Failed ". mysqli_error($connection));
            }else{
                //$err_message = "User Created: "."<a href='../dashboard/users.php' class='btn btn-primary'>View Users</a>";
                $err_message = "<h5 class='text-center p-3 mb-2 bg-success text-white'>User Created: </h5>"."<a href='../dashboard/users.php' class='btn btn-primary text-center'>View Users</a>";
            }
      }
     
}

?>





<form action="" method="post" enctype="multipart/form-data" >
                                <div class="form-row">
                                <?php echo $err_message; ?>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4" class="input__label">First Name</label>
                                        <input type="text" class="form-control input-style" id="inputEmail4"
                                            placeholder="First Name" name="member_firstname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="input__label">Middle Name</label>
                                        <input type="text" class="form-control input-style" id="inputPassword4"
                                            placeholder="Middle Name" name="member_middlename">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputEmail4" class="input__label">Last Name</label>
                                        <input type="text" class="form-control input-style" id="inputEmail4"
                                            placeholder="Last Name" name="member_lastname">
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label for="inputState" class="input__label">Sex</label>
                                        <select id="inputState" class="form-control input-style" name="member_sex">
                                            <option>Choose...</option>
                                            <option value="MALE">M</option>
                                            <option value="FEMALE">F</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="input__label">Date Of Birth</label>
                                        <input type="date" class="form-control input-style datetime" id="inputPassword4"
                                            placeholder="YY-MM-DD" name="member_dob">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress" class="input__label">Phone Number</label>
                                        <input type="text" class="form-control input-style" id="inputAddress"
                                            placeholder="0241000030" name="member_phonenumber">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="input__label">Address </label>
                                    <input type="text" class="form-control input-style" id="inputAddress2"
                                        placeholder="Apartment, studio, or floor" name="member_address">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="input__label">City</label>
                                        <input type="text" class="form-control input-style" id="inputCity" name="member_city">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="input__label">Position</label>
                                        <select id="inputState" class="form-control input-style" name="member_position">
                                            <option value="MEMBER">Choose...</option>
                                            <option value="PASTOR">PASTOR</option>
                                            <option value="ELDER">ELDER</option>
                                            <option value="DEACON">DEACON</option>
                                            <option value="DEACONESS">DEACONESS</option>
                                            <option value="MEMBER">MEMBER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="input__label">Relationship Status</label>
                                        <select id="inputState" class="form-control input-style" name="member_rel_status">
                                            <option value="ASSITANT" selected>Choose...</option>
                                            <option value="SINGLE">SINGLE</option>
                                            <option value="MARRIED">MARRIED</option>
                                            <option value="WIDOWED">WIDOWED</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip" class="input__label">Member Image</label>
                                        <input type="file" class="form-control input-style" id="inputZip" name="member_image">
                                    </div>
                                </div>
                                <div class="form-check check-remember check-me-out">
                                    <input class="form-check-input checkbox" type="checkbox" id="gridCheck" name="member_baptize" value="BAPTIZED">
                                    <label class="form-check-label checkmark" for="gridCheck">
                                        Baptized
                                    </label>
                                </div>
                            
             
                            <!-- forms 2 -->
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="add_member">Add Member</button>
                            </form>
                        </div>