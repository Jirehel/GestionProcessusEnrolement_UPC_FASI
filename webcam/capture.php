<?php
    #access à la page conditionné par la page specifique subscribed
    $prev_url=explode("=",basename($_SERVER['HTTP_REFERER']) );
    $prev_url=array_filter($prev_url);
    $prev_url=array_merge($prev_url,array());
    $prev_url=preg_replace('/\?.*/', '', $prev_url);
    $prev_page=$prev_url[1];
    $val=strcmp($prev_page,"subscribed&subscribesliste");
    if ((int)0!=(int)$val) {
         header("location:javascript://history.go(-1)");
        exit();
    }
    if(!isset($_SESSION['email'])){
            header('location:index.php?p=home');
        }

    if (isset($_GET['student']) && !empty($_GET['student']) && is_numeric($_GET['student'])) {
        $student=sanitize($_GET['student']);
    }else 
        header("location:index.php?p=all_listes_souscrption");
?>
<!DOCTYPE html>
<html>
<head>
    <title>webcam</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        .rounded {
            margin-top: 50px;
        }

        #preview {margin-top: 10px;}
        .val {
            margin-left: 50%;
            height: 40px;
            width: 30%;
            position: absolute;
            bottom: 25px;
            right: 100px;
        }

        .cap {
            width: 30%;
            height: 40px;
        }
    </style>
</head>
<body>
  
<div class="container">
    <!--h1 class="text-center">Capture webcam image with php and jquery - pakainfo.com</h1>
    <p>Integrate Webcam Capture in a PHP Application</p-->
    <div class="shadow p-3 mb-5 bg-white rounded">
        <a href="javascript:history.go(-1)">Retour</a>
        <form method="POST" action="<?="index.php?p=saveimage&student=".$student ?>">
            <div class="row pakainfo">
                <div class="col-md-6 pakainfo">
                    <div id="live_camera"></div>
                    <hr/>
                    <input class="btn btn-secondary cap" type=button value="Capturer" onClick="capture_web_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div id="preview"></div>
                </div>
                <div class="col-md-6 text-center pakainfo">
                    <br/>
                    <button class="btn btn-secondary btn-block val "  name="skip">Sauter</button>
                </div>
                 <div class="col-md-6 text-center pakainfo">
                    <br/>
                    <button class="btn btn-secondary btn-block val " name="save" id="tohide">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>
  
<script language="JavaScript">
    document.getElementById('tohide').style.visibility='hidden';
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#live_camera' );
  
    function capture_web_snapshot() {
        Webcam.snap( function(site_url) {
            $(".image-tag").val(site_url);
            document.getElementById('preview').innerHTML = '<img src="'+site_url+'"/>';
        } );
         document.getElementById('tohide').style.visibility='visible';
    }
</script>
 
</body>
</html>