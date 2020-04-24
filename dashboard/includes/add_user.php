<?php

$err_message = "";

if(isset($_POST['add_user'])){
   
    $user_firstname= $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_count = $_POST['user_count'];

    $user_image = $_FILES['user_image']['name'];
    //move image to temperal file
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    //move images to permanent location
    move_uploaded_file($user_image_temp, "../dashboard/all_images/user_images/".$user_image);

    $user_password= $_POST['user_password'];
    //$post_date = date('d-m-y');
    //$post_comment_count = 4;


    //security
    $user_firstname = htmlspecialchars($user_firstname);
    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_firstname = preg_replace('/\s+/', '', $user_firstname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_lastname = preg_replace('/\s+/', '', $user_lastname);

    // Validations
    //First Letter Capital
    $user_firstname = ucwords($user_firstname);
    $user_lastname = ucwords($user_lastname);


      if(empty($user_firstname) && empty($user_lastname) && empty($username) && empty($user_role) && empty($user_password)){
  
          $err_message = "<h5 class='text-center p-3 mb-2 bg-danger text-white'>Please, These Fields Should <b>NOT be Empty</b>.</h5>";
  
      }else{

        $querySalt = " SELECT ranSalt FROM users";
        $select_hash = mysqli_query($connection, $querySalt);
        if(!$select_hash){
            die('Query Failed '.mysqli_error($connection));
        }
            //encrypting password or hashing password
        $row = mysqli_fetch_array($select_hash);
        $salt = $row['ranSalt'];
        $user_password = crypt($user_password, $salt);



        $query = "SELECT * FROM users";

        $category_select = mysqli_query($connection, $query);

        $cool_count = mysqli_num_rows($category_select);
          //we deleted the post_comment_count in the query to make it dynamic with $post_comment_count
          $query = "INSERT INTO users( user_firstname, user_lastname, user_role, username, user_password, user_image, user_count) ";
  
          $query .= "VALUES('$user_firstname', '$user_lastname', '$user_role', '$username', '$user_password', '$user_image', $cool_count+1) ";
  
          $create_user = mysqli_query($connection, $query);
  
          if(!$create_user){
              die("Query Failed ". mysqli_error($connection));
          }else{
              //$err_message = "User Created: "."<a href='../dashboard/users.php' class='btn btn-primary'>View Users</a>";
              $err_message = "<h5 class='text-center p-3 mb-2 bg-success text-white'>User Created: </h5>"."<a href='../dashboard/users.php' class='btn btn-primary text-center'>View Users</a>";
          }
      }
     
}

?>

 
 <!-- forms 2 -->
 <section class="forms">
            <!-- forms 1 -->
    <div class="card card_border py-2 mb-4">

                <div class="cards__heading">
                    <h3>User Form <span></span></h3>
                    <?php echo $err_message; ?>
                </div>    
      
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Username</label>
                                <input type="text" class="form-control input-style" id="inputEmail4"
                                    placeholder="Username" name="username">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Password</label>
                                <input type="password" class="form-control input-style" id="inputPassword4"
                                    placeholder="Password" name="user_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="input__label">First Name</label>
                            <input type="text" class="form-control input-style" id="inputAddress"
                                placeholder="First Name" name="user_firstname">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2" class="input__label">Last Name</label>
                            <input type="text" class="form-control input-style" id="inputAddress2"
                                placeholder="Last Name" name="user_lastname">
                        </div>
                        <div class="form-row">
                           <!-- <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">City</label>
                                <input type="text" class="form-control input-style" id="inputCity">
                            </div> -->
                            <div class="form-group col-md-6">
                                <label for="inputState" class="input__label">User Role</label>
                                <select id="inputState" class="form-control input-style" name="user_role">
                                    <option value="ASSITANT" selected>Choose...</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="ASSITANT">ASSITANT</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip" class="input__label">Profile Image</label>
                                <input type="file" class="form-control input-style" id="inputZip" name="user_image">
                            </div>
                        </div>

                        <input type="hidden" name="user_count">

                       <!-- <div class="form-check check-remember check-me-out">
                            <input class="form-check-input checkbox" type="checkbox" id="gridCheck">
                            <label class="form-check-label checkmark" for="gridCheck">
                                Check me out
                            </label>
                        </div>-->
                        <button type="submit" class="btn btn-success btn-style mt-4" name="add_user">Create User</button>
                    </form>
                </div>
            
            <!-- //forms 2 -->

    
    

</div>
</section>
 