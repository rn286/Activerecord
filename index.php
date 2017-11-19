<?php

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
        //you can put any file name or directory here
        include $class . '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));

echo '<CENTER><h1>Active Record Homework v1.0</CENTER></h1>';

//Select All  Section
echo "<h2>Select All Records from Accounts</h2><pre>";
$records = accounts::findall();
print_r($records);

//Select One >>>remove the ID value for final project

echo '<h2>Select One Record from Accounts</h2><pre>';
$records = accounts::findOne(4);
print_r($records);

//Insert
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

//Delete
//delete one record 
echo "<h2>Delete One Record</h2>"; 
$data = new account(); 
$data = account::delete(2); 
echo '<h3>Record deleted</h3>'; 


?>