<?php
session_start();
 include ('header.php'); ?>
<!DOCTYPE html>
<body>
    <?php

        if(!$_SESSION["Login"])
        {
	    echo '<script>
            window.location.href = "denial-page.php"
            </script>';
        }
        if(!isset($_GET['id']))
        {
            header("location:../view/home.php");
        }
        include '../model/database.php';
        $id = (int)$_GET['id'];
        $query = 'SELECT COUNT(*) FROM users WHERE UserID = '.$id.'';
        $result = $connect->query($query);
        foreach($result as $curr)
        {
            $count = $curr["COUNT(*)"];
            if($count == 0)
            {
                header('location:../view/home.php');
            }    
        }
        
        $query = 'SELECT * FROM users WHERE UserID = '.$_GET["id"].'';
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
    ?>
    
    <section id="profile">
        <div class="banner">
            <div class="photo-profile">
            <?php
                include '../model/database.php';
                $id = (int)$_GET['id'];
                $query = 'SELECT * FROM users WHERE UserID = '.$id.'';
                $result = $connect->query($query);
                foreach($result as $post)
                {
                    echo '<img src="../assets/PP_IMG/'.$post['Profile'].'" alt="">';
                }
            ?>
            </div>
        </div>
        
    </section>
    <div class="section-profile">
    <?php
        include '../model/database.php';
        $id = (int)$_GET['id'];
        $query = 'SELECT * FROM users WHERE UserID = '.$id.'';
        $result = $connect->query($query);
        foreach($result as $post)
        {  
            if($post['Gender'] == 'F')
            {
                echo '<h1 class="title">'.$post['NickName'].' <i class="fas fa-venus" style="color:#ffb2a7;"></i> </h1>';
            }
            else
            {
                echo '<h1 class="title">'.$post['NickName'].' <i class="fas fa-mars" style="color:#323edd;"></i> </h1>';
            }
            
            echo '<p>'.$post['Email'].'</p>';
            echo '<p>'.$post['Birthday'].'</p>';
            
        }
    ?>
    </div>
    <?php
    include '../model/database.php';
    $id = (int)$_GET['id'];
    $query = 'SELECT * FROM posts WHERE UserID = "'.$id.'" ORDER BY 2 DESC';
    $result = $connect->query($query);
    if($id ==  $_SESSION['UserID'])
    {
        echo    '<div class="comment">    
                    <form action="../controller/post.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="Prof" value="1">
                        <input class="input-field" type="text" placeholder="What Do You Think Today?" name="PostContent">
                        
                        <button style="float: left;margin-right:10px;" class="submit-post">Post</button>
                        <input  type="file" name="PostIMG" id="PostIMG" class="show-input-file '.$id.'" >
                        <label class="button-show-input" for="PostIMG">Upload Image</label>
                    </form>
                </div>';
    }
    
    foreach($result as $post)
    {
        $query = 'SELECT * FROM users WHERE UserID = "'.$post['UserID'].'"';
        $result2 = $connect->query($query);
        foreach($result2 as $Account)
        {
            echo    '<section class="feed">
                <div class="no-post-feed"></div>
                <div class="post-feed"></div>
                <div class="comment">
                    <div class="comment">
                            <div class="comment-section">
                                <div class="comment-photo">
                                    <img src="../assets/PP_IMG/'.$Account['Profile'].'" alt="">
                                </div>
                                <div class="comment-content">
                                    <h4>'.$Account['NickName'].'</h4>
                                    <p class="time">'.$post['PostDate'].'</p>
                                    <p class="time">'.$post['PostTime'].'</p>';
                                    if($post['ImgContent']!=NULL){
            echo                        '<img src="../assets/Posts/'.$post['ImgContent'].'">';
                                    }
                                    if($post['Content']!=NULL){
            echo                        '<p>'.$post['Content'].'</p>';
                                    }
            echo                    '<button class="button-comment" onclick="showCommentColumn('.$post['PostID'].')">Comment</button>
                                    <button class="button-comment" onclick="showAllComment('.$post['PostID'].')">- Show All Comment</button>
                                    <form  method="POST" action = "../controller/comment2.php?id='.$post['UserID'].'">
                                        <input type="hidden" name="Commentator" value='.$_SESSION['UserID'].' > 
                                        <input type="hidden" name="PID" value='.$post['PostID'].'>
                                        <input class="comment-coloumn '.$post['PostID'].'" type="text" placeholder="Comment" name="CommentContent">
                                        <button type="submit" class="'.$post['PostID'].' submit-comment" value="submit">Submit</button>
                                    </form>
                                    <ul id='.$post['PostID'].'>';
                                        
                                        $query = 'SELECT * FROM comments WHERE PostID ='.$post['PostID'].'';
                                        $result3 = $connect->query($query);
                                        foreach($result3 as $comm)
                                        {
                                            $query = 'SELECT * FROM users WHERE UserID = '.$comm['Commentator'].'';
                                            $result4 = $connect->query($query);
                                            foreach($result4 as $AC)
                                            {
            echo                                '<li class="add-comment">
                                                    <div class="comment-section">
                                                        <div class="comment-photo">
                                                            <a href=\"profile.php?id='.$AC['UserID'].'">
                                                                <img src="../assets/PP_IMG/'.$AC['Profile'].'" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <h4>'.$AC['NickName'].'</h4>
                                                            <p class="time">'.$comm['CommentDate'].'</p>
                                                            <p class="time">'.$comm['CommentTime'].'</p>
                                                            <p>'.$comm['Text'].'</p>
                                                        </div>
                                                    </div>
                                                </li>';
                                            }
                                        }
            echo                   '</ul>
                                </div>
                            </div>
                    </div>
                    <!-- comment section end -->
                </div>
            </section>';
        }
    }
    ?>
    <?php
    include ('footer.php');
    ?>
</body>
<script src="../assets/script.js"></script>
</html>
