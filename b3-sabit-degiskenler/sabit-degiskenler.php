<?php

    /*
        Sabit Değişkenler;
            define() fonksiyonu ile tanımlanır
            Türkçe karakterler içerebilir
            Sayı ile başlayamaz
            Harf ya da _ işareti ile başlar
            Büyük-küçük harfe duyarlıdır
        Veri türlerinde;
            Object hariç tüm veri türlerini kapsar.
    */

    $tayfun = "tayfun erbilen";
    //echo $tayfun;

    define("tayfun", "tayfun erbilen");
    //define("Tayfun", "tayfun erbilen2");
    
    echo tayfun;

?>