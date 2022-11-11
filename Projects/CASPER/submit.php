<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer;                              // Passing `true` enables exceptions

if (isset($_POST['submit'])) {
    $nameinp = $_POST['name'];
    $emailinp = $_POST['email'];
    $subjectinp = $_POST['subject'];
    $messageinp = $_POST['message'];
}

    //Server settings
	$mail->SMTPDebug = 4; 
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'artdrini2@gmail.com';                 // SMTP username
    $mail->Password = 'petypvxgjlircuew';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('artdrini2@gmail.com', 'gmail');
    $mail->addAddress('artdrini2@gmail.com'); 
    $mail->addReplyTo('artdrini2@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjectinp ;

	$mailContent = $messageinp;

    $mail->Body    = $nameinp ."<br>". $emailinp ."<br>". $mailContent  ;

if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Error: '. $mail->ErrorInfo;
}else{
	//echo 'Message has been sent';
    echo "<script>alert('Message has been sent!')</script>";
    echo "<script>window.open('index.php','_self');</script>";
    
}	

?>