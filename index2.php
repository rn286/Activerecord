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

echo '<CENTER><h1>Active Record Homework</CENTER></h1>';

//Select All Section
$printpage = '<center>';
$printpage .= "<h2>Select All Records from Accounts</h2>";
$records = accounts::findAll();
echo '<table border="3" cellpadding="3" cellspacing="1">';
echo "<tr><th>Id</th><th>email</th><th>Fname</th><th>Fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";
$tableGen = buildTable::buildTableFromFullArray($records);
$printpage .= $tableGen;

//Select One >>>remove the ID value for final project
$printpage .= '<h2>Select One Record from Accounts</h2>';
$records = accounts::findOne(4);
$tableGen = buildTable::buildTableFromOneRecord($records);
$printpage .= $tableGen;
$printpage .= '<center>';

print($printpage);


//Insert

//Update

//Delete



















?>