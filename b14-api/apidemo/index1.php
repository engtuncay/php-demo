<?php
include "db.php";
include "function.php";
$islem = isset($_GET["islem"]) ? addslashes(trim($_GET["islem"])) : null;
$jsonArray = array(); // array değişkenimiz bunu en alta json objesine çevireceğiz. 
$jsonArray["hata"] = FALSE; // Başlangıçta hata yok olarak kabul edelim. 
 
$_code = 200; // HTTP Ok olarak durumu kabul edelim. 
$_method = $_SERVER["REQUEST_METHOD"]; // client tarafından bize gelen method
// aldığımız işlem değişkenine göre işlemler yapalım. 
if($_method  == "POST") {
    // üye ekleme kısmı burada olacak. CREATE İşlemi 
}else if($_method == "PUT") {
    // üye güncelle kısmı burada olacak. PUT işlemi  
}else if($_method == "DELETE") {
    // üye silme işlemi burada olacak. DELETE işlemi 
}else if($_method == "GET") {
    // üye bilgisi listeleme burada olacak. GET işlemi 
    // üye bilgisi listeleme burada olacak. GET işlemi 
    if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))) {
    $user_id = intval($_GET["user_id"]);
    $userVarMi = $db->query("select * from uyeler where id='$user_id'")->rowCount();
    if($userVarMi) {
    
    $bilgiler = $db->query("select * from  uyeler where id='$user_id'")->fetch(PDO::FETCH_ASSOC);
    $jsonArray["uye-bilgileri"] = $bilgiler;
    $_code = 200;
    
    }else {
    $_code = 400;
    $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
            $jsonArray["hataMesaj"] = "Üye bulunamadı"; // Hatanın neden kaynaklı olduğu belirtilsin.
    }
    }else {
    $_code = 400;
    $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
            $jsonArray["hataMesaj"] = "Lütfen user_id değişkeni gönderin"; // Hatanın neden kaynaklı olduğu belirtilsin.
    }
}else {
    // hatalı bir parametre girilmesi durumunda burası çalışacak. 
    $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
    $jsonArray["hataMesaj"] = "Girilen İşlem Bulunmuyor."; // Hatanın neden kaynaklı olduğu belirtilsin. 
}
 
SetHeader($_code);
$jsonArray[$_code] = HttpStatus($_code);
echo json_encode($jsonArray);
?>