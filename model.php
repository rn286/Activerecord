<?php

function prepareValues($s)  {

    return $key . ' = ":"' . $key . '"';

}


abstract class model {
	public function save() {
		if ($this->id == '') {
            $sql = $this->insert();
        } else {
            $sql = $this->update();
        }
        echo $sql //show sql statements being executed
		
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $array = get_object_vars($this);
		$statement->execute($array);
        
        
		if ($this->id == '') {
			return $db->lastInsertId();
		$return $this->id;
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
        $str = implode(',', array_map("prepareValues", array_keys($array)));
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
		


	
}

?>
