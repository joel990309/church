<div class="card card_border py-2 mb-4">

<div class="cards__heading">
    <h3>Weekly Progeam Form <span></span></h3>
    </div>    

<div class="card-body">
    <form action="programs.php?program=program_form" method="post">
        <h3 class="text-center">Add Program</h3>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-9">
                <label for="inputEmail4" class="input__label">Theme for The Week</label>
                <input type="text" class="form-control input-style" placeholder="Last Name" name="theme">
            </div>
                                        
            <div class="form-group col-md-2">
                <label for="inputEmail4" class="input__label">Days</label>
                <input type="text" class="form-control input-style" id="programDays" placeholder="Number Of Days" name="days">
            </div>
        </div>
        
        <div class="form-group float-right">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            onclick="window.location.href = 'https://w3docs.com';"
            <button type="submit" class="btn btn-primary" name="add_theme"><a href="programs.php?program=program_form">Next</a></button> 
        -->
            <input type="submit" class="btn btn-primary" name="add_theme" value="next">    
        </div>
    </form>
</div>