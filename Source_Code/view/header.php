<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/styles.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>U-Media</title>
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
</head>
<header>
        <div class="header">
            <label ><img class="logo" src="../assets/Misc/logo.png" alt=""></label>
            <nav>
                <input type="checkbox" id="check"><!-- id="check"-->
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <?php
                    if(isset($_SESSION["Login"]))
                    {
                        echo '<li><a href="aboutUs.php">About Us</a></li>';
                        echo
                        '<li><a href="home.php">Home</a></li>
                        <input type="checkbox" id="clicked" >
                        <label for="clicked" class="profilebtn">
                            <i class="fas fa-user-circle" alt="Internet_connection_problem"></i>
                        </label>
                        <div class="dropdown">
                            <li><a href="profile.php?id='.$_SESSION['UserID'].'">Profile Page</a></li>
                            <li><a href="editProfile.php?id='.$_SESSION['UserID'].'">Edit Profile</a></li>
                            <li><a href="../controller/logout.php">Log Out</a></li>
                        </div>';
                    }
                    else
                    {
                        echo '<li><a href="aboutUs.php">About Us</a></li>';
                        echo '<li><a href="../index.php">Log In</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>