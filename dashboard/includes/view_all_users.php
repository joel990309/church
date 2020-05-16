    <!-- data tables -->
    <div class="data-tables">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card card_border p-4">
            <div class="disp">
            <h2 class="card__title">All Users Info</h2>

            <input type="search" class="form-control col-md-3 member-search" id="search-input" placeholder="Search..." aria-label="Search for..." autocomplete="off" data-docs-version="4.4" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" style="position: relative; vertical-align: top;" dir="auto">
            </div>
            <div class="table-responsive">
              <table id="example" class="table display" style="width:100%">
                <thead class="thead-light">
                  <tr>
                  <th>User Id</th>
                    <th>User Id</th>
                    <th>Image & Name</th>
                    <th>User Name</th>
                    <th>User Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                  <?php


                    $queryTwo = "SELECT * FROM users";
                    $select_users = mysqli_query($connection, $queryTwo);


                    // $user_id_count =  mysqli_num_rows($select_users);
                    // echo "<tr>";
                    //         for($i = 1; $i <= $user_id_count; $i++){
                    //           echo "<td>$i</td>";
                    //         }

                    while($row = mysqli_fetch_assoc($select_users)){
                        
                        $user_id = $row['user_id'];
                        $username = $row['username'];
                        $user_password = $row['user_password'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_image = $row['user_image'];
                        $user_role = $row['user_role'];
                        $user_count = $row['user_count'];

                        echo "<tr>";
                            echo "<td>$user_id</td>";
                            echo "<td><img src='../dashboard/all_images/user_images/{$user_image}' class='rounded-circle mr-2' width='40px' alt=''>
                        {$user_firstname}</td>";
                            echo "<td>{$username}</td>";
                            
                            echo "<td><span class='badge badge-success'>{$user_role}</span></td>";
                            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}' class='btn btn-primary'>Edit </a></td>";
                            echo "<td><a href='users.php?delete={$user_id}' class='btn btn-danger'>Delete </a></td>";
                            
                        echo "</tr>";

                    }

                    if(isset($_GET['delete'])){

                        $the_user_id = $_GET['delete'];
                        //delete and auto renumber id
                        $delete_query = "DELETE FROM users WHERE user_id = '$the_user_id';";
                        $delete_query .= "SET @num = 0;";
                        $delete_query .= "UPDATE users SET user_id = @num := (@num+1);";
                        $delete_query .= "ALTER TABLE users AUTO_INCREMENT =1;";

                        //$query = " DROP FROM users WHERE user_id = {$the_user_id}";

                        $delete_user = mysqli_multi_query($connection, $delete_query);

                        header("location: users.php");

                        }   

                        // $delete_query = "DELETE FROM `gallerycontent` WHERE `pic_id` = '$delete_id';";
                        // $delete_query .= "SET @num = 0;";
                        // $delete_query .= "UPDATE `gallerycontent` SET `pic_id` = @num := (@num+1);";
                        // $delete_query .= "ALTER TABLE `gallerycontent` AUTO_INCREMENT =1;";

                  ?>
                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- if($_SESSION['username'] == $username){
                            echo "<td><a href='users.php?delete={$user_id}' class='btn btn-danger'>bbbbb </a></td>";
                           }else{
                               echo "ACTIVE";
                            } -->

<!-- <script>
     $(document).ready(function(){
        $('#search-input').keyup(function(){
            var search = ('#search-input').val();

            alert(search);
        });
    });

 </script> -->