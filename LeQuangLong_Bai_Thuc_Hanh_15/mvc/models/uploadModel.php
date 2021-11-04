<?php
class uploadModel extends connectDB
{   
    function uploadImg()
    {  
        /* Getting file name */
        $filename = $_FILES['file']['name'];
        /* Location */
        $location = "uploads/" . $filename;
        $uploadOk = 1;

        if ($uploadOk == 0) {
            echo 0;
        } else {
            /* Upload file */
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                echo "./uploads/".$filename;
            } else {
                echo 0;
            }
        }
    }
}
?>