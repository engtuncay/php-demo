<?php
class userError extends dbExtend  
{
    /**
     * hata mesajlarının yer aldığı Array
     *
     * @var Array
     */
    protected $error = array();

    /**
     * Class'ın ana çalışan constract'ı
     *
     * @return void
     */
    public function __construct()
    {
        array_push($this->error, 'Bu Mail ile daha önceden üyelik yapılmış oldugundan tekrar üyelik işlemi yapamazsınız.
Başka bir Mail ile üye olunuz yada;<br /><br />
Şifrenizi unutuysanız hatırlamak için <a href=password>Lütfen Tıklayın >>></a>');
        array_push($this->error, 'Girmiş olduğunuz kullanıcı adı daha önce kaydı yapıldığı için kaydınız gerçekleşemedi. Lütfen farklı bir kullanıcı adı seçiniz!');
        array_push($this->error, 'Girmiş olduğunuz şifre ile şifre tekrarı uyuşmuyor!');
        array_push($this->error,'Lütfen mail adresinizi doğru giriniz!');
        array_push($this->error, 'Oluşan teknik bir hatadan dolayı kayıt işleminiz gerçekleşemedi. Lütfen sonra yeniden deneyiniz!');
        array_push($this->error, 'Oluşan teknik bir hatadan dolayı kaydınız düzenlenemedi. Lütfen sonra yeniden deneyiniz!');
        array_push($this->error, 'Güvenlik kodunu yanlış girdiniz. Lütfen güvenlik kodunu doğru girin!');
        array_push($this->error, 'Lütfen şifrenizi en az 6 karakter giriniz!');
        array_push($this->error, 'Lütfen kullanıcı adınızı en az 6 karakter giriniz!');
        array_push($this->error, 'Belirtilen aktivasyon numarası sistemimizde bulunamadı!');
        array_push($this->error, 'Kullanıcı kimliğiniz veritabanımızda bulunmamaktadır!');
    }
}
?>