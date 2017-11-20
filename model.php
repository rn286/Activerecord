<?php


function prepareValues($s) {
    return "'" . addslashes($s) . "'";
}

abstract class model {
	public function save() {
		if ($this->id == '') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }
        echo $sql;
		
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        
        
		echo 'I just saved record: ' . $this->id;

	}

    private function insert() {
		$array = get_object_vars($this);
		$tableName = $this::getTablename();
        $columnString = implode(',', array_keys($array));
        $valueString = ":".implode(',:', array_keys($array));
		$sql = "INSERT INTO " . $tableName . "(" . $columnString . ") VALUES (" . $valueString . ")";
        
		return $sql;
        		
	}

	private function update() {
		$sql = "UPDATE $tableName SET WHERE";
        return $sql;
       
	}

	public function delete($id) {
        
        $db = dbConn::getConnection();
		$modelName=static::$modelName;
        $sql = 'DELETE FROM '.$tableName.' WHERE user_id=' .$id;
        $statement = $db->prepare($sql);
        $statement->execute();

		echo 'I just deleted record' . $this->id;


	}
}

?>
