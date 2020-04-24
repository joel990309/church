<?php include "includes/admin-header.php";?>

  <!-- sidebar nav start -->

  <?php include "includes/admin-sidebar.php";?>

  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  

<!-- notification menu start top navbar -->
<?php include "includes/admin-notification.php";?>

  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">

     <!-- User Content -->
    

     <?php
                        //Display Alot of Pages with switch statement
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            } else{
                                // without else statement the switch statement will give error...just assign to an empty string
                                $source = '';
                            }
                        
                            switch($source){
                                case 'add_user';
                                include "includes/add_user.php";
                                    break;

                                case 'edit_user';
                                include "includes/edit_user.php";
                                    break;

                                // case isset($_POST['add_user']);
                                // include "includes/add_user.php";
                                //     break;

                                default:
                                    include "includes/view_all_users.php";
                                break;
                            }
                        
                        
                        ?>




    <!-- End Admin Content -->


  </div>
  <!-- //content -->
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
  <?php include("includes/admin-footer.php"); ?>