<?php
//ActiveRecord Homework

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

define('DATABASE', 'rn286');
define('USERNAME', 'rn286');
define('PASSWORD', 'ZewqQw0d8');
define('CONNECTION', 'sql2.njit.edu');

//Add Namespace here

//Autoloader class
class Manage {
    public static function autoload($class) {
        include $class . '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));


echo '<CENTER><h1>Active Record Homework v14</CENTER></h1>';

//Select All Rows from Accounts
$printpageAll = "<center>";
echo "<h2><CENTER>Select All Records from Accounts</CENTER></h2><pre>";
$records = accounts::findall();
$tableGen = buildTable::buildTableFromFullArray($records);
$printpageAll .= $tableGen;

print($printpageAll);

//Select One Row from Accounts
$printpageRow = "<center>";
echo '<h2>Select One Record from Accounts</h2><pre>';
$records = accounts::findOne(4);
$tableGen = buildTable::buildTableFromOneRecord($records);
$printpageRow .= $tableGen;

print($printpageRow);

//Insert one record into Accounts
echo "<h2>Insert 1 Record into Accounts</h2>";
$data = new account();
$data->id="";
$data->email="joe@ms.com";
$data->fname="Joe";
$data->lname="Smith";
$data->phone="2124803960";
$data->birthday="01/01/2000";  
$data->gender="M";
$data->password="rtkeker";
$lastInsertedId=$data->save();

echo "Record $lastInsertedId has been inserted <br>";

$records = accounts::findOne($lastInsertedId);
print_r($records);


//Update one record in Accounts
echo "<h2>Update 1 Record into Accounts</h2>";
$data = new account();

$data->id=$lastInsertedId;
$data->email="joe@ms.com";
$data->fname="Mary";
$data->lname="Smith";
$data->phone="2125551212";
$data->birthday="01/01/2017";  
$data->gender="F";
$data->password="rtkeker";
$lastInsertedId=$data->save();
echo "Record $lastInsertedId has been updated <br>";

$records = accounts::findOne($lastInsertedId);
print_r($records);


//Delete one record from Accounts
echo "<h2>Delete One Record from Accounts</h2>"; 

$data = new account(); 
if ($data->delete($lastInsertedId))
	echo "Record $lastInsertedId has been deleted" ;
else
  echo "Record $lastInsertedId has failed to delete";

echo "<hr>";

//Select All Rows from ToDos
$printpageAll = "<center>";
echo "<h2><CENTER>Select All Records from ToDos</CENTER></h2><pre>";
$records = todos::findall();
$tableGen = buildTable::buildTableFromFullArray($records);
$printpageAll .= $tableGen;

print($printpageAll);

//Select One Row from ToDos
$printpageRow = "<center>";
echo '<h2>Select One Record from ToDos</h2><pre>';
$records = todos::findOne(4);
$tableGen = buildTable::buildTableFromOneRecord($records);
$printpageRow .= $tableGen;

print($printpageRow);

//Insert one record into ToDos
echo "<h2>Insert 1 Record into ToDos</h2>";
$data = new todo();
$data->id="";
$data->owneremail="joe@ms.com";
$data->ownerid="JoeM";
$data->createddate="01/01/2017";
$data->duedate="12/31/2017";
$data->message="Final Review";  
$data->isdone="No";
$lastInsertedId=$data->save();

echo "Record $lastInsertedId has been inserted <br>";

$records = todos::findOne($lastInsertedId);
print_r($records);


//Update one record in ToDos
echo "<h2>Update 1 Record into ToDos</h2>";
$data = new todo();

$data->id=$lastInsertedId;
$data->owneremail="joe@ms.com";
$data->ownerid="JoeM";
$data->createddate="01/01/2017";
$data->duedate="11/31/2017";
$data->message="New Final Review Change";  
$data->isdone="No";
$lastInsertedId=$data->save();
echo "Record $lastInsertedId has been updated <br>";

$records = todos::findOne($lastInsertedId);
print_r($records);


//Delete one record from ToDos
echo "<h2>Delete One Record from ToDos</h2>"; 

$data = new todo(); 
if ($data->delete($lastInsertedId))
	echo "Record $lastInsertedId has been deleted" ;
else
  echo "Record $lastInsertedId has failed to delete";


?>