<?php
    include '../model/database.php';
    $FirstName = htmlspecialchars($_POST['FirstName']);
    $LastName = htmlspecialchars($_POST['LastName']);
    $Email = strtolower(htmlspecialchars($_POST['Email']));
    $BirthDay = date($_POST['BirthDate']);
    $Gender = htmlspecialchars($_POST['Gender']);    
    $Password = htmlspecialchars($_POST['Password']);
    $ConfirmPassword = htmlspecialchars($_POST['ConfirmPassword']);
    $defaultBG = "BGDef.png";
    $defaultPP = "default-profile.svg";
    $query = "SELECT COUNT(*) FROM users WHERE Email = '$Email'";
    $result2 = $connect->query($query);
    foreach($result2 as $curr)
    {
        $result = $curr["COUNT(*)"];
    }
    
    if($FirstName!=''&&$Password!=''&&$Email!=''&&$BirthDay!=''&&$Gender!=''&&$Password == $ConfirmPassword &&$result == 0 && filter_var($Email,FILTER_VALIDATE_EMAIL))
    {
        $Salt = substr($FirstName,2).substr($LastName,2);
        $Password = md5($Password.$Salt);
        if($FirstName == $LastName)
        {
            $query = "INSERT INTO users(FirstName,LastName,NickName,Email,Birthday,Gender,Password,Salt,BG_IMG,Profile) VALUES('$FirstName',NULL,'$FirstName','$Email','$BirthDay','$Gender',$Password','$Salt','$defaultBG','$defaultPP')";
        }
        else
        {
            $query = "INSERT INTO users(FirstName,LastName,NickName,Email,Birthday,Gender,Password,Salt,BG_IMG,Profile) VALUES('$FirstName','$LastName',CONCAT('$FirstName',' ','$LastName'),'$Email','$BirthDay','$Gender','$Password','$Salt','$defaultBG','$defaultPP')";
        }
        $connect->query($query);
        echo 1;
    }
    else if(htmlspecialchars($_POST['Password']) != htmlspecialchars($_POST['ConfirmPassword']))
    {
        echo -1;
    }
    else if($result != 0)
    {
        echo -2;
    }
    else if($FirstName==''||$Password==''||$Email==''||$BirthDay==''||$Gender=='')
    {
        echo -3;
    }
    else if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
    {
        echo -4;
    }
    
?>