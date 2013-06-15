<?php
// class coded by jijojohn singlelinelogics
//sql injection free class an example
class dbconnecter

{

protected $dbserver;
protected $dbname;
protected $dbusername;
protected $dbpassword;
protected $connection;

public function __construct($dbserver,$dbname,$dbusername,$dbpassword)
{

$this->dbserver = $dbserver;
$this->dbname = $dbname;
$this->dbusername = $dbusername;
$this->dbpassword = $dbpassword;

}


public function dbconnection()
{

$this->connection = new PDO("mysql:host=$this->dbserver;charset=utf8;dbname=$this->dbname",$this->dbusername,$this->dbpassword,array(PDO::ATTR_EMULATE_PREPARES => false));

}
// function for selecting data with PDO 
public function selectquery($query)
{

$stmt = $this ->connection->prepare($query);
$stmt->execute();
$query = $stmt->fetchall(PDO::FETCH_ASSOC);
print_r($query);

}



}
?>


<?php

//Db connection add your connection details

$object = new dbconnecter("localhost","testing","root","password");
$object->dbconnection();
$object->selectquery("Select * from categories");

?>
