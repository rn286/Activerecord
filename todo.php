<?php

final class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;
    
  protected static $modelName = 'todo'; 
  public static function getTablename(){ 
  
         return 'todos'; 
	 } 
 } 
?>