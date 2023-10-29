<?php
class MolMikroService
{
  public static function request($action, $arrPostData)
  {

    // URL you want to send the POST request to
    $url = "http://ozpas.duckdns.org:99/datamodel.asmx/$action";

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options for the POST request
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData)); // http_build_query($data)
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json;charset=utf-8'));
    //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    //curl_setopt($ch, CURLOPT_TIMEOUT, 3000); //timeout in seconds
    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    //Content-Type: application/json; charset=utf-8
    // Set other options if needed, like headers or authentication

    // Execute the POST request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
      return 'cURL error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Handle the response
    if ($response === false) {
      return 'POST request failed.';
    } else {
      //'POST request was successful. Response: ' .
      return $response;
    }

  }

  public static function requestTest($txFirmaKod, $txVergiNo, $txTarih, $dmTutar)
  {

    // URL you want to send the POST request to
    $url = "http://ozpas.duckdns.org:99/datamodel.asmx/EbelgeTarih";

    $data = array(
      "fiConfig" => array("fr" => "ozpas"),
      "eBelge" => array("txVergiNo" => "22069096060", "txTarih" => "2023-02-01", "dmTutar" => "22")
    );

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options for the POST request
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // http_build_query($data)
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json;charset=utf-8'));
    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    //Content-Type: application/json; charset=utf-8
    // Set other options if needed, like headers or authentication

    // Execute the POST request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
      echo 'cURL error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Handle the response
    if ($response === false) {
      echo 'POST request failed.';
    } else {
      //'POST request was successful. Response: ' .
      echo $response;
    }

  }

}

//$fiCurl = new MolEbelge();
//       "eBelge" => array("txVergiNo" => "22069096060", "txTarih" => "2023-02-01", "dmTutar" => "22")

//$fiCurl::getEbelge("ozpas", "22069096060", "2023-02-0", "22");

?>