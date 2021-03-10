<?php
    session_start();
    include '../model/database.php';
    $id = $_GET['id'];
    $Commentator = $_POST['Commentator'];
    $CommentContent = $_POST['CommentContent'];
    $CommentPost = (int)$_POST['PID'];
    $query = "INSERT INTO comments(PostID,Commentator,Text,CommentDate,CommentTime) VALUES($CommentPost,$Commentator,'$CommentContent',CURDATE(),CURTIME())";
    $connect->query($query);
    header("location:../view/profile.php?id=$id");  
?>