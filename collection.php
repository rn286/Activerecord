<?php

abstract class collection {
// has the query template for selecting all, sorting etc
	static public function create() {
		$model = new static::$modelName;

		return $model;

	}

	static public function findAll() {
    	$db = dbConn::getConnection();
		$tableName = get_called_class();
		$sql = 'SELECT * FROM ' . $tableName;
		$statement = $db->prepare($sql);
		$statement->execute();
		$class = static::$modelName;
		$statement->setFetchMode(PDO::FETCH_CLASS, $class);
		$recordSet = $statement->fetchAll();
		//$recordSet = $statement->setFetchMode(PDO::FETCH_ASSOC); 
		return $recordSet;

	}

	static public function findOne($id) {
		$db = dbConn::getConnection();
		$tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id=?';
        $statement = $db->prepare($sql);
        $statement->execute(array($id));
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];

	}

}

?>