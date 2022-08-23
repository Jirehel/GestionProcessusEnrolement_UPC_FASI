<?php

    /**
    * 
    */
    class studentPhoto
    {
        
        function __construct($studentName)
        {
            $dao=new Dbaccess();
            $dba=$dao->accessDB();

            $myimg = $_POST['image'];
            $destinationPath = "../avatar/student_photos/";
          
            $web_capture_part = explode(";base64,", $myimg);
            $image_type_aux = explode("image/", $web_capture_part[0]);
            $image_type = $image_type_aux[1];
          
            $image_base64 = base64_decode($web_capture_part[1]);
            $imgName = $studentName . '.png';
          
            $file = $destinationPath . $imgName;
            file_put_contents($file, $image_base64);

           $req = $dba->prepare("UPDATE enroll.student SET enroll.student.photo=:imagesource WHERE enroll.student.matricule=:matricule
        ");
            $req->execute([
                        'matricule'=>$studentName,
                        'imagesource' => $file]);


        require 'capture.php';
        }
    }
    new studentPhoto("24454545");
?>