<?php
class DBHandler
{
	private $host = '';
	private $user = '';
	private $pw = '';
	private $dbName = '';
	
	public function __construct($host, $user, $pw)
	{
		$this->host = $host;
		$this->user = $user;
		$this->pw = $pw;
	}
	public function connect($dbName)
	{
		$this->dbName = $dbName;
		
		mysql_connect($this->host, $this->user, $this->pw) or die("Verbindung gescheitert");
		mysql_select_db($this->dbName) or die("Tabelle existiert nicht");
	}
	public function selector($dbTable, $whatToSelect, $whereClause, $filter)
	{
		$query = "SELECT " . $whatToSelect . " FROM " . $dbTable . " WHERE " . $whereClause . " = " . $filter . "";
		$ergebnis = mysql_query($query);
		return $ergebnis;
	}
}