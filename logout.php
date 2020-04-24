<?php include "dashboard/includes/db.php";?>
<?php session_start(); ?>
<?php ob_start(); ?>

<?php


        $_SESSION['username'] = null;
        $_SESSION['user_firstname'] = null;
        $_SESSION['user_lastname'] = null;
        $_SESSION['user_role'] = null;

       // echo "Logout";
        header("Location: index.php");

?>

