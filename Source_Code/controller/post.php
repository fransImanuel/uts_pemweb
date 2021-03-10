<?php
    session_start();
    include '../model/database.php';
    $MrPost = $_SESSION['UserID'];
    $Content = $_POST['PostContent'];
    $ImgContent = UploadedFile();
    if(!$ImgContent)
    {
        if($Content != '')
        {
            $query = "INSERT INTO posts(UserID,Content,PostDate,PostTime) VALUES ($MrPost,'$Content',CURDATE(),CURTIME())";
        }
    }
    else
    {
        if($Content == '')
        {
            $query = "INSERT INTO posts(UserID,ImgContent,PostDate,PostTime) VALUES ($MrPost,'$ImgContent',CURDATE(),CURTIME())";
        }
        else
        {
            $query = "INSERT INTO posts(UserID,ImgContent,Content,PostDate,PostTime) VALUES ($MrPost,'$ImgContent','$Content',CURDATE(),CURTIME())";
        }
    }
    
    if($Content!=''||$ImgContent!='')
    {
        $connect->query($query);
    }
    if(isset($_POST['Prof']))
    {
        header('location:../view/profile.php?id='.$MrPost.'');
    }
    else
    {
        header("location:../view/home.php");
    }
    

    function UploadedFile()
    {   
        $NamaFile = $_FILES['PostIMG']['name'];
        $UkuranFile = $_FILES['PostIMG']['size'];
        $ErrorFile = $_FILES['PostIMG']['error'];
        $LokasiFile = $_FILES['PostIMG']['tmp_name'];
        $AcceptedExtension = ['jpg','jpeg','png'];
        $EkstensiGambar = explode('.',$NamaFile);
        $EkstensiGambar = strtolower(end($EkstensiGambar));
        if($ErrorFile == 4)
        {
            return false;
        }
        if(!in_array($EkstensiGambar,$AcceptedExtension))
        {
            return false;
        }
        if($UkuranFile > 5242880)
        {
            return false;
        }
        
        $NamaFile = uniqid();
        $NamaFile .='.';
        $NamaFile .= $EkstensiGambar;
        
        move_uploaded_file($LokasiFile,'../assets/Posts/'.$NamaFile);
        
        return $NamaFile;
    }
?>