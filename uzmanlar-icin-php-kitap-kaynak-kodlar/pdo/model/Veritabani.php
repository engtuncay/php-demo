<?php
namespace model;
use model\db\DB;
use model\db\abstruct\dbExtend;
/**
 * Description of Veritabani
 *
 * @author Mehmet Şamlı <mehmetsamli@gmail.com>
 */
class Veritabani extends dbExtend{
	/**
	 * construct method
	 * @param array $criteria
	 */
	public function __construct(Array &$criteria){
		$this->setConstruct($criteria);
	}
	/**
	 * verileri get eder
	 *
	 * @return db\DBResult
	 */
	public function &getData(){
		$this->sql = 'SELECT * FROM deneme WHERE id=?';
		try{
			$this->push($this->criteria['id'],DB::I);
			$this->DB->select($this->result, $this->sql,
					$this->dataArr);
			$this->flush();
			return $this->result;
		} catch (\PDOException $error){
			trigger_error($error->getMessage(),E_USER_ERROR);
		}
	}
}
$arr = array('id'=>1);
$VERITABANI = new Veritabani($arr);
$VERITABANI->setDebug(1);
$dataArr = $VERITABANI->getData();