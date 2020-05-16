<div class="card card_border py-2 mb-4">

<div class="cards__heading tab">
    <h3>Weekly Progeam Form <span></span></h3>
    </div>    
    
<div class="card-body">

    <form action="program_form.php" method="post" id="regForm">
        <h3 class="text-center">Add Program</h3>   
    
        <?php  
                    
        if(isset($_GET['form'])){
            $page = $_GET['form'];
        } else{
            $page = "";
        }


$num = $_POST['program_days'];

for($i = 1; $i <= $num; $i++){


?>  
<div  style="display: none;"  class="tabba">

        <div class="form-group">
            <label for="inputPassword4" class="input__label">Date Of Birth</label>
            <input type="datetime-local" class="form-control input-style datetime" id="inputPassword4" placeholder="YY-MM-DD" name="member_dob">
        </div> 
                                                                        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4" class="input__label">Openning Prayer</label>
                <input type="text" class="form-control input-style" id="inputEmail4" placeholder="First Name" name="member_firstname">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4" class="input__label">Worship</label>
                <input type="text" class="form-control input-style" id="inputPassword4" placeholder="Middle Name" name="member_middlename">
            </div>
        </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputEmail4" class="input__label">Last Name</label>
                    <input type="text" class="form-control input-style" id="inputEmail4" placeholder="Last Name" name="member_lastname">
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
                <input type="date" class="form-control input-style datetime" id="inputPassword4" placeholder="YY-MM-DD" name="member_dob">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress" class="input__label">Phone Number</label>
                <input type="text" class="form-control input-style" id="inputAddress" placeholder="0241000030" name="member_phonenumber">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress2" class="input__label">Address </label>
            <input type="text" class="form-control input-style" id="inputAddress2" placeholder="Apartment, studio, or floor" name="member_address">
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
                                    
                                        
                                   
                                    <div style="overflow:auto;">
                                        <div style="float:right;">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </div>

                                    <!-- <button onclick="mySlide('prev');"><</button>
                                    <button onclick="mySlide('next');">></button> -->
</div>    
<?php }?>

                        <div class="modal-footer">
                        <ul class="pagination justify-content-center">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Add Member</button>
                            
                        </div>
                        <input type="submit" class="btn btn-primary" name="add_theme" value="next"> 
</form>
</div>
<script>
var currentTab = '<?php echo $i;?>'; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
 // var x = '<?php //echo $num ;?>';
  
var x = document.getElementsByClassName("tabba");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 1) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  //fixStepIndicator(n)
}


function nextPrev(n) {
  // This function will figure out which tab to display
  var x = '<?php echo $num ;?>';
  //var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
</script>
<!-- <script>
            
            // var i = 0,images = ["../images/img1.png",
            //                     "../images/img2.png",
            //                     "../images/img3.png",
            //                     "../images/img4.png"];

        var i = 1;
        //var images = document.getElementById("programDays").value;
       
        var images = '<?php //echo $num ;?>';
        console.log(images);
                            
          function mySlide(param)
          {
              if(param === 'next')
              {
                  i++;
                  if(i === images.length){ i = images.length - 1; }
              }else{
                  i--;
                  if(i < 0){ i = 0; }
              }
              
              document.getElementById('slide').src = images[i];
          }
            
        </script> -->







        for($i = 0; $i <= $numb; $i++){
          $query .= "('".$program_opening_prayer[$i]."', '".$program_worship[$i]."', '".$program_sermon[$i]."', '".$program_sermon_prayer[$i]."', ";
          $query .= "'".$program_offering[$i]."', '".$program_closing_prayer[$i]."', '".$program_conductor[$i]."', '".$program_theme[$i]."', ";
          $query .= "'".$program_date[$i]."', '".$program_start_time[$i]."', '".$program_end_time[$i]."'),";
      }