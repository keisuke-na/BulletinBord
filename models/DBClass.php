<?php
class DB {
	private $table;
	private $db;
	private $where;
	private $dbDefine; // bool
	public static $datas;
	public function __construct($table)
	{
		try {
			$this->db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->table = $table;
			// class of 'Data' can use PDO also.
			Data::$db =& $this->db;
			Data::$table =& $this->table;
		} catch(PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
	// return row data as object
	public function findAll()
	{
		$stmt = $this->db->prepare("select * from {$this->table}");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_CLASS, "Data");
		self::$datas = $data;
		return $data;
	}
	// return row data as object
	public function findId($id)
	{	
		$stmt = $this->db->prepare("select * from {$this->table} where id = :id");
		$stmt->execute([':id' => $id]);	
		if(!$stmt->rowCount()) return;
		$data = $stmt->fetchAll(PDO::FETCH_CLASS, "Data")[0]; // Should I use foreach?
		
		$data->where(['id' => $id]);
		self::$datas = $data;
		return $data;
	}
	public function find($condition)
	{	
		$key = $condition[0];
		$val = $condition[1];
		$stmt = $this->db->prepare("select * from {$this->table} where {$key} = :val");
		$stmt->execute([':val' => $val]);	
		if(!$stmt->rowCount()) return false;
		$data = $stmt->fetchAll(PDO::FETCH_CLASS, "Data"); // Should I use foreach?
		self::$datas = $data;
		return $data;
	}
	public function create($data)
	{	
		if(!$this->blankCheck($data)) return false;
		$data = $this->replaceBreak($data);
		list ($clmns,$vals) = $this->setParams($data);
		$stmt = $this->db->prepare("insert into {$this->table} ({$clmns}) values ({$vals})");
		$stmt->execute();
	}

	// e.g. ['name' => 'keven', 'score' => 80] 
	// return $clmns = name,score
	// return $vals = 'keven',80
	// "insert into {$this->table} ({$clmns}) values ({$vals})"
	public function setParams($ary)
	{
		$keys = array_keys($ary); // extract key from array.
		$mx = count($keys);
		$clmns = "";
		$vals = "";
		$i = 0;
		foreach($keys as $key) {
			$i++;
			$clmns .= ($i > $mx-1) ? "$key" : "$key, ";
			if(gettype($ary[$key]) === 'integer'){
				$vals .= ($i > $mx-1) ? "$ary[$key]" : "$ary[$key], ";
			}else{
				$vals .= ($i > $mx-1) ? "'$ary[$key]'" : "'$ary[$key]', ";
			}
		}
		return array($clmns, $vals);
	}
	public function blankCheck($data)
	{
		$bl = preg_grep("/^[\s]*$/", $data);
		if($bl) return false;
		return true;
	}
	public function replaceBreak($data)
	{
		$data = preg_replace("/\n|\r\n|\r/",'&#13',$data);
		return $data;
	}
}

class Data {
	public static $db;
	public static $table;
	public static $where;
	public function save()
	{	
		$table = self::$table;
		if(!$params = $this->setParams($this)) return false;
		$condition = self::$where;
		$stmt = self::$db->prepare("update {$table} set {$params} where {$condition}");
		$stmt->execute();
	}
	public function delete()
	{
		$table = self::$table;
		$condition = self::$where;
		$stmt = self::$db->prepare("delete from {$table} where {$condition}");
		$stmt->execute();
	}

	/**********************************************************
	create condition and part of sql's update sentence for sql
	**********************************************************/

	// e.g. ['name' => 'keven', 'score' => 80]
	// return name = 'keven',score = 80 as $params
	// "update xxx set {$params} where xxx"
	public function setParams($obj)
	{
		$keys = array_keys(get_object_vars($obj)); // extract keys of object.
		$mx = count($keys);
		$params = "";
		$i = 0;
		foreach($keys as $key) {
			if(!$this->blankCheck($this)) return false;
			$this->$key = $this->replaceBreak($this->$key);
			$i++;

			if(gettype($this->$key) === "integer"){
				$params .= ($i > $mx-1) ? "$key= {$this->$key}" : "$key= {$this->$key},";
			}else{
				$params .= ($i > $mx-1) ? "$key= '{$this->$key}'" : "$key= '{$this->$key}',";
			}
		}
		$i = 0;
		return $params;
	}
	// e.g.  ['id' => 23]
	//return id = 23 as $condition
	// "update xxx set xxx where {$condition}"
	public function where($ary)
	{
		$keys = array_keys($ary);
		foreach($keys as $key) {
			$condition = "$key = '$ary[$key]'";
		}
		self::$where = $condition;
	}
	public function blankCheck($data)
	{
		$data = (array)$data;
		$bl = preg_grep("/^[\s]*$/", $data);
		if($bl) return false;
		return true;
	}
	public function replaceBreak($data)
	{
		$data = preg_replace("/\n|\r\n|\r/",'&#13',$data);
		return $data;
	}
	public function check($key,$veriVal){
		if($this->$key != $veriVal) return false;
		return true;
	}
}

function replaceBR($data)
{
	$data = preg_replace("/&#13/",'<br>',$data);
	return $data;
}

function S($key)
{
	return (isset($_SESSION[$key])) ? $_SESSION[$key] : '';
}
?>