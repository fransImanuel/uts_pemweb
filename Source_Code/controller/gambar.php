<?php
    include '../model/database.php';
    $gambar = UploadedFile();

    if(!$gambar)
    {
        return false;
    }


    function UploadedFile()
    {
        $NamaFile = $_FILES['gambar']['name'];
        $UkuranFile = $_FILES['gambar']['size'];
        $ErrorFile = $_FILES['gambar']['error'];
        $LokasiFile = $_FILES['gambar']['tmp_name'];
        
        $AcceptedExtension = ['jpg','jpeg','png'];
        $EkstensiGambar = explode('.',$NamaFile);
        $EkstensiGambar = strtolower(end($EkstensiGambar));
        
        if(!in_array($EkstensiGambar,$AcceptedExtension))
        {
            return false;
        }

        if($UkuranFile > 5242880)
        {

        }
        $NamaFile    
        

        move_uploaded_file($LokasiFile,'../assets/PP_IMG',$NamaFile);

        return $NamaFile;
    }
?>