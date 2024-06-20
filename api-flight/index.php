<?php
require 'vendor/autoload.php';
//require_once 'vendor/flight/flight/Flight.php';
//require 'flight/Flight.php';

class UserCont {
    public static function hello($id){
        echo "hello metod,($id)!";
    }
}

Flight::route('/', function(){
  print "hello world!\n";
  $data = Flight::request()->data->getData();

  // echo $_POST; boş
  // direk değişkene ulaşmak için
  // $id = Flight::request()->data->id;
  print_r($data);

  // json text olarak gelir
  // $body = Flight::request()->getBody();
  // print_r($body);
});

Flight::set('flight.log_errors', true);

Flight::route('/user/@id', array('UserCont', 'hello'));

Flight::start();



// echo 'api';