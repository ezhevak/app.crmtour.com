<?php

class Model
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/
	public $columns;
	public $SQL_select;
	public $SQL_params;
	public $SQL_params_types; // 'iss' - integer,string,string
	public $SQL_select_count;
	public $SQL_params_count;
	public $SQL_params_types_count;
	public $SQL_insert;
	public $SQL_insert_params_types;
	public $SQL_insert_params;
	public $SQL_update;
	public $SQL_update_params_types;
	public $SQL_update_params;
	public $ModelClass;
	
	function __construct() {
		$this->ModelClass = "Model";
	}
	
	public function getModelClass() {
		return $this->ModelClass;
	}
	// метод выборки данных
	public function get_data() {
		
	}
	public function exportSQL() {
		return "";
	}
	
	public function get_row()
	{
		$result_rows = array();
		
		$conn = new mysqli(
				$GLOBALS['DB_HOST'],
				$GLOBALS['DB_USER'],
				$GLOBALS['DB_PASSWORD'],
				$GLOBALS['DB_NAME']);
		$conn->	set_charset("utf8");

		if ($conn->connect_error) {
			//die("Connection failed: " . $conn->connect_error);
			throw new Exception("Connection failed: " . $conn->connect_error);
		}
		
		try {
			$a_params = array();
	 
			$param_type = '';
			$n = count($this->SQL_params_types);
			for($i = 0; $i < $n; $i++) {
			  $param_type .= $this->SQL_params_types[$i];
			}
			 
			$a_params[] = & $param_type;
			 
			for($i = 0; $i < $n; $i++) {
			  $a_params[] = & $this->SQL_params[$i];
			}
			 
			$stmt = $conn->prepare($this->SQL_select);
			if($stmt === false) {
			  //trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
			  throw new Exception("Ошибка выборки данных: " . 'Wrong SQL: ' . $this->SQL_select . ' Error: ' . $conn->errno . ' ' . $conn->error);
			}
			 
			call_user_func_array(array($stmt, 'bind_param'), $a_params);

			$stmt->execute();
			
			$row = array();
			$this->stmt_bind_assoc($stmt, $row);
			
			// loop through all result rows
			while ($stmt->fetch()) {
			    //print_r($row);
			    //$result_rows[] = $row;
			    $result_rows[] = $this->array_copy($row);
			    //echo $row["LastName"];
			}
			$conn->close();
		} catch (Exception $e) {
			$conn->close();
			throw new Exception("Ошибка выборки данных: " . $e->getMessage());
		}
		
		return $result_rows;
	}
	
	public function stmt_bind_assoc (&$stmt, &$out) {
	    $data = mysqli_stmt_result_metadata($stmt);
	    $fields = array();
	    $out = array();
	
	    $fields[0] = $stmt;
	    $count = 1;
	
	    while($field = mysqli_fetch_field($data)) {
	        $fields[$count] = &$out[$field->name];
	        $count++;
	    }   
	    call_user_func_array(mysqli_stmt_bind_result, $fields);
	}
	
	public function getListJson() {
		
		$result_rows = array();
		$responce = array();
		
		$conn = new mysqli(
				$GLOBALS['DB_HOST'],
				$GLOBALS['DB_USER'],
				$GLOBALS['DB_PASSWORD'],
				$GLOBALS['DB_NAME']);
		$conn->	set_charset("utf8");

		if ($conn->connect_error) {
		
			//die("Connection failed: " . $conn->connect_error);
			throw new Exception("Connection failed: " . $conn->connect_error);
		}
		
		$page = $_GET['page']; // get the requested page
		$limit = $_GET['rows']; // get how many rows we want to have into the grid
		$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
		$sord = $_GET['sord']; // get the direction

		if(!$sidx) $sidx =1; // connect to the database
		try {
			$a_params = array();
	 
			$param_type = '';
			$n = count($this->SQL_params_types_count);
			for($i = 0; $i < $n; $i++) {
			  $param_type .= $this->SQL_params_types_count[$i];
			}
			 
			$a_params[] = & $param_type;
			 
			for($i = 0; $i < $n; $i++) {
			  $a_params[] = & $this->SQL_params_count[$i];
			}
			 
			$stmt_cnt = $conn->prepare($this->SQL_select_count);
			if($stmt_cnt === false) {
				
			  throw new Exception("Ошибка выборки данных: " . 'Wrong SQL: ' . $this->SQL_select_count . ' Error: ' . $conn->errno . ' ' . $conn->error);
			}
			 
			call_user_func_array(array($stmt_cnt, 'bind_param'), $a_params);
	
			$stmt_cnt->execute();
			$row = array();
			$this->stmt_bind_assoc($stmt_cnt, $row);
			
			// loop through all result rows
			while ($stmt_cnt->fetch()) {
			    //print_r($row);
			    $result_rows[] = $row;
			    //echo $row["LastName"];
			}
			
			$count =  $result_rows[0]["count"];
			unset($result_rows);
			
			if( $count >0 ) {
				$total_pages = ceil($count/$limit);
			} else {
				$total_pages = 0;
	
			}
			if ($page > $total_pages)
				$page=$total_pages;
			if ($page == 0)
				$page = 1;
			$start = $limit*$page - $limit; // do not put $limit*($page - 1)
	
			$filterResultsJSON = json_decode($_REQUEST['filters']);
			$counter = 0;
			$sql_filter='';
			if($filterResultsJSON != "") {
				$filterArray = get_object_vars($filterResultsJSON);
				while($counter < count($filterArray['rules'])) {
					$filterRules = get_object_vars($filterArray['rules'][$counter]);
	
					if($counter == 0){
						$sql_filter .= ' AND ' . $filterRules['field'] . ' LIKE "%' . $filterRules['data'] . '%"';
					} else {
						$sql_filter .= ' AND ' . $filterRules['field'] . ' LIKE "%' . $filterRules['data'] . '%"';
					}
					$counter++;
				}
			}
	
			$responce["page"] = $page;
			$responce["total"] = $total_pages;
			$responce["records"] = $count;
			
			try {
				$a_params = array();
		 
				$param_type = '';
				$n = count($this->SQL_params_types);
				for($i = 0; $i < $n; $i++) {
				  $param_type .= $this->SQL_params_types[$i];
				}
				 
				$a_params[] = & $param_type;
				 
				for($i = 0; $i < $n; $i++) {
				  $a_params[] = & $this->SQL_params[$i];
				}
				 //echo "1".$this->SQL_select.$sql_filter." ORDER BY $sidx $sord LIMIT $start , $limit";
				//$stmt = $conn->prepare($this->SQL_select.$sql_filter." ORDER BY $sidx $sord LIMIT $start , $limit");
				$stmt = $conn->prepare($this->SQL_select.$sql_filter." ORDER BY $sidx $sord");
				
				if($stmt === false) {
				  //trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
				  throw new Exception("Ошибка выборки данных: " . 'Wrong SQL: ' . $this->SQL_select.$sql_filter." ORDER BY $sidx $sord LIMIT $start , $limit".' Error: ' . $conn->errno . ' ' . $conn->error);
				}
				 
				call_user_func_array(array($stmt, 'bind_param'), $a_params);
		
				$stmt->execute();
				$row = array();
				$this->stmt_bind_assoc($stmt, $row);
				
				// loop through all result rows
				while ($stmt->fetch()) {
				    //print_r($row);
				    //$row["UserRole"] = $GLOBALS['UserRole'];
					//$row["UserId"] = $GLOBALS['UserId'];
					
				    $result_rows[] = $this->array_copy($row);
				    
					//$responce->rows[] = $row;
				}
				//$res = $stmt->get_result();
				//while($row = $res->fetch_array(MYSQLI_ASSOC)) {
  			//		array_push($result_rows, $row);
				//}
				$responce["rows"] = $result_rows;
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
			$conn->close();
		} catch (Exception $e) {
			$conn->close();
			throw new Exception("Ошибка выборки данных: " . $e->getMessage());
		}
		//print_r ($result_rows);
		return $responce;
	}
	
	function array_copy(array $array)
	{
		$result = array();
		foreach($array as $key => $val)
		    {
		    if (is_array($val))
		        {
		        $result[$key] = arrayCopy($val);
		        }
		    elseif (is_object($val))
		        {
		        $result[$key] = clone $val;
		        }
		      else
		        {
		        $result[$key] = $val;
		        }
		    }
		
		return $result;
	}
	
	public function deleteAjax() {
//20/12/2017 Жевак закоментировал данный кусок кода, потому что удалять записи может любой 
//пользователь который имеет доступ к кнопку удалить, а только администратор
//		if($_SESSION['UserRole'] != 'admin'){

//			$array = array(
//			"status" => "ERROR",
//			"message" => "У Вас не достаточно полномочий.",
//			);
//		} else{
			$conn = new mysqli(
				$GLOBALS['DB_HOST'],
				$GLOBALS['DB_USER'],
				$GLOBALS['DB_PASSWORD'],
				$GLOBALS['DB_NAME']);
			$conn->	set_charset("utf8");

			if ($conn->connect_error) {
				$array = array(
					"status" => "ERROR",
					"message" => $conn->connect_error,
				);
			} else {
				try {
					$a_params = array();
			 
					$param_type = '';
					$n = count($this->SQL_params_types);
					for($i = 0; $i < $n; $i++) {
					  $param_type .= $this->SQL_params_types[$i];
					}
					 
					$a_params[] = & $param_type;
					 
					for($i = 0; $i < $n; $i++) {
					  $a_params[] = & $this->SQL_params[$i];
					}
					 
					$stmt = $conn->prepare($this->SQL_select);
					if($stmt === false) {
					//if(!$stmt) {
					  throw new Exception("Ошибка выборки данных: " . 'Wrong SQL: ' . $this->SQL_select . ' Error: ' . $conn->errno . ' ' . $conn->error);
					}
					 
					call_user_func_array(array($stmt, 'bind_param'), $a_params);
			
					$stmt->execute();
					$conn->close();
					
					$array = array(
						"status" => "SUCCESS",
						"message" => "Удаление записи прошло успешно.",
					);
				} catch (Exception $e) {
					
					$conn->close();
					//throw new Exception("Ошибка выборки данных по лиду: " . $e->getMessage());
					$array = array(
						"status" => "ERROR",
						"message" => $e->getMessage(),
					);
				}
			}
	//	}
		return $array;
	}
	
	public function getConnection() {
		$conn = new mysqli(
			$GLOBALS['DB_HOST'],
			$GLOBALS['DB_USER'],
			$GLOBALS['DB_PASSWORD'],
			$GLOBALS['DB_NAME']);
		$conn->	set_charset("utf8");
		return $conn;
	}
	
	public function add($row_id) {
		$status = "error";
		$message = "";
		$rec_id = $row_id;
		
		$conn = new mysqli(
			$GLOBALS['DB_HOST'],
			$GLOBALS['DB_USER'],
			$GLOBALS['DB_PASSWORD'],
			$GLOBALS['DB_NAME']);
		$conn->	set_charset("utf8");

		if ($conn->connect_error) {
			$message = $conn->connect_error;
		} else {
			if ($row_id == "" || intval($row_id) < 0) {
				try {
					$a_params = array();
			 
					$param_type = '';
					$n = count($this->SQL_insert_params_types);
					for($i = 0; $i < $n; $i++) {
					  $param_type .= $this->SQL_insert_params_types[$i];
					}
					 
					$a_params[] = & $param_type;
					 
					for($i = 0; $i < $n; $i++) {
					  $a_params[] = & $this->SQL_insert_params[$i];
					}
					 
					$stmt = $conn->prepare($this->SQL_insert);
					if($stmt === false) {
					  throw new Exception("Ошибка добавления записи: " . 'Wrong SQL: ' . $this->SQL_insert . ' Error: ' . $conn->errno . ' ' . $conn->error);
					}
					 
					call_user_func_array(array($stmt, 'bind_param'), $a_params);
			
					if ($stmt->execute()) {
						$rec_id = $conn->insert_id;
						$conn->close();
						$message = "Запись сохранена успешно";
						$status = "success";
					}else{
						$message = "Ошибка:".$stmt->error;
					}
				} catch (Exception $e) {
					
					$conn->close();
					$message = 'Выброшено исключение: '.$e->getMessage();
				}
			} else {
				try {
					$a_params = array();
			 
					$param_type = '';
					$n = count($this->SQL_update_params_types);
					for($i = 0; $i < $n; $i++) {
					  $param_type .= $this->SQL_update_params_types[$i];
					}
					 
					$a_params[] = & $param_type;
					 
					for($i = 0; $i < $n; $i++) {
					  $a_params[] = & $this->SQL_update_params[$i];
					}
					 
					$stmt = $conn->prepare($this->SQL_update);
					if($stmt === false) {
					  throw new Exception("Ошибка обновления записи: " . 'Wrong SQL: ' . $this->SQL_update . ' Error: ' . $conn->errno . ' ' . $conn->error);
					}
					 
					call_user_func_array(array($stmt, 'bind_param'), $a_params);

					if ($stmt->execute()) {
						$conn->close();
					
						$message = "Запись сохранена успешно";
						$status = "success";
					}else{
						$message = "Ошибка:".$stmt->error;
					}
				} catch (Exception $e) {
					
					$conn->close();
					$message = 'Выброшено исключение: '.$e->getMessage();
				}
			}
		}
		return array("status" => $status, "message" => $message, "rec_id" => $rec_id);
	}
	
	public function data_error($msg) {
		return array("status" => "error", "message" => $msg, "rec_id" => "");
	}
	
	//public function getAccountInfo() {
	//	$data = array();
	//	$result_rows = array();
	//	$conn = $this->getConnection();
		
	//	if (!$conn->connect_error) {
	//		$stmt = $conn->prepare("select * from  `vAccount` where Id = ?");
	//		$stmt->bind_param('s', $RowIdBind);
					
	//		$RowIdBind = $_SESSION['AccId'];
	//		$stmt->execute();
	//		$this->stmt_bind_assoc($stmt, $data);
	
	//		while ($stmt->fetch()) {
	//			$result_rows[] = $this->array_copy($data);
	//		}
	//	}
	//	$conn->close();
		
	//	return $result_rows;
	//}
	
	
	public function getAccountInfo() {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		
		$result_rows = array();
		$cols = array ("BranchName as Name",
					   "BranchJurAddress as OfficeAddress",
					   "BranchFactAddress as FactAddress",
					   "BranchPhone as OfficePhone",
					   "BranchFax as OfficeFax",
					   "BranchMobile as OfficeMobile",
					   "BranchEmail as OfficeEmail",
					   "BranchBankName as BankName",
					   "BranchBankAccount as BankAccount",
					   "BranchBankIban as BankIban",
					   "BranchBankMFO as BankMFO",
					   "BranchBankCode as BankCode",
					   "BranchLicenseNum as LicenseNum",
					   "DATE_FORMAT(BranchLicenseDate, '%d.%m.%Y') as LicenseDate",
					   "BranchDirectorName as DirectorName"
					   );
		$db->where ('AccId', $_SESSION['AccId']);
		$db->where ('Id', $_SESSION['BranchId']);
		$data = $db->get ("AccountBranches", null, $cols);
		if ($db->count > 0){
			$result_rows[] = $this->array_copy($data[0]);
		}
	
		return $result_rows;
	}
	
}
?>