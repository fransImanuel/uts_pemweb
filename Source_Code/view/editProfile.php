<?php
session_start();
 include ('header.php'); ?>
<!DOCTYPE html>
<body>
    <?php
    echo 'test';
    if(!$_SESSION["Login"])
    {
        echo '<script>
            window.location.href = "view/denial-page.php"
            </script>';
    }
    echo 'test';
    include '../model/database.php';
    $query = 'SELECT * FROM users WHERE UserID = '.$_SESSION["UserID"].'';
        $result = $connect->query($query);
        foreach($result as $post)
        {
        echo '<style>
                    .banner{
                        background-image: url(../assets/BG_IMG/'.$post['BG_IMG'].');
                        min-height: 100%;
                        position: relative;
                        opacity: 1;
                        background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;
                    
                        /* fixed = paralax
                        scroll = normal */
                    
                        background-attachment: fixed;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
            </style>';
        }
    $query = 'SELECT * FROM users WHERE UserID = '.$_SESSION["UserID"].'';
    $result = $connect->query($query);
    foreach($result as $Curr)
    {
        $password = $Curr['Password'].$Curr['Salt'];
        $password = md5($password);
        echo 
        '<section id="profile">
            <div class="banner">
                <div class="photo-profile">
                        <img src="../assets/PP_IMG/'.$Curr['Profile'].'" alt="">
                </div>
            </div>
        </section>
        <section class="col-12"  id="home">
            <div class="form-edit ">
                <form action="../controller/updateProfile.php" method="POST" enctype="multipart/form-data">
                    <input class="input-field" type="hidden" name="UserID" value="'.$Curr['UserID'].'">
                    <input class="input-field" type="hidden" name="PP" value="'.$Curr['Profile'].'">
                    <input class="input-field" type="hidden" name="BG" value ="'.$Curr['BG_IMG'].'">
                    <input class="input-field" type="hidden" name="Salt" value ="'.$Curr['salt'].'">
                    
                    <label class="text-content-2">First Name</label>
                    <input class="input-field" type="text" name="FirstName" value="'.$Curr['FirstName'].'">
                    <label class="text-content-2">Last Name</label>
                    <input class="input-field" type="text" name="LastName" value="'.$Curr['LastName'].'">
                    <label class="text-content-2">Nickname</label>
                    <input class="input-field" type="text" name="NickName" value="'.$Curr['NickName'].'">
                    <label class="text-content-2">Email</label>
                    <input class="input-field" type="text" name="Email" value="'.$Curr['Email'].'" disabled>
                    <label class="text-content-2">BirthDay</label>
                    <input class="input-field" type="date" name="Birthday" value="'.$Curr['Birthday'].'">
                    <label class="text-content-2">Gender</label>
                    <input class="input-field" type="Text" name="Gender" value="'.$Curr['Gender'].'" disabled>
                    <label class="text-content-2">Password</label>
                    <input class="input-field" type="text" name="Password" placeholder="Password"><br><br><br>
                    <label class="text-content-2">Change Profile</label>
                    <input type="file" name="PP_IMG"><br>
                    <label class="text-content-2">Change Banner Profile</label>
                    <input type="file" name="BG_IMG"><br><br><br>
                    <button class="submit-btn" style="margin-top: 50px;margin-bottom: 50px;">Submit</button>
                </form>
            </div>
        </section>';
    }
    

    include ('footer.php');
    ?>
</body>
<script src="../assets/script.js"></script>
</html>