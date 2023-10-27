<?php
/** 
 * class'lar için kullanacağımız arayüz 
 * 
 */ 
abstract class dbLayout{ 
  abstract protected function insert($sql); 
  protected $conn; 
} 
/** 
 * mysql class 
 * 
 */ 
class MySQL extends dbLayout { 
  private $db; 
  public function __construct(){ 
    $this->conn = mysql_connect('localhost','root','mehmet1453'); 
    $this->db = mysql_select_db('test'); 
  } 
  public function insert($sql){ 
    try { 
      mysql_query($sql); 
    } 
    catch (Exception $error){ 
      trigger_error($error->getMessage(),E_USER_ERROR); 
    } 
  } 
} 
/** 
 * postgresql class 
 * 
 */ 
class PgSQL extends dbLayout { 
  public function __construct(){ 
    $this->conn = pg_connect('host=localhost port=5432  dbname=test user=test password=123'); 
  } 
  public function insert($sql){ 
    try { 
      pg_query_params($this->conn,$sql); 
    } 
    catch (Exception $error){ 
      trigger_error($error->getMessage(),E_USER_ERROR); 
    } 
  } 
} 
/** 
 * class çağıran factory class 
 * 
 */ 
class Factory 
{ 
  public static function getFactory($type){ 
    switch ($type) { 
      case 'MySQL': 
        return new MySql(); 
        break; 
      case 'PgSQL': 
        return new PgSQL(); 
        break; 
      default: 
        throw new Exception('Bilinmeyen bir veritabanı tipi',__LINE__); 
        break; 
      } 
  } 
} 
try{ 
    $DB =& Factory::getFactory('MySQL'); 
}catch (Exception $error){ 
    trigger_error($error->getMessage(),E_USER_ERROR); 
}
$DB->insert('insert into test (deneme) VALUES (1)');
?>