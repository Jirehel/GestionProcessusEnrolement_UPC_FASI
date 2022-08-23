<?php
	class mailer
	{
		
		function __construct($dst, $periode,$ressource/*the effective element to share*/)
		{
			$content = file_get_contents($ressource);
			$content = chunk_split(base64_encode($content));
			$uid = md5(uniqid(time()));
			$name = basename($ressource);

			// Sender's name
			$to = $dst;
			$header= 'from: noreply @ fasienroll.edu';
     		$header .= "MIME-Version: 1.0\r\n";

			// Email Subject
			$subject ="Examen ".$periode;
			$filename="ton code qr.png";
			// Headers for email
			$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

			// Messages and attachment
			$nmessage = "--".$uid."\r\n";
			$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
			$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$nmessage .= "--".$uid."\r\n";
			$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
			$nmessage .= "Content-Transfer-Encoding: base64\r\n";
			$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
			$nmessage .= $content."\r\n\r\n";
			$nmessage .= "--".$uid."--";
			mail($to, $subject, $nmessage, $header);
			#die($dst." ". $subject." ".$msgsend." ".$hearders);
		}
	}
	/*new mailer("christskybovich@gmail.com","Examens MI-SESSION 2020-2021","C:\\laragon\\www\\project\\avatar\\qrcodes\\SESSION\\SESSION 2020-2021\\61a9580774c40.png");*/
 ?>