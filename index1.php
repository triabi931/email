
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
include ('PHPMailer/src/Exception.php');
include ('PHPMailer/src/PHPMailer.php');
include ('PHPMailer/src/SMTP.php');

if(isset($_POST['submit'])) 
{ 
    $emailsaya = 'triabi931@gmail.com';
    $nama_email ='Tri Abi';
    $email_penerima = $_POST['penerima'];
    $subjek = $_POST['subjekk'];
    $pesan = $_POST['pesan'];


    $mail = new PHPMailer(true);
    $mail->isSMTP();    
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;    
    $mail->Username   = $emailsaya;
    $mail->Password   = 'wighumrplhdowdiv'; 
    $mail->Port       = 465;  
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPDebug = 2;


    $mail->setFrom($emailsaya, $nama_email);
    $mail->addAddress($email_penerima);
    $mail->isHTML(true);
    $mail->Subject = $subjek;
    $mail->Body = $pesan;

    $send = $mail->send();
    if($send){
        echo    "<script>alert('Email Berhasil Dikirim')</script>";
        echo    "<script type='text/javascript'> document.location = 'index.html'; </script>";
    }else {
        echo    "<script>alert('Email Gagal Dikirim')</script>";
    }



    echo "User Has submitted the form and entered this name : <b> $email_penerima </b>";
    echo "<br>You can use the following form again to enter a new name."; 
}
?>
