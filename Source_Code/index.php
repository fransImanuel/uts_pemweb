<?php include ('view/header_index.php');?>
<body>
    <?php
        if(isset($_SESSION["UserID"]))
        {
            echo '<script>
            window.location.href = "view/home.php"
            </script>';
            
        }
    ?>
    <section class="content-body">
        <div id="circle"></div>
        <img src="assets/Misc/img2.png" class="img" alt="">

        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button class="toggle-btn" type="button" onclick="login()">Log In</button>
                    <button class="toggle-btn" type="button" onclick="register()">Register</button>
                </div>
                <form action="" id="login" class="input-group">
                    <h3 class="form-title">See what’s happening in the world right now</h3>
                    <input class="input-field" type="text" id="email" placeholder="Email" required>
                    <input class="input-field" type="password" id="password" placeholder="Password" required>
                    <div> <img src="controller/captcha.php" width="170" height="50"> </div>
                    <input class="input-field" type="text" id="captcha" placeholder="Insert Captcha" required>
                    <p id="LoginAlert"> </p>
                    <!-- input type="checkbox" class="check-box-reg"><span>Remember Password</span> --> 
                    <button type="submit" onclick="loginData()" class="submit-btn">Log In</button>
                </form>
                <!-- <div class="form-area"> -->
                <form action="" id="register" class="input-group" method="POST">
                    <h3 class="form-title">Create Your Account</h3>
                    <input class="input-field" id="FNameReg" type="text" placeholder="First Name">
                    <input class="input-field" id="LNameReg" type="text" placeholder="Last Name">
                    <input class="input-field" id="EmailReg" type="text" placeholder="Email">
                    <input class="input-field" id="BDayReg" type="date" placeholder="Date Birth">
                    <select class="input-field" id="cars" >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <input class="input-field" id="PassReg" type="password" placeholder="Password">
                    <input class="input-field" id="CPassReg" type="password" placeholder="Confirm Password">
                    <p id="RegisterAlert"></p>
                    <button type="submit" onclick="RegisterData()" class="submit-btn">Register</button>
                </form>
            </div>
        </div>

    </section>
    <img src="assets/Misc/circle-01.png" class="circle1" alt="">
    <section id="content-2">
        <h1 class="title">WHY Umedia?</h1>
        <!-- <div class="title-line"></div> -->
        <div class="flexing">
            <div class="img-content2">
                <img src="assets/Misc/img1-content2.svg" alt="Loading">
                <h3 class="title-content-2">Online Post</h3>
                <p class="text-content-2">Post Your Experience Through U-Media, and Make The Others Smile</p>
            </div>
            <div class="img-content2">
                <img src="assets/Misc/img2-content2.svg" alt="Loading">
                <h3 class="title-content-2">Share Your Thought</h3>
                <p class="text-content-2">Put Forward Your Opinion and Make The Others Share Their Thought With You</p>
            </div>
            <div class="img-content2">
                <img src="assets/Misc/img3-content2.svg" alt="Loading">
                <h3 class="title-content-2">Meet Many Friends</h3>
                <p class="text-content-2">Look and Find Lots of Friends in All Regions </p>
            </div>
        </div>
        <div id="rectangle-1"></div>
    </section>

    <section id="content-3">
        <div id="square-1"></div>
        <h1 class="title">Umedia</h1>
        <!-- <div id="square-2"></div>
        <div id="square-3"></div> -->
        <p class="text-content-3 line anim-typewriter">Your Social Media~~</p>
    </section>

    <?php
    include ('view/footer_index.php');
    ?>
</body>
<script src="assets/script_index.js"></script>
</html>