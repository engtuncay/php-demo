<?php
//require_once("./SendMailSmtpClass.php");

require_once("./vendor/autoload.php");
require_once("./configOzpas.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//use SmtpMail\SendMailSmtpClass;

//System İnclude
//include("main-old.php");
//include('vendor/autoload.php');

//require_once("./class.phpmailer.php");

$process = $_POST["process"];

if ($process == "IS_BASVURU_FORMU") {

  $data = $_POST["data"];
  $adiSoyadi = $_POST["adiSoyadi"];
  $ePostaAdresi = $_POST["ePostaAdresiniz"];
  $tcNo = $_POST["tcNo"];

  // PHPMailer'ın dosyalarını dahil edin
  // require 'path-to-phpmailer/PHPMailer.php';
  // require 'path-to-phpmailer/Exception.php';
  // require 'path-to-phpmailer/SMTP.php';

  // Yeni bir PHPMailer örneği oluşturun
  $mail = new PHPMailer(true);

  try {
    // Sunucu ayarları
    $mail->isSMTP();
    $mail->Host = 'mail.ozpas.com'; // SMTP sunucu adresi
    $mail->SMTPAuth = true; // SMTP kimlik doğrulama kullanılsın mı
    $mail->Username = 'isbasvurusu@ozpas.com'; // SMTP kullanıcı adı
    $mail->Password = 'isbasvurusu123'; // SMTP şifre
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // SSL/TLS şifreleme türü
    $mail->Port = 587; // SMTP portu (genellikle 587 veya 465)
    $mail->CharSet = "UTF-8";

    //   $mail->IsSMTP();
    //   $mail->Host = "mail.ozpas.com"; // localhost
    //   $mail->SMTPAuth = true;
    //   $mail->SMTPSecure = "ssl";
    //   $mail->Port = 465; // 25
    //   $mail->Username = "isbasvurusu@ozpas.com";
    //   $mail->Password = "isbasvurusu123";
    //   $mail->From = $EPostaAdresiniz;
    //   $mail->FromName = "İş Başvurusu - " . $AdiSoyadi;

    // Gönderici bilgileri
    $mail->setFrom($ePostaAdresi, $adiSoyadi);

    // Alıcı bilgileri
    $mail->addAddress('tuncayorak@gmail.com', 'Tuncay Orak');

    $sqlMailAdresleri = "SELECT * FROM is_basvuru_formu_mail_adresleri";

    $query = $db2->getPdo()->query($sqlMailAdresleri, PDO::FETCH_ASSOC);

    $mailGonderilen = "";

    //$mail->AddAddress("tuncayorak@gmail.com");  // "İş Başvurusu Sistem Mail Adresi"

    if ($query->rowCount()) {
      foreach ($query as $row) {
        //print $row['kulanici_adi'] . "<br>";
        //echo $row->email;
        $mail->AddAddress($row['email'], $row['email']);  // "İş Başvurusu Sistem Mail Adresi"
        $mailGonderilen = $row['email'];
      }
    } else {
      $hataMesaj = "Üzgünüz, sisteme tanımlı E-Posta Adresi olmadığı için Gönderilemedi. Firmayla irtibata geçiniz lütfen.";
      echo sprintf('{ "result":"0", "message":"%s"}', $hataMesaj);
      //$db2 = null;
      return;
    }


    // Mail içeriği
    $mail->isHTML(true);
    $mail->Subject = 'İş Başvurusu - ' . $adiSoyadi;
    $mail->Body = $data; //'Test HTML message body <b>in bold!</b>';
    $mail->AltBody = 'İş Başvuru Html Mail Client Yüklenmeli.'; //This is the plain text message body for non-HTML mail clients

    // Mail gönderme işlemi
    $mail->send();
    //echo 'Mail gönderildi!';
    echo sprintf('{"result":"1", "message":"Mail Gönderildi."}');
  } catch (Exception $e) {
    //echo "Mail gönderilemedi. Hata: {$mail->ErrorInfo}";
    echo sprintf('{"result":"0", "message":"%s"}', $mail->ErrorInfo);
  }

  // //$is_basvuru_suresi_degeri = 0;
  // // $is_basvuru_sureleri = $db->get_results("SELECT * FROM is_basvuru_formu_suresi");

  // // foreach ($is_basvuru_sureleri as $is_basvuru_suresi) {
  // //     $is_basvuru_suresi_degeri = $is_basvuru_suresi->sure;
  // // }

  // // $is_basvurusu_yapmis = 0;
  // // $sql_oncekiBasvuru = "SELECT * FROM is_basvurusu WHERE (TCNo='$TCNo') AND ( ROUND((UNIX_TIMESTAMP() - UNIX_TIMESTAMP(BasvuruZamani))/60) < $is_basvuru_suresi_degeri ) ORDER BY Id DESC LIMIT 1";

  // //$is_basvurulari = $db->get_results("SELECT * FROM is_basvurusu WHERE (TCNo='$TCNo') AND ( ROUND((UNIX_TIMESTAMP() - UNIX_TIMESTAMP(BasvuruZamani))/60) < $is_basvuru_suresi_degeri ) ORDER BY Id DESC LIMIT 1");

  // // foreach ($is_basvurulari as $is_basvurusu) {
  // //     $is_basvurusu_yapmis = 1;
  // // }

  // // if ($is_basvurusu_yapmis == 1) {
  // //     echo "Daha önceden iş başvurusunda bulunmuşsunuzdur.";
  // // } else {
  // try {

  //   $mail = new PHPMailer();
  //   $mail->CharSet = "UTF-8";
  //   $mail->IsSMTP();
  //   $mail->Host = "mail.ozpas.com"; // localhost
  //   $mail->SMTPAuth = true;
  //   $mail->SMTPSecure = "ssl";
  //   $mail->Port = 465; // 25
  //   $mail->Username = "isbasvurusu@ozpas.com";
  //   $mail->Password = "isbasvurusu123";
  //   $mail->From = $EPostaAdresiniz;
  //   $mail->FromName = "İş Başvurusu - " . $AdiSoyadi;

  //   //$is_basvuru_formu_mail_adresleri = $db->get_results("SELECT * FROM is_basvuru_formu_mail_adresleri");

  //   //try {

  //   $sqlMailAdresleri = "SELECT * FROM is_basvuru_formu_mail_adresleri";

  //   //$query = $db2->query($sqlMailAdresleri, PDO::FETCH_ASSOC);

  //   $mailGonderilen = "";

  //   $mail->AddAddress("tuncayorak@gmail.com");  // "İş Başvurusu Sistem Mail Adresi"

  //   // if ($query->rowCount()) {
  //   //   foreach ($query as $row) {
  //   //     //print $row['kulanici_adi'] . "<br>";
  //   //     //echo $row->email;
  //   //     $mail->AddAddress($row['email'], $row['email']);  // "İş Başvurusu Sistem Mail Adresi"
  //   //     $mailGonderilen = $row['email'];
  //   //   }
  //   // } else {
  //   //   $hataMesaj = "Üzgünüz, sisteme tanımlı E-Posta Adresi olmadığı için Gönderilemedi. Firmayla irtibata geçiniz lütfen.";
  //   //   echo sprintf('{ "result":"0", "message":"%s"}', $hataMesaj);
  //   //   $db2 = null;
  //   //   return;
  //   // }

  //   $mail->Subject = "Özpaş İş Başvurusu - " . $AdiSoyadi; // . " - " . $EPostaAdresiniz;
  //   $mail->Body = "body"; // $data;
  //   $mail->IsHTML(true);
  //   //$sonuc = $mail->Send();
  //   //$sonuc = 1;

  //   $mailSent = new SendMailSmtpClass("isbasvurusu@ozpas.com", "isbasvurusu123", "mail.ozpas.com", 465, "utf-8"); //465
  //   $sonuc = $mailSent->send($mailGonderilen, "İş Başvuru", $data, "isbasvurusu@ozpas.com");

  //   //mail("tuncayorak@gmail.com","deneme","deneme mesajı to");

  //   $TCNo = $_POST["tcNo"];
  //   //$db->query("INSERT INTO is_basvurusu (TCNo) VALUES ('$TCNo')");

  //   $retMessage = sprintf('{ "result":"1", "message":" %s Eposta: %s" , "data": "%s" "}', $sonuc, $mailGonderilen, $data);
  //   echo $retMessage;
  // } catch (Exception $e) {
  //   // $retMessage = <<<RETMESSAGE
  //   // { "result":"0", "message":" $e->getMessage"}
  //   // RETMESSAGE;
  //   echo sprintf('{"result":"0", "message":"%s"}', $e->getMessage);
  // }

  // // } catch (PDOException $e) { // 
  // //   echo "Error: " . $e->getMessage();
  // //   $db = null;
  // //   return;
  // // }

}

// } else if ($process == "IS_BASVURU_FORMU_SURESI") {
//     $IsBasvuruSuresi = $_POST["IsBasvuruSuresi"];
//     $db->query("UPDATE is_basvuru_formu_suresi SET sure='$IsBasvuruSuresi'");
//     echo "1";
// }
?>