<?php


function prepareValues($s) {
    return "'" . addslashes($s) . "'";
}

abstract class model {
	protected $tableName;
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
        $valueString = implode(',', array_map("prepareValues", $array));
		$sql = "INSERT INTO " . $tableName . "(" . $columnString . ") VALUES (" . $valueString . ")";
        
		return $sql;
        		
	}

	private function update() {
		$sql = "UPDATE $tableName SET WHERE";
        return $sql;
       
	   echo 'I just updated record' . $this->id;

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
