<?php 
	require './assets/lib/phpqrcode/qrlib.php';
	class QrCodeGen
	{
		function __construct(){}
		
		function generateQrCode($plainText,$sess_id, $file, $err_correction, $pixel_size,$frame_size){
			$text=$plainText."_".$sess_id."_UNIVUPCFASI";
			QRcode::png($text, $file, $err_correction, $pixel_size,$frame_size);#effective qr generating engine

			#adding logo to qr image
			$genetatedQr=imagecreatefrompng($file); #QR file
			$dir_content=scandir("./assets/logo/"); # logo dir
			$logo="./assets/logo/".$dir_content[array_search("fasi1.png", $dir_content)];#logo file

			if($genetatedQr==FALSE and $logo==FALSE){
				echo "sorry";
			}else{
				$logopng = imagecreatefrompng($logo);
				$QR_width = imagesx($genetatedQr);
				$QR_height = imagesy($genetatedQr);
				$logo_width = imagesx($logopng);
				$logo_height = imagesy($logopng);
				
				list($newwidth, $newheight) = getimagesize($logo);
				$out = imagecreatetruecolor($QR_width, $QR_width);
				imagecopyresampled($out, $genetatedQr, 0, 0, 0, 0, $QR_width, $QR_height, $QR_width, $QR_height);
				imagecopyresampled($out, $logopng, $QR_width/2.65, $QR_height/2.65, 0, 0, $QR_width/5, $QR_height/5, $newwidth, $newheight);
				imagepng($out,$file);
				imagedestroy($out);
				return $file;
			}
			/*echo "<img src='$file' style='position:relative;display:block;width:250px;height:250px;margin:160px auto;'>";*/
		}
	}

?>