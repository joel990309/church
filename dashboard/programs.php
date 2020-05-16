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

     <!-- Members Content -->
    

     <?php
                        //Display Alot of Pages with switch statement
                            if(isset($_GET['program'])){
                                $program = $_GET['program'];
                            } else{
                                // without else statement the switch statement will give error...just assign to an empty string
                                $program = '';
                            }
                        
                            switch($program){
                                case 'add_program';
                                include "includes/add_program.php";
                                    break;

                                case 'edit_user';
                                include "includes/edit_user.php";
                                    break;

                                
                                case 'program_form';
                                include "includes/program_form.php";
                                    break;

                                default:
                                    include "includes/view_all_programs.php";
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