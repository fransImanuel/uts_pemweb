<?php
    include '../model/database.php';
    $UserID = htmlspecialchars($_POST['UserID']);
    $FileType = 'PP_IMG';
    $OLDIMG = $_POST['PP'];
    $PP_IMG = UploadedFile();
    $FileType = 'BG_IMG';
    $OLDIMG = $_POST['BG'];
    $BG_IMG = UploadedFile();
    $NickName = $_POST['NickName'];
    $FName = $_POST['FirstName'];
    $LName = $_POST['LastName'];
    $BirthDay = $_POST['Birthday'];
    
    if($_POST['Password']!='')
    {
        $query = "SELECT * FROM users WHERE UserID = '$UserID'";
        $result = $connect->query($query);
        foreach($result as $salt)
        {
            $Salt = $salt['salt'];
        }
        $Password = $_POST['Password'].$Salt;
        $Password = md5($Password);
        $query = 'UPDATE users SET FirstName = "'.$FName.'",LastName = "'.$LName.'", Birthday = "'.$BirthDay.'", Profile = "'.$PP_IMG.'",NickName = "'.$NickName.'",BG_IMG = "'.$BG_IMG.'" ,Password = "'.$Password.'" WHERE UserID = '.$UserID.'';
    }
    else
    {
        $query = 'UPDATE users SET FirstName = "'.$FName.'",LastName = "'.$LName.'", Birthday = "'.$BirthDay.'", Profile = "'.$PP_IMG.'",NickName = "'.$NickName.'",BG_IMG = "'.$BG_IMG.'" WHERE UserID = '.$UserID.'';
    }
    
    
    $connect->query($query);
    

    header('location:../view/profile.php?id='.$UserID.'');


    function UploadedFile()
    {
        global $FileType;
        global $OLDIMG;    
        $NamaFile = $_FILES[$FileType]['name'];
        $UkuranFile = $_FILES[$FileType]['size'];
        $ErrorFile = $_FILES[$FileType]['error'];
        $LokasiFile = $_FILES[$FileType]['tmp_name'];
        $AcceptedExtension = ['jpg','jpeg','png'];
        $EkstensiGambar = explode('.',$NamaFile);
        $EkstensiGambar = strtolower(end($EkstensiGambar));
        if($ErrorFile == 4)
        {
            return $OLDIMG;
        }
        if(!in_array($EkstensiGambar,$AcceptedExtension))
        {
            return $OLDIMG;
        }
        if($UkuranFile > 5242880)
        {
            return $OLDIMG;
        }
        
        $NamaFile = uniqid();
        $NamaFile .='.';
        $NamaFile .= $EkstensiGambar;
        
        move_uploaded_file($LokasiFile,'../assets/'.$FileType.'/'.$NamaFile);
        
        return $NamaFile;
    }
?>