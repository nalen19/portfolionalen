<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$mail = new PHPMailer(true);

try {
  // Konfigurasi SMTP Gmail
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'nalendrakurniawan@gmail.com'; // Ganti dengan email Gmail kamu
  $mail->Password   = 'nalendrasila123';   // BUKAN password login Gmail biasa (lihat langkah 3 di bawah)
  $mail->SMTPSecure = 'tls';
  $mail->Port       = 587;

  // Penerima & Isi Email
  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addAddress('nalendrakurniawan@gmail.com'); // Email tujuan

  $mail->Subject = $_POST['subject'];
  $mail->Body    = "Nama: " . $_POST['name'] . "\n";
  $mail->Body   .= "Email: " . $_POST['email'] . "\n";
  $mail->Body   .= "Pesan:\n" . $_POST['message'];

  $mail->send();
  echo 'OK';
} catch (Exception $e) {
  echo "Gagal mengirim pesan. Error: {$mail->ErrorInfo}";
}
?>
