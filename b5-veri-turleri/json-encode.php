<?php
/* json_encode : php array veya nesneyi JSON formatına (string olarak) dönüştürür
*
* json : string JavaScript Object Notation formatıdır.
*
* JSON_UNESCAPED_UNICODE ile utf8 karakterlerini kaçış (\u ile) yapmadan vt'deki
* alana yazmak istersek vt'deki alanın karakter seti utf8mb4 olmalıdır.
*/
$dizi = array("isim" => "Ahmet", "yas" => 25, "sehir" => "İstanbul");
// İ char , \u ile UTF-8 olarak kodlanır
$json = json_encode($dizi);
echo "Escaped JSON: \n";
echo $json; // Çıktı: {"isim":"Ahmet","yas":25,"sehir":"\u0130stanbul"}

echo "\n";
echo "Unescaped JSON: \n";
$json = json_encode($dizi, JSON_UNESCAPED_UNICODE);
echo $json; // Çıktı: {"isim":"Ahmet","yas":25,"sehir":"İstanbul"}

echo "\n";
echo "\n";

$json = '{"isim":"Ahmet","yas":25,"sehir":"İstanbul"}';
// true parametresi ile dizi olarak döndürür
$dizi = json_decode($json, true);
echo "Json String decode edilirek Assoc Array'e dönüştürülüyor. isim Alanı basılıyor :\n";
echo $dizi["isim"]; // Çıktı: Ahmet

echo "\n";
echo "\n";

class Kullanici
{
  public $isim;
  public $yas;
}

$kullanici = new Kullanici();
$kullanici->isim = "Mehmet";
$kullanici->yas = 30;

echo "\nKullanici Objesi Json Encode Ediliyor (json string'e çevriliyor) \n";
$json = json_encode($kullanici);
echo $json; // Çıktı: {"isim":"Mehmet","yas":30}
echo "\n";
echo "Kullanici Json Stringi Json Decode Edilerek nesneye çevriliyor \n";
$nesne = json_decode($json); // Nesne olarak döndürür
echo $nesne->isim; // Çıktı: Mehmet
echo "\n";
echo "Kullanici Json Stringi Json Decode Edilerek assoc array'e çevriliyor \n";
$nesne = json_decode($json, true); // Assoc array olarak döndürür
echo $nesne["isim"]; // Çıktı: Mehmet
echo "\n";

echo "\n";

// json_decode sonrası kontrol - json_last_error() kullanımı

$gecersizJson = '{"isim":"Ali", "yas":}'; // Geçersiz JSON
$sonuc = json_decode($gecersizJson);
if (json_last_error() !== JSON_ERROR_NONE) {
  echo "JSON hatası: " . json_last_error_msg();
  echo "\n";
} else {
  echo $sonuc->isim;
  echo "\n";
}

echo "\n";

// json_encode sonrası kontrol - json_last_error() kullanımı

$data = ["isim" => "Ahmet"];
$json = json_encode($data);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "json_encode hatası: " . json_last_error_msg();
    echo "\n";
} else {
    echo "Başarılı: " . $json;
    echo "\n";
}


/*
JSON verisini veritabanına yazarken, genellikle escaped (kaçışlı) olarak saklamak daha iyidir. İşte nedenleri ve öneriler:

Neden Escaped Daha İyi?

Güvenlik ve Uyumluluk: json_encode() fonksiyonu varsayılan olarak özel karakterleri (örneğin, tırnak işaretleri \", Unicode karakterler \uXXXX) kaçışlar. Bu, JSON'un geçerli kalmasını sağlar ve veritabanı sorgularında (INSERT/UPDATE) SQL injection veya parsing hatalarını önler.

Veritabanı Uyumluluğu: Çoğu veritabanı (MySQL, PostgreSQL vb.) JSON'u TEXT veya VARCHAR alanında string olarak saklar. Kaçışlı JSON, bu alanlarda sorun çıkarmadan saklanır ve geri okunduğunda json_decode() ile kolayca parse edilebilir.

Performans: Kaçışlı JSON, veritabanı tarafında ekstra işlem gerektirmez; doğrudan metin olarak işlenir.

Unescaped Ne Zaman Kullanılır?

- Eğer veritabanınız JSON türü destekliyorsa (örneğin, MySQL 5.7+ JSON sütunu), kaçışsız (unescaped) JSON saklanabilir. Bu durumda, veritabanı JSON'u doğrudan parse eder ve sorgularda daha hızlı olabilir. Ancak, bu özellik tüm veritabanlarında mevcut değildir.

- PHP'de json_encode($data, JSON_UNESCAPED_UNICODE) gibi seçeneklerle kaçışsız JSON oluşturabilirsiniz, ama bunu veritabanına yazarken dikkatli olun; eğer TEXT alanında saklanıyorsa, özel karakterler sorun yaratabilir.

Örnek (PDO ile MySQL'de Saklama)

<?php$data = ["isim" => "Ahmet", "şehir" => "İstanbul"];$json = json_encode($data); // Escaped: {"isim":"Ahmet","şehir":"İstanbul"}$pdo = new PDO('mysql:host=localhost;dbname=test', 'user', 'pass');$stmt = $pdo->prepare("INSERT INTO tablo (json_kolon) VALUES (?)");$stmt->execute([$json]);?>
Tavsiye

- Çoğu durumda, varsayılan json_encode() ile escaped JSON kullanın.
- Veritabanınızın JSON desteği varsa, unescaped deneyin ama test edin.
- Her zaman json_last_error() ile hataları kontrol edin.
- Eğer belirli bir veritabanı veya framework kullanıyorsanız, daha detaylı yardım için belirtin.

*/