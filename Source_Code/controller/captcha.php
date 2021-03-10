<?php
    session_start();
    $string = '';
    
    for ($i = 0; $i < 6; $i++) {
        $random = rand(1,2);
        if($random == 1)
        {
            $string .= chr(rand(97, 122));
        }
        else
        {
            $string .= chr(rand(48, 57));
        }
    }
    
    $_SESSION["captcha"] = $string;

    //echo "$string";

    //header("Content-type: image/jpeg");
    
    //$image = imagecreatetruecolor(200, 30);
    $image = imagecreate(130,50);
    //$background_color = imagecolorallocate($image, 231, 100, 18);
    imagecolorallocate($image,255,255,255);

    $text_color = imagecolorallocate($image,0,0,0);

    //imagefilledrectangle($image, 0, 0, 200, 38, $background_color);
    //C:\Windows\Fonts\arial.ttf
    $font = dirname(__FILE__) . '/arial.ttf';
    
    imagefttext($image, 20, 0, 15, 30, $text_color, $font , $string);
    imagejpeg($image);
    //imagedestroy($image);
?>