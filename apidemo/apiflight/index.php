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
  echo 'hello world!';
});

//Flight::set('flight.log_errors', true);

// Flight::route('/user/@id', array('UserCont','hello'));

Flight::start();

// echo 'api';