<?php
require_once ($GLOBALS['RootDir']."connection.php");
require_once ($GLOBALS['RootDir']."application/mysql/MysqliDb.php");
/*
Example use:
$db = database::getInstance();
$mysqli = $db->getConnection(); 
*/
class database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "";
	private $_username = "";
	private $_password = "";
	private $_database = "";
	private $autoReconnect = true;
	public static $prefixTable="";
	public static $traceOn=true;
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		//if(!self::$_instance) { // If no instance then make one
		self::$_instance = new self();
		//}
		return self::$_instance;
	}
	private function isDebugOn() {
		return true;
	}
	// Constructor
	private function __construct() {
        //$settings = getConnectSettings();
        $this->_host = $GLOBALS['DB_HOST'];
        $this->_username = $GLOBALS['DB_USER'];
        $this->_password = $GLOBALS['DB_PASSWORD'];
        $this->_database = $GLOBALS['DB_USER'];
		$this->_connection = new Mysqlidb($this->_host, $this->_username, $this->_password, $this->_database);
		$this->_connection->autoReconnect = $this->autoReconnect;
		$this->_connection->setPrefix (self::$prefixTable);
		$this->_connection->setTrace($this->isDebugOn());
		if(!$this->_connection) {
			throw new Exception("Error connect to DataBase");
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}