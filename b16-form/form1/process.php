<?php
// Verileri al
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

// Ham JSON verisini oku
$json = file_get_contents('php://input');

// JSON verisini diziye çevir
$data = json_decode($json, true);

// JSON verisini ve çözümlenmiş halini yazdır
echo "Ham JSON Verisi:";
echo ("<br/>");
echo $json;
echo ("<br/>");
echo "\n\nÇözümlenmiş JSON Verisi:\n";
echo ("<br/>");
print_r($data);
echo ("<br/>");

// Basit bir doğrulama yapalım
if (!empty($name) && !empty($email)) {
    echo "Merhaba, $name! E-posta adresiniz: $email";
} else {
    echo "Lütfen tüm alanları doldurun.";
}

echo("<br/>");

// Formdan gelen POST verilerini al
$formData = $_POST;

// stdClass nesnesine dönüştür
$formObject = (object)$formData;

// Nesne olarak verileri görüntüle
echo "Ad: " . $formObject->name . "\n";
echo("<br/>");
echo "Email: " . $formObject->email . "\n";
echo("<br/>");
print_r($formObject);


