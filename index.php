<?php include "dashboard/includes/db.php";?>
<?php session_start(); ?>
<?php ob_start(); ?>

<?php

if(isset($_POST['login'])) {
	
	$username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);

    $password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE username = '{$username}'";

    $select_username = mysqli_query($connection, $query);

    if(!$select_username){

        die("Query Failed ".mysqli_error($connection));

    }

    while ($row = mysqli_fetch_array($select_username)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
        $db_user_image = $row['user_image'];
        //this is just to reverse the the crypt password to the normal password for login
        $password = crypt($password, $db_user_password);

        
    }

    if($username === $db_username && $password === $db_user_password) {
		$_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
		$_SESSION['user_image'] = $db_user_image;
		//echo "login sucessful";	
		header("Location: dashboard/index.php");
		exist;
    }else {
        header("Location: index.php");
    }




}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Church App: Login</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Trendz Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<!--/Style-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--//Style-CSS -->
</head>

<body>
	<!-- /login-section -->

	<section class="w3l-forms-23">
		<div class="forms23-block-hny">
			<div class="wrapper">
				<h1>C.O.P Database System</h1>
				<!-- if logo is image enable this   
					<a class="logo" href="index.html">
					  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
					</a> 
				-->
				<div class="d-grid forms23-grids">
					<div class="form23">
						<div class="main-bg">
							<h6 class="sec-one">Redemption Assembly</h6>
							<div class="speci-login first-look">
								<img src="images/user.png" alt="" class="img-responsive">
							</div>
						</div>
						<div class="bottom-content">
							<form action="" method="post">
								<input type="text" name="username" class="input-form" placeholder="Your Username"
										 />
								<input type="password" name="password" class="input-form"
										placeholder="Your Password"  />
								<button type="submit" class="loginhny-btn btn" name="login">Login</button>
							</form>
							<p>Not a member yet? <a href="#">Join Now!</a></p>
						</div>
					</div>
				</div>
				<div class="w3l-copy-right text-center">
					<p>© 2020 Redemption Assembly Database. All rights reserved | Design by
						<a href="http://w3layouts.com/" target="_blank">Joel</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- //login-section -->
</body>

</html>