    <!-- data tables -->
    <div class="data-tables">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card card_border p-4">
            <div class="disp">
            <h2 class="card__title">All Members Info</h2>
    
            
            <!-- Add Member form -->

            <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add Member</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <?php include "member_form.php";?>


                        
                        </div>
                    </div>
                    </div>

                

            </div>  
         <!-- Add Member form End-->


            <input type="search" class="form-control col-md-3 member-search" id="search-input" placeholder="Search..." aria-label="Search for..." autocomplete="off" data-docs-version="4.4" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" style="position: relative; vertical-align: top;" dir="auto">
            </div>
            <div class="table-responsive">
              <table id="example" class="table display" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th>First Name</th>
                    <th>Image & last Name</th>
                    <th>Phone Number</th>
                    <th>Position</th>
                    <th>Added By</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                  <?php


                    $queryTwo = "SELECT * FROM members ORDER BY member_id DESC";
                    $select_members = mysqli_query($connection, $queryTwo);

                    while($row = mysqli_fetch_assoc($select_members)){
                        
                        $member_id = $row['member_id'];
                        $member_firstname = $row['member_firstname'];
                        $member_lastname = $row['member_lastname'];
                        $member_phonenumber = $row['member_phonenumber'];
                        $member_position = $row['member_position'];
                        $member_image = $row['member_image'];
                        $member_user_id = $row['member_user_id'];
                        

                        echo "<tr>";
                            echo "<td>$member_firstname</td>";
                            echo "<td><img src='../dashboard/all_images/members_image/{$member_image}' class='rounded-circle mr-2' width='40px' alt=''>
                        {$member_lastname}</td>";
                            echo "<td>{$member_phonenumber}</td>";
                            echo "<td>{$member_position}</td>";
                            echo "<td><span class='badge badge-success'>{$member_user_id}</span></td>";
                            echo "<td><a href='' class='btn btn-success'>View </a></td>";
                            echo "<td><a href='members.php?edit={$member_id}' class='btn btn-primary'>Edit </a></td>";
                            echo "<td><a href='members.php?delete={$member_id}' class='btn btn-danger'>Delete </a></td>";
                            
                        echo "</tr>";

                    }


                    if(isset($_GET['delete'])){

                        $the_member_id = $_GET['delete'];

                        $query =" DELETE FROM members WHERE member_id = {$the_member_id}" ;

                        $delete_user = mysqli_query($connection, $query);

                        header("location: members.php");

                        }   

                    // if(isset($_GET['delete'])){

                    //     $the_member_id = $_GET['delete'];
                    //     //delete and auto renumber id
                    //     $delete_query = "DELETE FROM members WHERE member_id = '$the_member_id';";
                    //     $delete_query .= "SET @num = 0;";
                    //     $delete_query .= "UPDATE members SET user_id = @num := (@num+1);";
                    //     $delete_query .= "ALTER TABLE members AUTO_INCREMENT =1;";

                    //     //$query = " DROP FROM users WHERE user_id = {$the_user_id}";

                    //     $delete_user = mysqli_multi_query($connection, $delete_query);

                    //     header("location: members.php");

                    //     }   

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