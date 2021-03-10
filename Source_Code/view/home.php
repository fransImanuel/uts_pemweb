<?php
session_start();
 include ('header.php');
    if(!isset($_SESSION["Login"]))
        {
            echo '<script>
            window.location.href = "denial-page.php"
            </script>';
        }
?>
<!DOCTYPE html>
<body>
    <!-- -----------------------------home content-------------------------------- -->
    <section id="home">
        <div class="col-12 flexing">
            <div class="col-1">
                <div class="home-profile">
                    <?php
                    include '../model/database.php';
                    $query = 'SELECT * FROM users WHERE UserID = '.$_SESSION["UserID"].'';
                    $result = $connect->query($query);
                    foreach($result as $User)
                    echo 
                    '<a href="profile.php?id='.$User['UserID'].'">
                        <div class="photo-frame">
                            <img src="../assets/PP_IMG/'.$User['Profile'].'" alt="">
                        </div>
                        <h4>'.$User['NickName'].'</h4>
                    </a>'
                    ?>
                </div>
            </div>
            <div class="col-2">
                <div class="comment">    
                    <form action="../controller/post.php" method="POST" enctype="multipart/form-data">
                        <input class="input-field" type="text" placeholder="What Do You Think Today?" name="PostContent">
                        <button style="float: left;margin-right:10px;" class="submit-post">Post</button>                        
                        <?php
                        echo '<input  type="file" name="PostIMG" id="PostIMG" class="show-input-file '.$_SESSION['UserID'].'">'
                        ?>
                        <label style="font-size: 10px;" class="button-show-input" for="PostIMG">Upload Image</label><!-- "1" di ganti sama ID -->
                    </form>
                </div>
                <!-- ini section buat di looop dalem foreach dan di echo di php :awal -->
                <?php
                    include '../model/database.php';
                    $query = "SELECT * FROM posts ORDER BY PostDate,PostTime DESC";
                    $result = $connect->query($query);

                    foreach($result as $post)
                    {
                        $query = 'SELECT * FROM users WHERE UserID = '.$post['UserID'].'';
                        $Account = $connect->query($query);
                        
                        foreach($Account as $acc)
                        {
                            echo '<div class="comment">';
                            echo    '<div class="comment-section">';
                            echo        '<div class="comment-photo">';                
                            echo    '<a href="profile.php?id='.$post['UserID'].'">';
                            echo        '<img src="../assets/PP_IMG/'.$acc['Profile'].'" alt="">';
                            echo    '</a>';
                            echo    '</div>';
                            echo        '<div class="comment-content">';
                            echo            '<h4>'.$acc['NickName'].'</h4>';   
                            echo            '<p class="time">'.$post['PostDate'].'</p>';
                            echo            '<p class="time">'.$post['PostTime'].'</p>';
                                            if($post['ImgContent']!=NULL){
                            echo                '<img src="../assets/Posts/'.$post['ImgContent'].'">';
                                            }
                                            if($post['Content']!=NULL){
                            echo                '<p>'.$post['Content'].'</p>';
                                            }
                            echo            '<button class="button-comment " onclick="showCommentColumn('.$post['PostID'].')">Comment</button>';
                            echo            '<button class="button-comment" onclick="showAllComment('.$post['PostID'].'); ">- Show All Comment</button>';
                            echo            '<form method="POST" action = "../controller/comment.php">';
                            echo                '<input type="hidden" name="Commentator" value='.$_SESSION['UserID'].' >';
                            echo                '<input type="hidden" name="PID" value='.$post['PostID'].'>';
                            echo                '<input class="comment-coloumn '.$post['PostID'].'" type="text" placeholder="Comment" name="CommentContent">';
                            echo                '<button class=" submit-comment '.$post['PostID'].' ">Submit</button>';
                            echo            '</form>';
                            echo            '<ul id='.$post['PostID'].'>';
                                            
                            echo            '</ul>';
                            echo        '</div>';
                            echo    '</div>';
                            echo '</div>';
                        }
                    }
                ?>
                <!-- ini section buat di looop dalem foreach dan di echo di php :akhir -->     
                           
            </div>
            
        </div>
    </section>



    <?php
    include ('footer.php');
    ?>
    
</body>
<script src="../assets/script.js"></script>
</html>
