<?php

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
        $tableName = get_called_class();
        $array = get_object_vars($this);
        $columnString = implode(',', $array);
        $valueString = ":".implode(',:', $array);
        
		echo 'I just saved record: ' . $this->id;

	}

    private function insert() {
		$sql = "INSERT INTO (" . $this->$columnString . ") VALUES (" . $this->$valueString . ")</br>";
        return $sql;
        
		echo 'I just inserted record' . $this->id;

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
