<?php
  session_start();
  $Email=$_GET['mail'];
  
  require "funciones.php";
  $conn = conectar();
  
  $sql="SELECT * FROM empleados where emp_email='$Email'";

  $resulset=mysqli_query($conn,$sql);

  $registro=mysqli_fetch_assoc($resulset);

  $url = 'http://' . $_SERVER["SERVER_NAME"] . '/vecefarm/cambioPassMail.php?id='. $registro['emp_id'];

  $nomApe = $registro['emp_nom'] . ' ' . $registro['emp_ape'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'mail.kaizen2b.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'grojas@kaizen2b.com';                     //SMTP username
      $mail->Password   = 'Eduardo2024*';                               //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('grojas@kaizen2b.com', 'VECEFARM');
      $mail->addAddress($Email, $nomApe );     //Add a recipient
      
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Recuperar Password';
      $mail->Body    = "Para recuperar la contraseña hacer <a href='$url'>click aqui </a>";
      
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}


    if($Email==$registro['emp_email']){
        $_SESSION['mensaje'] = 'Se envió el mail de recuperación a ' . $Email;
        $_SESSION['tipo_mensaje'] = 'success';
        header("location:index.php");
    }else {
        $_SESSION['mensaje'] = 'No existe el mail ' . $Email . ' en nuestra base' ;
        $_SESSION['tipo_mensaje'] = 'danger';
        header("location:olvidePass.php");
    }


?>