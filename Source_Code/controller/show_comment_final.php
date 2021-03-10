<?php
include '../model/database.php';
$id = $_POST['id'];
$query = 'SELECT * FROM comments WHERE PostID = '.$id.'';
$Comment = $connect->query($query);
foreach($Comment as $com)
                                            {
                                                $query = 'SELECT * FROM users WHERE UserID = '.$com['Commentator'].'';
                                                $AccountComment = $connect->query($query);
                                                foreach($AccountComment as $AC)
                                                {
                            echo                    '<li>';
                            echo                        '<div class="comment-section">';
                            echo                            '<div class="comment-photo">';
                            echo                                '<a href="profile.php?id='.$AC['UserID'].'">';
                            echo                                    '<img src="../assets/PP_IMG/'.$AC['Profile'].'" alt="">';
                            echo                                '</a>';
                            echo                            '</div>';
                            echo                            '<div class="comment-content">';
                            echo                                '<h4>'.$AC['NickName'].'</h4>';
                            echo                                '<p class="time">'.$com['CommentDate'].'</p>';
                            echo                                '<p class="time">'.$com['CommentTime'].'</p>';
                            echo                                '<p>'.$com['Text'].'</p>';
                            echo                            '</div>';
                            echo                        '</div>';
                            echo                    '</li>';
                                                }
                                        }
?>