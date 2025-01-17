<?php

// Örnek metin
$text = "Merhaba {{name}}, bugün {{day}} günü.";

// Değiştirilecek değerler
$replacements = [
    'name' => 'Ahmet',
    'day' => 'Cuma',
];

// Düzenli ifade
$pattern = '/\{\{(.*?)\}\}/';

// Değiştirme işlemi
$result = preg_replace_callback($pattern, function ($matches) use ($replacements) {
    $key = $matches[1]; // {{key}} içindeki 'key' kısmını al
    return $replacements[$key] ?? $matches[0]; // Eğer eşleşme yoksa orijinal {{key}}'i koru
}, $text);

echo $result;

//Merhaba Ahmet, bugün Cuma günü.
// Açıklama:
// preg_replace_callback:
// Bu fonksiyon, düzenli ifadeyle eşleşen her bölümü alır ve bir geri çağırma fonksiyonu (callback) aracılığıyla işler.
// Düzenli İfade:
// /\{\{(.*?)\}\}/: Çift süslü parantezler arasındaki herhangi bir metni yakalar.
// (.*?): Süslü parantezler arasındaki metni yakalayan gruptur.
// $replacements Dizisi:
// Bu dizi, yakalanan anahtarları (name, day) karşılık gelen değerlerle eşleştirir.
// Varsayılan Davranış:
// Eğer bir anahtar için değer bulunamazsa, orijinal {{key}} ifadesi korunur ($matches[0]).
// Bu yaklaşımı kullanarak metin içinde istediğiniz prefiks ve sonek işaretli bölümleri kolayca değiştirebilirsiniz!
