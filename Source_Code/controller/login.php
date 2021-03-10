<?php
    session_start();
    include '../model/database.php';
    $email = strtolower($_POST['email']);
    $pwd = $_POST['pwd'];
    if (strcmp($_SESSION["captcha"], $_POST['captcha']) == 0 &&$email!=''&&$pwd!=['']) {
        
        $query = "SELECT Salt FROM users WHERE Email = '$email';";
        $stmt1 = $connect->prepare($query);
        $stmt1->execute();
        $hasil_stmt1 = $stmt1->fetchAll(\PDO::FETCH_ASSOC);
        $hasil_stmt1 = $hasil_stmt1[0];
        $salt = $hasil_stmt1['Salt'];
        $pwd = $pwd.$salt;
        $pwd_hashed = md5($pwd);
        $query = "SELECT COUNT(*) FROM users WHERE email = :email AND password = '$pwd_hashed';";
        $stmt = $connect->prepare($query);
        $stmt->execute(array(':email' => $email));
        $hasil_stmt = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $hasil = $hasil_stmt[0];
        $count = $hasil["COUNT(*)"];
        $jumlah_row = (int) $count;
        if ($jumlah_row == 1) {
            $_SESSION['Login']  = 'true';
            $query = "SELECT UserID FROM users WHERE Email = '$email'";
            $stmt2 = $connect->prepare($query);
            $stmt2->execute();
            $hasil_stmt2 = $stmt2->fetchAll(\PDO::FETCH_ASSOC);
            $hasil_stmt2 = $hasil_stmt2[0];
            $hasil_stmt2 = $hasil_stmt2['UserID'];
            $_SESSION["UserID"] = (int)$hasil_stmt2;
            $_SESSION["Login"] = true;
            echo $_SESSION["UserID"]; 
        } else {
            echo 0;
        }
    }
    else if($email==''||$pwd=='')
    {
        echo -2;
    } 
    else if(strcmp($_SESSION["captcha"], $_POST['captcha']) != 0 )
    {
        echo -1;
    }
?>