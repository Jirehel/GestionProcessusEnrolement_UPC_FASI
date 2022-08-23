<?php
    include './controllers/subscribed_controlleur.php';
    $badg_c=new subscribed_controlleur();
    $student=0;
    if (isset($_GET['student']) && !empty($_GET['student']) && is_numeric($_GET['student'])) {
        $student=sanitize($_GET['student']);
    }else{
        header("location:index.php?p=all_listes_souscrption");
    } 

    if (isset($_POST['save'])) {

        $studentName="student_".$student."_".uniqid();
        $myimg = $_POST['image'];
        $destinationPath = "./avatar/student_photos/";
          
        $web_capture_part = explode(";base64,", $myimg);
        $image_type_aux = explode("image/", $web_capture_part[0]);
        $image_type = $image_type_aux[1];
          
        $image_base64 = base64_decode($web_capture_part[1]);
        $imgName = $studentName . '.png';
          
        $file = $destinationPath . $imgName;
        file_put_contents($file, $image_base64);

        #update student photo
        $badg_c->update_photo($student,(string)$file);
        #validate subscription
        $badg_c->confirm_subs($student);
        header("location:index.php?p=all_listes_souscrption");
        require 'capture.php';
    }elseif (isset($_POST['skip'])) {
         $badg_c->confirm_subs($student);
         header("location:index.php?p=all_listes_souscrption");
    }
?>