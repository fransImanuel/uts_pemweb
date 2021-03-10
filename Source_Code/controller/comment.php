<?php
    session_start();
    include '../model/database.php';
    $Commentator = $_POST['Commentator'];
    $CommentContent = $_POST['CommentContent'];
    $CommentPost = (int)$_POST['PID'];
    $query = "INSERT INTO comments(PostID,Commentator,Text,CommentDate,CommentTime) VALUES($CommentPost,$Commentator,'$CommentContent',CURDATE(),CURTIME())";
    $connect->query($query);
    header("location:../view/home.php");  
?>