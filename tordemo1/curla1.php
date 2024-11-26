<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.example.com/login.php');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36');
// 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36'
// Chrome
// Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=XXXXX&password=XXXXX");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name');  //could be empty, but cause problems on some hosts
curl_setopt($ch, CURLOPT_COOKIEFILE, '/cookie.txt');  //could be empty, but cause problems on some hosts
$answer = curl_exec($ch);
if (curl_error($ch)) {
    echo curl_error($ch);
}

//another request preserving the session

// curl_setopt($ch, CURLOPT_URL, 'http://www.example.com/profile');
// curl_setopt($ch, CURLOPT_POST, false);
// curl_setopt($ch, CURLOPT_POSTFIELDS, "");
// $answer = curl_exec($ch);
// if (curl_error($ch)) {
//     echo curl_error($ch);
// }
