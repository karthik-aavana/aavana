<?php
if (!empty($_POST['name']) && !empty($_POST['phone'])) {
	$subject = 'A message from Website';
	$name = $_POST['name'];
	$webpage = $_POST['webpage'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$position = $_POST['position'];
	date_default_timezone_set("Asia/Calcutta");
	$datetime = date('d-m-Y H:i:s');
	$message = "
        <div style='width: 500px;
        padding: 10px;
        color: #120202;
        background: #85e8f5;'>
                <p style='margin:5px'>
                        Viewer Name: $name
                </p>
                <p style='margin:5px'>
                        Viewer phone: $phone
                </p>
                <p style='margin:5px'>
                        Viewer Email: $email
                </p>
                 <p style='margin:5px'>
                        Viewer Message: $message
                </p>
                <p style='margin:5px'>
                        Visited Page : $webpage
                </p>
                <p style='margin:5px'>
                        Clicked CTAB : $position
                </p>
                <p style='margin:5px'>
                        Clicked Date : $datetime;
                </p>
        </div>";
	include ('third_party/PHPMailer/PHPMailerAutoload.php');
	$mail = new PHPMailer;
	//$mail->isSMTP();                                    // Set mailer to use SMTP
	$mail -> Host = 'smtp.gmail.com';
	// Specify main and backup SMTP servers
	$mail -> SMTPAuth = true;
	// Enable SMTP authentication
	$mail -> Username = 'hasnu.zaman@aavana.in';
	// SMTP username
	$mail -> Password = 'mh$@m@nkk';
	// SMTP password
	$mail -> SMTPSecure = 'ssl';
	// Enable TLS encryption, `ssl` also accepted
	$mail -> Port = '465';
	// TCP port to connect to
	$mail -> IsHTML(true);
	$mail -> setFrom('manjunath.k@aavana.in', 'Website');
	$mail -> addReplyTo('manjunath.k@aavana.in', 'Website');
	$mail -> addAddress('manjunath.k@aavana.in');
	// Add a recipient
	$mail -> addCC('lead@aavana.in');
	// $mail->addCC('hasnu.zaman@aavana.in');
	$mail -> isHTML(true);
	// Set email format to HTML
	$bodyContent = $message;
	$mail -> Subject = $subject;
	$mail -> Body = $bodyContent;
	// $mail->addAttachment($file_path.$file_name.'.pdf');
	if (!$mail -> send()) {
		// echo $mail->ErrorInfo;
		$output = "failed";
		// $output="Sorry,Some internal error is happened. Please feel free to contact with the number provide in the top of webpage.";
	} else {
		$output = "ok";
		// $output="Thanks for showing interest with us. Our executive will get you soon. Have a nice day. ";
	}
	echo $output;
	die ;
} else {
	header('location:index');
	exit ;
}
?>