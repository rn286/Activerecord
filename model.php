<?php

abstract class model {
	public function save() {
		if ($this->id == '') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }
        echo "$sql <br>"; //show sql statements being executed; REMINDER to remove for final project
		
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $array = get_object_vars($this);
		$statement->execute($array);
        
        //If there is an ID then use LastInsert 
		if ($this->id == '') 
			return $db->lastInsertId();
		return $this->id;
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
        $array = get_object_vars($this);
        $tableName = $this::getTablename();
        $str = trim(implode(',', array_map(array("model", "prepareValues"), array_keys($array))), ",");
        $sql = "UPDATE " . $tableName . " SET " . $str . " WHERE id = :id";

        return $sql;
	}

	public function delete($id) {
        $db = dbConn::getConnection();
        $tableName = $this::getTablename();
		$sql = 'DELETE FROM '. $tableName . ' WHERE id=?';
        $statement = $db->prepare($sql);
        
		return $statement->execute(array($id));
	}
		//To loop through each value 
	private function prepareValues($s)  {
		if ($s == "id")
			return null;
		return $s . ' = :' . $s;

	}
		
	
}

?>
